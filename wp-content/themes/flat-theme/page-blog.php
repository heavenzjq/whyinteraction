<?php
/**
 * Blogs Template
 *
 * Template Name: Blogs
 *
 */
    $wp_query->init();

    $wp_query->set("post_type","post"); 

    $wp_query->get_posts(); 

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
    <!-- <div class="container"> -->
     <!--  <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div> -->

      <ul id="menu-portfolio" class="nav navbar-nav navbar-main">
        <li class="col-xs-2"><a class="pull-left" href="/"><span class="glyphicon glyphicon-home"></span><span class="hidden-xs"> Home</span></a></li>
        <li class="page-title col-xs-8">
          <a href="/journal">Wenhui's Journal</a>
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

                        $type = 'post';
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
                            <li class="<?php mark_hightlight($postid) ?>" onclick="changePost();"><a href="#post_<?php the_ID(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
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

     <!--  <div id="mobile-menu" class="visible-xs">
        <div class="collapse navbar-collapse">
          <ul id="menu-mymenu-1" class="nav navbar-nav">
            <li id="menu-item-162" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-162"><a title="Home" href="http://localhost:8888">Home</a></li>
          </ul>        
        </div>
      </div> --><!--/.visible-xs-->
    <!-- </div> -->
  </header><!--/#header-->

  <?php get_template_part( 'sub', 'title' ); ?>

<section id="blogmain">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div id="primary" class="content-area">

  <?php get_template_part( 'post-templates/content', get_post_format() ); ?>
  <?php zee_post_nav(); ?>

  </div><!--/#primary-->
</div><!--/.col-lg-12-->
</div><!--/.row-->
</div><!--/.container.-->
</section>

<!-- <section id="bottom" class="wet-asphalt">
  <div class="container">
    <div class="row">
      <?php dynamic_sidebar('bottom'); ?>
    </div>
  </div>
</section> -->

<footer id="footer" class="midnight-blue">
    <p class="pull-left">© 2014 Company, Inc. </p> 
    <p class="pull-right"><a class="top" href="#">Back to Top</a></p>
</footer><!--/#footer-->

  <?php if(zee_option('zee_theme_layout')=='boxed'){ ?>
    </div><!--/#boxed-->
  <?php } ?>

<?php google_analytics();?>

<?php wp_footer(); ?>

</body>
</html>
