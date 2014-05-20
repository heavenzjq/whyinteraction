<?php if(!is_page()) { ?>
</div><!--/#primary-->
</div><!--/.col-lg-12-->
</div><!--/.row-->
</div><!--/.container.-->
</section><!--/#main-->
<?php } ?>

<section id="bottom" class="wet-asphalt">
  <div class="container">
    <div class="row">
      <?php dynamic_sidebar('bottom'); ?>
    </div>
  </div>
</section>

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