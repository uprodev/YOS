jQuery(document).ready(function ($) {

    Dropzone.autoDiscover = false;


    // $( '.product-card__footer form' ).each(function() {
    //     let vid = $(this).find('input[name="var_id"]').val();
    //
    //     $(this).find('.product-card__btn-to-basket').attr('data-variation_id', vid);
    // });

    // $(document).on('change', '.loop-variation input', function(){
    //
    //
    //     var product_id = $(this).closest('form').attr('data-product_id');
    //
    //
    //     let attr = $(this).attr('data-vario');
    //
    //     let ind = $(this).attr('data-ind');
    //
    //     $(this).closest('.product-card__footer').find('.product-card__btn-to-basket').attr('data-variation_id', attr);
    //
    //     $(this).closest('.product-card').find('.product-card-label-perc').removeClass('show');
    //
    //     $(this).closest('.product-card').find('.product-card-label-perc[data-index="'+ind+'"]').addClass('show');
    //
    // });


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

                $( document.body ).trigger( 'wc_fragment_refresh' );
                $( document.body ).trigger('wc_update_cart');

                if ( !$( '.woocommerce-cart-form' ).length) {
                    window.sideBasket.open();
                }

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

                $( document.body ).trigger( 'wc_fragment_refresh' );

            }
        })
    }


    /* remove_from_cart_button */


    $(document).on('click', '.product-card-sm__btn-remove', function( e ){
        e.preventDefault();
        var key = $(this).attr('data-cart_item_key');

        if ( $( '.woocommerce-cart-form' ).length ||  $( '.woocommerce-checkout' ).length) {
          $(this).closest('li').remove();
        }

        $(this).closest('.product-card-sm').remove();
        $.ajax({
            type: 'get',
            url: wc_add_to_cart_params.ajax_url,
            data: {
                action: 'remove_from_cart',
                key: key
            },

            success: function (data) {

                // $('.basket-count').text(data.data.cart_qty);
                // $('.basket-qty').text('(' + data.data.cart_qty + ')');
                // $('.cart-sub').html(data.data.subtotal);

                $(document.body).trigger('wc_update_cart');
                $(document.body ).trigger( 'wc_fragment_refresh' );
                $(document.body).trigger('update_checkout');

             //   if (data.count === 0) location.href = '/shop';

            }
        })

    })


    /* change qty product */



  $(document).on('click', '.quantity__btn.plus, .quantity__btn.minus', function(){

    var that = $(this)
    setTimeout(function(){

      let item_quantity = that.closest('.quantity').find('.quantity__value').val();

      let key = that.closest('.quantity').attr('data-key');

      var currentVal = parseFloat(item_quantity);


      $.ajax({
        type: 'GET',
        url: wc_add_to_cart_params.ajax_url,
        data: {
          action: 'qty_cart',
          hash: key,
          quantity: currentVal,
        },
        success: function (data) {
          $(document.body).trigger('wc_update_cart');
          $(document.body).trigger('update_checkout');
          $( document.body ).trigger( 'wc_fragment_refresh' );
        },
      });
    }, 100)
  })


    /* variation  */

    $(document).on('show_variation', '.product-main-info .single_variation_wrap', function (event, variation) {

         console.log(variation);

        $('.add-cart').attr('data-variation_id', variation.variation_id);
        $('.cost').html(variation.price_html);

        $('.product-actions__price').show();
        let pr = variation.display_regular_price;
        let sale = variation.display_price;
        let perc = Math.round((pr-sale)*100/pr);
        if(pr == sale){
            $('.product-actions__price-current').text(formatMoney(pr, '', '', ' ') + ' ₴');
            $('.price-sale').hide();
        }else {
            $('.product-actions__price-current').text(formatMoney(sale, '', '', ' ') + ' ₴');
            $('.product-actions__price-old').text(formatMoney(pr, '', '', ' ') + ' ₴');
            $('.product-actions__price-profit').text('-' + perc + '%');
            $('.price-sale').show();
        }

        if (variation.sku) {
          $('._sku').parent().show()
          $('._sku').text(variation.sku)
        } else {
          $('._sku').parent().hide()
        }

        if (variation.image.url) {
          $('.main-image').attr('src', variation.image.url)
        }

        if (variation.is_in_stock) {
          $('.main-image').attr('src', variation.image.url)
        }
        var stock = variation.is_in_stock ? $('.product-actions__option-text.stock').attr('data-instock') : $('.product-actions__option-text.stock').attr('data-outofstock')

        $('.product-actions__option-text.stock').text(stock)

        if (!variation.is_in_stock) {
          $('.product-actions__footer .add-cart').prop('disabled', true).hide()
          $('.btn-avaliable-var').show()
        } else {
          $('.product-actions__footer .add-cart').prop('disabled', false).show()
          $('.btn-avaliable-var').hide()
        }





    });


  if ($('[name="pa_color"]').length) {
    setTimeout(function(){
      $('[name="pa_color"]').change()
    }, 200)

    $('[name="pa_color"]').change(function(){
      var label = $('[name="pa_color"]:checked').attr('data-label')
      $('.product-actions__option-text.color-label').text(label)
    })

  }


  /* variation loop  */

  $(document).on('change', 'li .product-card input',  function(){

      var data = $(this).closest('form').serialize();
      var product_id = $(this).closest('form').attr('data-product_id');
      var that = $(this);
      $(this).closest('.product-card').find('.product-card-label-perc').removeClass('show');
      $.ajax({
        type: 'POST',
        url: wc_add_to_cart_params.ajax_url,
        data: {
          action: 'find_variation',
          data: data,
          product_id: product_id
        },
        success: function (data) {
          that.closest('.product-card__footer').find('.product-card__btn-to-basket').attr('data-variation_id', data.variation_id);
          that.closest('.product-card').find('.product-card__price-current').html(data.price);

          if (data.perc > 0) {
            that.closest('.product-card').find('.product-card-label-perc').addClass('show').html('-' + data.perc + '%');
          }
        },
        error: function(data){

        },
      });




      let ind = $(this).attr('data-ind');

    //  $(this).closest('.product-card').find('.product-card-label-perc').removeClass('show');

     // $(this).closest('.product-card').find('.product-card-label-perc[data-index="'+ind+'"]').addClass('show');

     // if ($(this).closest('.product-card').find('.product-card__price').attr('data-base_price') !== variation.display && variation.price_html)





        // if ($(this).closest('.product-card').find('[name="pa_color"]').length) {
        //   var label = $(this).closest('.product-card').find('[name="pa_color"]:checked').attr('data-label')
        //   $(this).closest('.product-card').find('.product-actions__option-text.color-label').text(label)
        //
        // }



  })

    $(document).on('change', '.product-main-info [name="pa_color"]', function (){
        let color = $(this).closest('.color-item').attr('data-color');
        let vol = $('input[name="pa_volumes"]:checked').val();

        $('#pa_color').val(color).change();
        $('#pa_volumes').val(vol).change();

        $(document).trigger('show_variation')

    })

    // $(document).on('click', '.volume-item', function (){
    //     let volumes = $(this).attr('data-volumes');
    //     let color = $('input[name="colors"]:checked').val();
    //
    //     $('#pa_volumes').val(volumes).change();
    //     $('#pa_color').val(color).change();
    //
    // })

  $(document).on('change', '.product-main-info .volume-item input', function (){
    var name = $(this).attr('name');
    var val = $(this).val();

    $('.variations_form  #'+ name ).val(val).change()

    return false

  })


  $(document).on('change', '.product-card .var-item input', function (){
    var name = $(this).attr('name');
    var val = $(this).val();

    $(this).closest('.product-card').find('.variations_form  #'+ name ).val(val).change()

    return false

  })

    /* apply coupon */

    $(document).on('click', '[name="apply_coupon_code"]', function (e) {

        e.preventDefault();
        var that = $(this);

        var coupon = $('[name="coupon_code"]').val();
        $.ajax({
            type: 'GET',
            url: wc_add_to_cart_params.ajax_url,
            data: {
                action: 'apply_coupon',
                coupon: coupon,
            },
            success: function (data) {
              console.log(data)
                $('.promotional-code__text').html(data.message);
                $('.cart-sub').html(data.total);
                if(data.discount>0) {
                    $('.coupon-row').show();
                    $('.coupon-row>.text-nowrap').text('-' + data.discount + '₴');
                }
                $(document.body).trigger('update_checkout');

                if (data.discount > 0)
                  $( document.body ).trigger('wc_update_cart');
            },
            error: function(data){
                $('.promotional-code__text').html(data.message);
            },
        });
    });


  $(document).on('click', '.woocommerce-remove-coupon', function(){
    setTimeout(function(){
      $(document.body).trigger('update_checkout');
    }, 300)

  })


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

    $('.drop-zone').dropzone({
        url: globals.upload,
        previewsContainer: this.querySelector('.drop-zone__preview'),
        addRemoveLinks: true,
        maxFiles: 10,
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

            this.on("addedfile", file => {
                dt.items.add(file)
            })

            this.on("removedfile", file => {
                dt.items.remove(file)
            })
        },


    });


    /*  Form Out on stock  */


    $(document).on('input', '.phone-input', function (){
        let val = $(this).val();

        $('#phone').val(val);
    })

    document.addEventListener( 'wpcf7mailsent', function( event ) {
        var id = event.detail.contactFormId;
        if ( id == 661 ) {
            window.popup.open('#popup-notify-availability-thank-you');
        }
    }, false );

  $(document).on('click', '.btn-avaliable', function (){
    let product = $(this).attr('data-product');
    let product_id = $(this).attr('data-product_id');

    $('[name="product"]').val(product + ' id:' + product_id);
  })

    $(document).on('click', '.icon-close', function(){

        $.cookie("Modal", 'close', { expires: 1, path: "/" });

    });


    /* scroll top*/

    $(document).on('click','.pagination__btn', function() {
        $('html, body').animate({ scrollTop: 0 }, 'slow');

        return false;
    });

    //
    // $(window).load(function(){
    //   setTimeout(function(){
    //     $("#payment").css({'opacity': 1})
    //   }, 400)
    //
    // })



});


function formatMoney(number, decPlaces, decSep, thouSep) {
  decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
    decSep = typeof decSep === "undefined" ? "." : decSep;
  thouSep = typeof thouSep === "undefined" ? "," : thouSep;
  var sign = number < 0 ? "-" : "";
  var i = String(parseInt(number = Math.abs(Number(number) || 0).toFixed(decPlaces)));
  var j = (j = i.length) > 3 ? j % 3 : 0;

  return sign +
    (j ? i.substr(0, j) + thouSep : "") +
    i.substr(j).replace(/(\decSep{3})(?=\decSep)/g, "$1" + thouSep) +
    (decPlaces ? decSep + Math.abs(number - i).toFixed(decPlaces).slice(2) : "");
}
