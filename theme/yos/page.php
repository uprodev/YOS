<?php 

get_header(); 

?>

<?php if(is_cart()):?>

	<main class="_page basket-page">

<?php elseif(is_checkout()):?>

<?php else:?>

	<main class="_page checkout-page">

<?php endif;?>
    <div class="head-height-compensation"></div>

	the_content();

?>

	</main>

<?php 

get_footer();

?>