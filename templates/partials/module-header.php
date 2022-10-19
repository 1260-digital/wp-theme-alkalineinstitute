<?php if ( get_field( 'hide_header') == false ) : ?>
  <header class="banner navbar navbar-default navbar-fixed-top" role="banner">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only"><?= __('Toggle navigation', 'dortherindbo'); ?></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo-pos.jpg" class="img-logo" alt="<?php bloginfo('name'); ?>">
        </a>
      </div>
      <nav class="collapse navbar-collapse" role="navigation">
         <?php
              wp_nav_menu( array(
                  'menu'              => 'primary_navigation',
                  'theme_location'    => 'primary_navigation',
                  'depth'             => 2,
                  'container'         => 'div',
                  'container_class'   => 'collapse navbar-collapse',
          'container_id'      => 'bs-example-navbar-collapse-1',
                  'menu_class'        => 'nav navbar-nav navbar-right',
                  'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                  'walker'            => new wp_bootstrap_navwalker())
              );
          ?>
      </nav>
    </div>
  </header>
<?php endif; ?>