jQuery(document).ready(function ($) {
    $(document).on('click', '.product-card__option-item', function(){
       var attr = $(this).attr('data-vario');

       $(this).closest('.product-card__footer').find('.product-card__btn-to-basket').attr('data-variation_id', attr);
    });


});