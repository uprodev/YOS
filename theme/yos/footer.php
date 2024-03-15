<?php if(!is_404()):


        get_template_part('parts/subscription');
    ?>

    <!-- == FOOTER ================== -->
    <div class="top-space-80 top-space-md-150">

        <?php get_template_part('parts/footer/footer-desctop');?>

        <?php get_template_part('parts/footer/footer-mob');?>

    </div>
    <!-- == // FOOTER ================== -->
<?php endif;?>
  <?php wp_footer(); ?>
	</body>
</html>
