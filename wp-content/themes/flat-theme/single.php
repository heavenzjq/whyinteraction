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
  <div id="loader-wrapper">
      <div id="loader"></div>
  </div>
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
          <li class="col-xs-2"><a class="pull-left" href="/"><span class="glyphicon glyphicon-home"></span><span class="hidden-xs"> Home</span></a></li>
          <li class="page-title col-xs-8">
            <ul>
              <?php zee_portfolio_next() ?>
              <li><a href=""><?php the_title(); ?></a></li>
              <?php zee_portfolio_prev() ?>
            </ul>
          </li>
          <li class="col-xs-2">
            <label class="menuButton pull-right" for="checkMenu"><span class="glyphicon glyphicon-list"></span><span class="hidden-xs"> All</span></label>              
            <input type="checkbox" id="checkMenu">
            <label class="menuOverlay" for="checkMenu"></label>
            <div class="menuContainer">
              <div class="scrollContainer">
                <ul class="options">
                      <?php
                        the_post(); 
                        $postid = get_the_ID();

                        $type = 'zee_portfolio';
                        $args=array(
                          'post_type' => $type,
                          'post_status' => 'publish',
                          'posts_per_page' => -1,
                          'ignore_sticky_posts'=> 1
                          );
                        $my_query = null;
                        $my_query = new WP_Query($args);

                        if( $my_query->have_posts() ) {
                          while ($my_query->have_posts()) : $my_query->the_post(); ?>
                            <li class="<?php mark_hightlight($postid) ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
                            <?php
                          endwhile;
                        }
                        wp_reset_query();  // Restore global post data stomped by the_post().
                        ?>
                    </ul>
              </div>        
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

  <?php get_template_part( 'post-templates/content', "portfolio" ); ?>

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
