<?php 

get_header(); 

?>

<?php if(is_cart() || is_checkout()):?>

	<main class="_page basket-page">
        <div class="head-height-compensation"></div>

<?php else:?>

	<main class="_page">

<?php endif;


	the_content();

?>

	</main>

<?php 

get_footer();

?>