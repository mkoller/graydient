<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <div class="page-wrap" id="page-wrap" role="document">
      <?php
        do_action('get_header');
        get_template_part('templates/header');
      ?>

        <div class="content row">
                   <div class="hero">
              
                      <?php if( get_field('hero_image') ): ?>

                        <img src="<?php the_field('hero_image'); ?>" />

                      <?php endif; ?>

                      <?php if( get_field('hero_post_image') ): ?>

                        <img src="<?php the_field('hero_post_image'); ?>" />

                      <?php endif; ?>

                  <div class="services-header">
                      <h1><?php the_field('hero_header'); ?></h1>
                      <p> Graydient Creative is a full spectrum marketing solutions company for businesses in the hospitality and service industries. We’re more than just pretty websites and social media posts. We were born with creativity, and raised on innovation. </p>
                  </div>
           </div>
           <div class="main">
             <?php include Wrapper\template_path(); ?>
           </div>
                   <?php if (Setup\display_sidebar()) : ?>
            <aside class="sidebar">
              <?php include Wrapper\sidebar_path(); ?>
            </aside><!-- /.sidebar -->
          <?php endif; ?>
        </div><!-- /.content -->

      <?php
        do_action('get_footer');
        get_template_part('templates/footer');
        wp_footer();
      ?>
    </div>


  </body>
</html>
