<div class="popup" id="popup-search">
    <div class="popup__body">
        <div class="popup__content">
            <button class="popup__close" data-popup="close-popup"><span class="icon-close-thin"></span></button>
            <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="hidden" name="post_type" value="product" />
                <div class="main-search__inner">
                    <input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field input" placeholder="<?= __('Що ви шукаєте?', 'yos');?>" value="<?php echo get_search_query(); ?>" name="s" />
                    <button class="main-search__btn">
                        <span class="icon-search"></span>
                    </button>
                    <button type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>" class="<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ); ?> main-search__btn-close"><span class="icon-close-thin"></span></button>
                </div>
            </form>
        </div>
    </div>
</div>
