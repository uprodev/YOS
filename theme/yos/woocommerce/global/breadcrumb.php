<?php
/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<ul class="breadcrumbs<?= is_product()?'':' _dynamic_adapt_';?>" data-da="<?= is_product()?'.product__col-2,992,first':'.catalog__head-row--selected-filters-and-sort,992,first';?>">
    <?php
echo do_shortcode('[wpseo_breadcrumb]');
?>
</ul>
<?php

