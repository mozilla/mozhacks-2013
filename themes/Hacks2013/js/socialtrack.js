jQuery(document).ready(function(){
  var ga = window._gaq || [];
  jQuery('.share').click(function(){
    ga.push(['_trackEvent',
      'socialshare',
      'click']);
  });
});
