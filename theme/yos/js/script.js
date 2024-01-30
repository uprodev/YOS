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
                $('.basket-qty').text('(' + data.data.cart_qty + ')');

                that.text('товар додано до кошика');

                ajax_mini_cart_update();

            }
        });
    })


    /* recently add to cart */

    $(document).on('click', '.addit-add', function (e) {

        e.preventDefault();

        $('.recently-row').remove();

        $(document.body).trigger('wc_update_cart');
        $( document.body ).trigger( 'wc_fragment_refresh' );

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
                $('.basket-qty').text('(' + data.data.cart_qty + ')');
                $('.cart-sub').html(data.data.subtotal);

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
                $('.basket-qty').text('(' + data.data.cart_qty + ')');
                $('.cart-sub').html(data.data.subtotal);
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
        let vol = $('input[name="volume"]:checked').val();

        $('#pa_color').val(color).change();
        $('#pa_volumes').val(vol).change();

    })

    $(document).on('click', '.volume-item', function (){
        let volumes = $(this).attr('data-volumes');
        let color = $('input[name="colors"]:checked').val();

        $('#pa_volumes').val(volumes).change();
        $('#pa_color').val(color).change();

    })


    /* apply coupon */

    $(document).on('click', '[name="apply_coupon_code"]', function (e) {

        e.preventDefault();
        var that = $(this);

        var coupon = $('#code_coupon').val();
        $.ajax({
            type: 'POST',
            url: wc_add_to_cart_params.ajax_url,
            data: {
                action: 'apply_coupon',
                coupon: coupon,
            },
            success: function (data) {
                that.after(data.message);
                $('.cart-sub').html(data.total);
                $('.coupon-row').show();
                $('.coupon-row>.text-nowrap').text('-'+data.discount+'₴');
                $(document.body).trigger('update_checkout');

            },
            error: function(data){
                $('.promo-error').show();
            },
        });
    });


    /**
     * favourites
     */

    function onlyUnique(value, index, array) {
        return array.indexOf(value) === index;
    }

    function getKeyByValue(object, value) {
        return Object.keys(object).find(key => object[key] === value);
    }


    var globalFav = globals.fav

    $(document).on('click', '.add_to_fav', function () {

        $(this).toggleClass('active');

        var user_id = $(this).attr('data-user_id');
        var product_id = $(this).attr('data-product_id');
        var liked = $(this).attr('data-liked');

        if (user_id > 0) {
            var fav = globalFav ? globalFav : [];
        } else {
            var fav = Cookies.get('fav') ? Cookies.get('fav') : [];
        }

        if (fav.length > 0) {
            fav = fav.split('|');
        }

        fav = fav.filter(onlyUnique);

        if (liked) {
            var key = getKeyByValue(fav, product_id)
            delete fav[key];

        } else {
            fav.push(product_id);
            $(this).attr('data-liked', 1);
        }

        fav = fav.join('|');

        Cookies.set('fav', fav);
        globalFav = fav
        if (user_id > 0) {

            $.ajax({
                type: 'POST',
                url: wc_add_to_cart_params.ajax_url,

                data: {
                    action: 'add_to_fav',
                    user_id: user_id,
                    fav: fav
                },
                success: function (data) {

                },
            });
        }
    });



    /* dropzone */

    var files = []
    $(".drop-zone").each(function() {

        $(this).dropzone({
            url: globals.upload,
            maxFiles: 10,
            previewsContainer: this.querySelector('.drop-zone__preview'),
            addRemoveLinks: true,
            maxFilesize: 10, // MB
            //   uploadMultiple: true,
            acceptedFiles: ".jpg, .jpeg, .png, .gif, .pdf",


            init: function() {

                this.on("success", function(file, data) {

                    files.push(data)

                    $('[name="media_ids"]').val(files.join(','))

                });

                let fraction = this.element.querySelector('.drop-zone__fraction');
                let submitBtn = this.element.closest('form').querySelector('[type="submit"], .form__submit');
                let dt = new DataTransfer();
                const numberOfFilesHandler = () => {
                    fraction.innerText = dt.files.length + '/10';
                    this.element.classList.toggle('drop-zone--has-files', dt.files.length > 0)

                    if(dt.files.length > 10) {
                        submitBtn.setAttribute('disabled', true);
                    } else {
                        submitBtn.removeAttribute('disabled');
                    }

                    if(dt.files.length === 0) {
                        let messageText = this.element.closest('form').querySelector('.message-text');

                        if(messageText) {
                            messageText.innerHTML = '';
                        }
                    }
                }

                this.on("addedfile", file => {
                    dt.items.add(file)

                    numberOfFilesHandler();
                })

                this.on("removedfile", file => {
                    dt.items.remove(file)
                    numberOfFilesHandler();
                })
            },



        });
    })
});