jQuery(document).ready(function ($) {

    var sv = $('.show-variation').attr('data-vario');
    $('.product-card__btn-to-basket').attr('data-variation_id', sv);

    $(document).on('click', '.product-card__option-item', function(){
       var attr = $(this).attr('data-vario');

       $(this).closest('.product-card__footer').find('.product-card__btn-to-basket').attr('data-variation_id', attr);
    });


    /**
     * add_to_cart
     */


    $(document).on('click', '.product-card__btn-to-basket', function (e) {

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

            success: function (response) {

                ajax_mini_cart_update();

                //     update_totals()

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

                ajax_mini_cart_update();

            }
        });
    })




});