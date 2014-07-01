<?php
/**
 * Blogs Template
 *
 * Template Name: FrontPage
 *
 */

 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri() ?>/assets/js/html5shiv.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/js/respond.min.js"></script>
<![endif]-->       
<?php zee_favicon();?>
<?php wp_head(); ?>
</head><!--/head-->

<body <?php body_class() ?>>
  <?php if(zee_option('zee_theme_layout')=='boxed'){ ?>
    <div id="boxed">
  <?php } ?>

  <header id="header" class="navbar navbar-fixed-top" role="banner">
    <div class="container">
    <!--   <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only"><?php _e('Toggle navigation', ZEETEXTDOMAIN); ?></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <?php logo();?>
      </div> -->

      <div>
        <?php 
        if ( has_nav_menu( 'primary' ) ) {
          wp_nav_menu( array(
            'theme_location'  => 'primary',
            'container'       => false,
            'menu_class'      => 'nav navbar-nav navbar-main',
            'fallback_cb'     => 'wp_page_menu',
            'walker'          => new wp_bootstrap_navwalker()
            )
          ); 
        }
        ?>
      </div>

      <!--<div id="mobile-menu" class="visible-xs">
        <div class="collapse navbar-collapse">
          <?php 
          if ( has_nav_menu( 'primary' ) ) {
            wp_nav_menu( array(
              'theme_location'  => 'primary',
              'container'       => false,
              'menu_class'      => 'nav navbar-nav',
              'fallback_cb'     => 'wp_page_menu',
              'walker'          => new wp_bootstrap_mobile_navwalker()
              )
            ); 
          }
          ?>
        </div>-->
      </div><!--/.visible-xs-->
    </div>
  </header><!--/#header-->

  <?php get_template_part( 'sub', 'title' ); ?>

  <?php if( ! is_page() ) { ?>
  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div id="primary" class="content-area">
            <?php } ?>

<section id="page">
    <div class="container">
        <div id="content" class="site-content" role="main">
            <?php /* The loop */ ?>
            <?php while ( have_posts() ) { the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php edit_post_link( __( 'Edit', ZEETEXTDOMAIN ), '<small class="edit-link pull-right ">', '</small><div class="clearfix"></div>' ); ?>
                <?php if ( has_post_thumbnail() && ! post_password_required() ) { ?>
                <div class="entry-thumbnail">
                    <?php the_post_thumbnail(); ?>
                </div>
                <?php } ?>
                <div class="entry-content">
                    <?php the_content(); ?>
                    <?php zee_link_pages(); ?>
                </div>
            </article>
            <?php } ?>
        </div><!--/#content-->
    </div>
</section><!--/#page-->

<?php if(!is_page()) { ?>
</div><!--/#primary-->
</div><!--/.col-lg-12-->
</div><!--/.row-->
</div><!--/.container.-->
</section><!--/#main-->
<?php } ?>

<!-- <section id="bottom" class="wet-asphalt">
  <div class="container">
    <div class="row">
      <?php dynamic_sidebar('bottom'); ?>
    </div>
  </div>
</section> -->

<footer id="footer">
  <div class="container">
    <p class="pull-left">© 2014 Wenhui Yu </p> 
    <p class="pull-right"><a class="top" href="#">Back to Top</a></p>
  </div>
</footer><!--/#footer-->

  <?php if(zee_option('zee_theme_layout')=='boxed'){ ?>
    </div><!--/#boxed-->
  <?php } ?>

<?php google_analytics();?>

<?php wp_footer(); ?>

</body>
</html>
