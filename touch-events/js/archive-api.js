var browseFiles = document.querySelector("#browse-files"),
    dropFiles = document.querySelector("#drop-files"),
    displayFiles = document.querySelector("#display-files"),
    error = document.querySelector("#error");

if (!window.ArchiveReader) {
    var noArchiveAPI = document.querySelector("#no-archive-api");
    noArchiveAPI.style.display = "block";
}

browseFiles.onchange = function () {
    readArchive(this.files[0]);
};

// Needed to make the ondrop event work
dropFiles.ondragover = function (evt) {
    evt.preventDefault();
    evt.stopPropagation();
}

dropFiles.ondrop = function (evt) {
    readArchive(evt.dataTransfer.files[0]);
    evt.preventDefault();
    evt.stopPropagation();
};

function readArchive (file) {
    var archiveFile = new ArchiveReader(file),
        fileNames = archiveFile.getFilenames();

    error.style.display = "none";

    fileNames.onerror = function () {
        error.innerHTML = "Error reading filenames";
        error.style.display = "block";
    };

    fileNames.onsuccess = function (request) {
        var result = this.result,
            list = document.createElement("ul"),
            file;
        for (var i=0, l=result.length; i<l; i++) {
            file = archiveFile.getFile(result[i]);
            file.onerror = function () {
                error.innerHTML = "Error accessing file";
                error.style.display = "block";
            };
            file.onsuccess = function () {
                var listItem = document.createElement("li"),
                    currentFile = this.result,
                    fileType = currentFile.type,
                    fileInfo;
                fileInfo = "<div><strong>Name:</strong> " + currentFile.name + "</div>";
                fileInfo += "<div><strong>Size:</strong> " + parseInt(currentFile.size / 1024, 10) + " kb</div>";
                fileInfo += "<div><strong>Type:</strong> " + fileType + "</div>";
                if (fileType.search(/image/i) != -1) {
                    // Get window.URL object
                    var URL = window.URL || window.webkitURL;
                    // Create ObjectURL
                    var imgURL = URL.createObjectURL(currentFile);

                    fileInfo += '<div><img src="' + imgURL + '" alt=""></div>';
                }
                else if (fileType.search(/text/i) != -1) {
                    readTextFile(listItem, currentFile);
                }
                listItem.innerHTML = fileInfo;
                list.appendChild(listItem);               
            };            
        }
        displayFiles.appendChild(list);
    };
}

function readTextFile (listItem, file) {
    var fileReader = new FileReader();
    fileReader.readAsText(file);
    fileReader.onerror = function () {
        error.innerHTML = "Error showing text file content";
        error.style.display = "block";
    };
    fileReader.onload = function (evt) {
        listItem.innerHTML += "<div><strong>Text content:</strong><pre>" + evt.target.result + "</pre></div>";
    };
}