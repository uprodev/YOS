<?php 

get_header(); 

?>

<?php if(is_cart()):?>

	<main class="_page basket-page">

<?php elseif(is_checkout()):

    if(is_wc_endpoint_url( 'order-received' )): ?>
        <main class="_page order-info-page">
    <?php else:?>
        <main class="_page checkout-page">
    <?php endif;?>

<?php else:?>

	<main class="_page">

<?php endif;?>
    <div class="head-height-compensation"></div>

	<?php the_content();?>

	</main>

<?php 

get_footer();

?>