<?php 

get_header(); 

?>

<?php if(is_product()):?>

	<main class="_page product-single-page">
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