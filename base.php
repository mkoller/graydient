<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>

  <!-- Start container -->
  <div id="container" class="container intro-effect-fadeout">
    <!-- Start Wrap -->
    <div class="wrap" id="page-wrap" role="document">

      <?php
        do_action('get_header');
        get_template_part('templates/header');
      ?>

      <!-- Start Header -->
      <div class="header"> 
        <div class="content row">
                   <div class="hero">
              
                      <?php if( get_field('hero_homepage_image') ): ?>

                        <img class="bg-img" src="<?php the_field('hero_homepage_image'); ?>" />

                      <?php endif; ?>

                      <?php if( get_field('hero_post_image') ): ?>

                        <img class="bg-img" src="<?php the_field('hero_post_image'); ?>" />

                      <?php endif; ?>

                  <div class="services-header">
                      <h1><?php the_field('hero_header'); ?></h1>
                      <h1><?php the_field('hero_post_header'); ?></h1>
                      <p> <?php the_field('hero_text'); ?> </p>
                      <p> <?php the_field('hero_post_text'); ?> </p>
                  </div>
           </div>
        <button class="trigger" data-info="Click to see the header effect"><span>Trigger</span>
        </button>
        <!-- End Header -->

        <!-- Start Content -->
        <article class="content">
           <div class="main">
             <?php include Wrapper\template_path(); ?>
           </div>
                   <?php if (Setup\display_sidebar()) : ?>
            <aside class="sidebar">
              <?php include Wrapper\sidebar_path(); ?>
            </aside><!-- /.sidebar -->
          <?php endif; ?>
        </div><!-- /.content -->
        </article>
        <!-- End Content -->

      <?php
        do_action('get_footer');
        get_template_part('templates/footer');
        wp_footer();
      ?>
    </div>
    <!-- End Wrap -->
  </div>
  <!-- End Container -->

  <script>
      (function() {

        // detect if IE : from http://stackoverflow.com/a/16657946    
        var ie = (function(){
          var undef,rv = -1; // Return value assumes failure.
          var ua = window.navigator.userAgent;
          var msie = ua.indexOf('MSIE ');
          var trident = ua.indexOf('Trident/');

          if (msie > 0) {
            // IE 10 or older => return version number
            rv = parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
          } else if (trident > 0) {
            // IE 11 (or newer) => return version number
            var rvNum = ua.indexOf('rv:');
            rv = parseInt(ua.substring(rvNum + 3, ua.indexOf('.', rvNum)), 10);
          }

          return ((rv > -1) ? rv : undef);
        }());


        // disable/enable scroll (mousewheel and keys) from http://stackoverflow.com/a/4770179          
        // left: 37, up: 38, right: 39, down: 40,
        // spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
        var keys = [32, 37, 38, 39, 40], wheelIter = 0;

        function preventDefault(e) {
          e = e || window.event;
          if (e.preventDefault)
          e.preventDefault();
          e.returnValue = false;  
        }

        function keydown(e) {
          for (var i = keys.length; i--;) {
            if (e.keyCode === keys[i]) {
              preventDefault(e);
              return;
            }
          }
        }

        function touchmove(e) {
          preventDefault(e);
        }

        function wheel(e) {
          // for IE 
          //if( ie ) {
            //preventDefault(e);
          //}
        }

        function disable_scroll() {
          window.onmousewheel = document.onmousewheel = wheel;
          document.onkeydown = keydown;
          document.body.ontouchmove = touchmove;
        }

        function enable_scroll() {
          window.onmousewheel = document.onmousewheel = document.onkeydown = document.body.ontouchmove = null;  
        }

        var docElem = window.document.documentElement,
          scrollVal,
          isRevealed, 
          noscroll, 
          isAnimating,
          container = document.getElementById( 'container' ),
          trigger = container.querySelector( 'button.trigger' );

        function scrollY() {
          return window.pageYOffset || docElem.scrollTop;
        }
        
        function scrollPage() {
          scrollVal = scrollY();
          
          if( noscroll && !ie ) {
            if( scrollVal < 0 ) return false;
            // keep it that way
            window.scrollTo( 0, 0 );
          }

          if( classie.has( container, 'notrans' ) ) {
            classie.remove( container, 'notrans' );
            return false;
          }

          if( isAnimating ) {
            return false;
          }
          
          if( scrollVal <= 0 && isRevealed ) {
            toggle(0);
          }
          else if( scrollVal > 0 && !isRevealed ){
            toggle(1);
          }
        }

        function toggle( reveal ) {
          isAnimating = true;
          
          if( reveal ) {
            classie.add( container, 'modify' );
          }
          else {
            noscroll = true;
            disable_scroll();
            classie.remove( container, 'modify' );
          }

          // simulating the end of the transition:
          setTimeout( function() {
            isRevealed = !isRevealed;
            isAnimating = false;
            if( reveal ) {
              noscroll = false;
              enable_scroll();
            }
          }, 600 );
        }

        // refreshing the page...
        var pageScroll = scrollY();
        noscroll = pageScroll === 0;
        
        disable_scroll();
        
        if( pageScroll ) {
          isRevealed = true;
          classie.add( container, 'notrans' );
          classie.add( container, 'modify' );
        }
        
        window.addEventListener( 'scroll', scrollPage );
        trigger.addEventListener( 'click', function() { toggle( 'reveal' ); } );
      })();
    </script>

  </body>
</html>
