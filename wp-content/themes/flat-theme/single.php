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
    <!-- <div class="container"> -->
     <!--  <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div> -->

      <!-- <div class="hidden-xs"> -->
        <ul id="menu-portfolio" class="nav navbar-nav navbar-main">
          <li class="col-xs-4"><a class="pull-left" href="/"><span class="glyphicon glyphicon-home"></span> Home</a></li>
          <li class="page-title col-xs-4">
            <ul>
              <?php zee_portfolio_next() ?>
              <li><a href=""><?php the_title(); ?></a></li>
              <?php zee_portfolio_prev() ?>
            </ul>
          </li>
          <li class="col-xs-4">
            <div class="btn-group pull-right">
              <button type="button" class="btn btn-danger glyphicon glyphicon-list" data-toggle="dropdown"> All</button>
<!--               <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button> -->
              <ul class="dropdown-menu" role="menu">
                <?php
                  $type = 'zee_portfolio';
                  $args=array(
                    'post_type' => $type,
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'caller_get_posts'=> 1
                    );
                  $my_query = null;
                  $my_query = new WP_Query($args);
                  if( $my_query->have_posts() ) {
                    while ($my_query->have_posts()) : $my_query->the_post(); ?>
                      <li><p><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p></li>
                      <?php
                    endwhile;
                  }
                  wp_reset_query();  // Restore global post data stomped by the_post().
                  ?>
              </ul>
            </div>
          </li>
        </ul>      
      <!-- </div> -->

      <!-- <div id="mobile-menu" class="visible-xs">
        <div class="collapse navbar-collapse">
          <ul id="menu-mymenu-1" class="nav navbar-nav">
            <li id="menu-item-162" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-162"><a title="Home" href="http://localhost:8888">Home</a></li>
          </ul>        
        </div>
      </div> --><!--/.visible-xs-->
    <!-- </div> -->
  </header><!--/#header-->

  <?php get_template_part( 'sub', 'title' ); ?>

<section id="portfolio-main">
  <?php if(have_posts()){ while ( have_posts() ) { the_post(); ?>
  <?php get_template_part( 'post-templates/content', "portfolio" ); ?>
  <?php } } ?>
</section>

<section id="bottom" class="wet-asphalt">
  <div class="container">
    <div class="row">
      <?php dynamic_sidebar('bottom'); ?>
    </div>
  </div>
</section>

<footer id="footer" class="midnight-blue">
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