<?php
/**
* The template for displaying checkbox filters
*
* Override this template by copying it to yourtheme/woocommerce-ajax_filters/checkbox.php
*
* @author     BeRocket
* @package     WooCommerce-Filters/Templates
* @version  1.0.1
*/
extract($berocket_query_var_title);

foreach($terms as $term){break;}
//Get default template functionality
$template_content = BeRocket_AAPF_Template_Build_default();
//set unique id for filter
$filter_unique_class = 'bapf_'.$unique_filter_id;
$template_content['template']['attributes']['id']                                           = $filter_unique_class;
//set this template class
$template_content['template']['attributes']['class']['filter_type']                         = 'bapf_ckbox';
//Set data for filter links
$template_content['template']['attributes']['data-op']                                      = $operator;
$template_content['template']['attributes']['data-taxonomy']                                = ( berocket_isset($term, 'wpml_taxonomy') ? $term->wpml_taxonomy : $term->taxonomy );
//Set name for selected filters area and other siilar place
$template_content['template']['attributes']['data-name']                                    = $title;
//Set widget title
$template_content['template']['content']['header']['content']['title']['content']['title']  = $title;

$template_content['template']['content']['header']['content']['title']['tag']  = 'div';
$template_content['template']['content']['header']['content']['title']['class'][]  = 'spoller__item-title';



$terms_content = array();
$class = [];

//  print_r($terms);
foreach( $terms as $i => $term ) {
    $element_unique = $filter_unique_class.'_'.$term->term_id;
    $letter =  substr(strtolower($term->name), 0, 1);
    $terms_content['element_'.$i] = apply_filters('BeRocket_AAPF_template_single_item', array(
        'type'          => 'tag',
        'tag'           => 'li',
        'attributes'    => array(
            'data-letter'   => $letter
        ),
        'content'       => array(
            'checkbox'  => array(
                'type'          => 'tag_open',
                'tag'           => 'input',
                'attributes'    => array(
                    'data-name'     => $term->name,
                    'id'            => $element_unique,
                    'type'          => 'checkbox',
                    'value'         => $term->value,

                ),
            ),
            'label'     => array(
                'type'          => 'tag',
                'tag'           => 'label',
                'attributes'    => array(
                    'for'           => $element_unique
                ),
                'content'       => array(
                    'name' => $term->name
                )
            ),
        )
    ), $term, $i, $berocket_query_var_title);


    if ('pa_brand' === $term->taxonomy) {
        $class['class'] = ['filter-brands__list'];
    }

}

if ($template_content['template']['attributes']['data-taxonomy']  == 'pa_brand') {
    $i = 0;

    foreach ($terms_content as $key=>$terms_content_item) {
        $l = $terms_content_item['attributes']['data-letter'];
        $terms_content_new[$l][] = $terms_content_item;
        $i++;
    }

    ksort($terms_content_new);
    foreach ($terms_content_new as $letter => $terms_content_new_item_letter) {
        foreach ($terms_content_new_item_letter as $terms_content_new_item) {

            if ($letter !== $new_letter) {
                $terms_content_new_sorted[] = apply_filters('BeRocket_AAPF_template_single_item', array(
                    'type'          => 'tag',
                    'tag'           => 'li',
                    'attributes'    => array(),
                    'content'       => array(
                        'label'     => array(
                            'type'          => 'tag',
                            'tag'           => 'div',
                            'attributes'    => array(

                            ),
                            'content'       => array(
                                'name' => '<div class="filter-brands__letter">'.$letter.'</div>'
                            )
                        ),
                    )
                ), $term, $i, $berocket_query_var_title);
                $i++;

            }

            $terms_content_new_sorted[] = $terms_content_new_item;
            $new_letter = $letter;
        }

    }

    $terms_content = $terms_content_new_sorted;
    $letter = '';

}




if (count($terms_content) > 2) {
ob_start();
?>
<div class="filter__block-search">
    <div class="input-wrap" data-input="">
        <input type="text" class="input">
        <span class="input-label">Пошук</span>
    </div>
</div>
<?php

$template_content['template']['content']['filter']['content']['custom_content']
     = array(
    'type'          => 'tag',
    'tag'           => 'div',
    'attributes'    => array(),
    'content'       => [ob_get_clean()]
);

}


$template_content['template']['content']['filter']['content']['list']  = array(
    'type'          => 'tag',
    'tag'           => 'ul',
    'attributes'    => $class,
    'content'       => array()
);

$template_content['template']['content']['filter']['content']['list']['content'] = $terms_content;
$template_content = apply_filters('BeRocket_AAPF_template_full_content', $template_content, $terms, $berocket_query_var_title);


if( count($template_content['template']['content']['filter']['content']['list']['content']) > 0 ) {
    echo BeRocket_AAPF_Template_Build($template_content);
}


