<?php
/*
*Template Name: Home Page
*/
get_header();?>

<section id="content">
      <div class="wrap">
          <div id="content-main" role="main" class="full">

              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                      <div class="entry-content page-content boxed" id="wikiArticle">

                      <!--Commenting out until we decide how this will integrate
                      with the existing theme. <?php the_content(); ?>-->
                      
                      <div id="article-nav">
                        <div class="page-toc"> {{ toctree(collapse=False) }} </div>
                      </div>

                      <div class="home-left">
                      {% block body %}{% endblock %}
                      </div>
                      <div class="home-right">
                      
                      </div>
                  </div>
              </article>
          </div>
      </div>
  </section>

<?php get_footer(); ?>