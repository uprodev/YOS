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

                $('.basket-count').text(data.data.cart_qty);

                that.text('товар додано до кошика');

                ajax_mini_cart_update();

            }
        });
    })


    function ajax_mini_cart_update() {

        $.ajax({
            url:globals.url,
            data:{

                action:'update_mini_cart',
            },
            success:function(data){

                $('.side-basket__container').html(data);

            }
        })
    }


});