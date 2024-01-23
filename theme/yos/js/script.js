jQuery(document).ready(function ($) {

    $( '.product-card__footer form' ).each(function() {
        let vid = $(this).find('input[name="var_id"]').val();

        $(this).find('.product-card__btn-to-basket').attr('data-variation_id', vid);
    });

    $(document).on('click', '.product-card__option-item', function(){
       let attr = $(this).attr('data-vario');
       let ind = $(this).attr('data-ind');

       $(this).closest('.product-card__footer').find('.product-card__btn-to-basket').attr('data-variation_id', attr);

        $(this).closest('.product-card').find('.product-card-label-perc').removeClass('show');

        $(this).closest('.product-card').find('.product-card-label-perc[data-index="'+ind+'"]').addClass('show');

    });


    /**
     * add_to_cart
     */


    $(document).on('click', '.add-cart', function (e) {

        e.preventDefault();

        var product_id = $(this).attr('data-product_id');
        var variation_id = $(this).attr('data-variation_id');
        var qty = 1;

        var that = $(this);


        $.ajax({

            url: globals.url,
            data: {
                action: 'add_to_cart',
                product_id: product_id,
                variation_id: variation_id,
                qty: qty
            },
            success: function (data) {

                $('.basket-count').text(data.data.cart_qty).removeClass('disable');

                that.text('товар додано до кошика');

                ajax_mini_cart_update();

            }
        });
    })

    /* mini cart update */

    function ajax_mini_cart_update() {

        $.ajax({
            url:globals.url,
            data:{

                action:'update_mini_cart',
            },
            success:function(data){

                $('.side-basket').html(data);

            }
        })
    }


    /* remove_from_cart_button */

    $(document).on('click', '.product-card-sm__btn-remove', function( e ){
        e.preventDefault();
        var key = $(this).attr('data-cart_item_key');

        $(this).closest('.product-card-sm').remove();
        $.ajax({
            type: 'get',
            url: wc_add_to_cart_params.ajax_url,
            data: {
                action: 'remove_from_cart',
                key: key
            },

            success: function (data) {

                $('.basket-count').text(data.data.cart_qty);

                ajax_mini_cart_update();

            }
        })

    })


    /* change qty product */

    $(document).on('click', '.quantity__btn.plus, .quantity__btn.minus', function(){

        let val = $(this).closest('.quantity').find('.quantity__value').val();

        let key = $(this).closest('.quantity').attr('data-key');

        let products = [];

        $('.side-basket__products-list li').each(function(){

            var product_id = $(this).attr('data-ids');
            var qty =  $(this).find('.quantity__value').val();
            products.push([product_id,qty]);
        });

        $.ajax({
            type: "GET",
            url: woocommerce_params.ajax_url,
            data: {
                action : 'set_cart_item_qty',
                key:key,
                qty:val,
                products:products
            },

            success: function (data) {

                $('.basket-count').text(data.data.cart_qty);

                ajax_mini_cart_update();

            }
        });
    })


    /* variation  */

    $(document).on('show_variation', '.single_variation_wrap', function (event, variation) {

        console.log(variation);

        $('.add-cart').attr('data-variation_id', variation.variation_id);
        $('.cost').html(variation.price_html);

        $('.product-actions__price').show();
        let pr = variation.display_regular_price;
        let sale = variation.display_price;
        let perc = Math.round((pr-sale)*100/pr);
        if(pr == sale){
            $('.product-actions__price-current').text(pr + ' ₴');
            $('.price-sale').hide();
        }else {
            $('.product-actions__price-current').text(sale + ' ₴');
            $('.product-actions__price-old').text(pr + ' ₴');
            $('.product-actions__price-profit').text('-' + perc + '%');
            $('.price-sale').show();
        }
    });

    $(document).on('click', '.color-item', function (){
        let color = $(this).attr('data-color');

        $('#pa_color').val(color).change();
    })

    $(document).on('click', '.volume-item', function (){
        let volumes = $(this).attr('data-volumes');

        $('#pa_volumes').val(volumes).change();
    })
});