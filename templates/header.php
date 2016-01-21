<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle offcanvas-toggle" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas">
            <span class="sr-only">Toggle navigation</span>
            <span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </span>
        </button>
      <a class="navbar-brand" href="<?php echo home_url(); ?>">
                <img src="http://localhost:8888/wordpress/wp-content/uploads/2016/01/graydient-creative-rev.png" class="img-responsive" alt="Brand">
            </a>
    </div>
<div class="navbar-offcanvas navbar-offcanvas-right navbar-offcanvas-touch" id="js-bootstrap-offcanvas">
        <?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'toggle navbar-toggle',
                'container_id'      => 'js-bootstrap-offcanvas',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
        </div>
    </div>
</nav>
