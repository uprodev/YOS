<?php 

get_header(); 

?>

<?php if(is_cart()):?>

	<main class="_page basket-page">

<?php elseif(is_checkout()):?>

    <main class="_page checkout-page">

<?php else:?>

	<main class="_page">

<?php endif;?>
    <div class="head-height-compensation"></div>

	<?php the_content();?>

	</main>

<?php 

get_footer();

?>