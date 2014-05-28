<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">

        <!--<?php if ( has_post_thumbnail() && ! post_password_required() ) { ?>
        <div class="entry-thumbnail">
            <?php the_post_thumbnail(); ?>
        </div>
        <?php } //.entry-thumbnail ?> -->


        <h1 class="entry-title">
            <?php the_title(); ?>
            <?php edit_post_link( __( 'Edit', ZEETEXTDOMAIN ), '<small class="edit-link pull-right">', '</small>' ); ?>
        </h1> 


    </header><!--/.entry-header -->

    <?php if ( is_search() ) { ?>
    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div>
    <?php } else { ?>
    <div class="entry-content">
        <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', ZEETEXTDOMAIN ) ); ?>
    </div>
    <?php } //.entry-content ?>

    <footer>
        <?php zee_link_pages(); ?>
    </footer>

</article><!--/#post-->

