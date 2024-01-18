<?php 

get_header(); 

?>

<?php if(is_product_category() || is_page(wc_get_page_id( 'shop' ))):?>

	<main class="_page catalog-page">
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