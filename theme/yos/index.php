<?php

get_header();

$blog_id = get_option('page_for_posts');
$ids = get_queried_object_id();

$args['post'] = 'post';

if(is_category()){
    $args['cat'] = $ids;
}
if($_GET['s']){
    $args['s'] = $_GET['s'];
}

$wp_query = new WP_Query($args);
$i = 1;
$j=1;

$cats = get_terms([
    'taxonomy' => 'category',
    'hide_empty' => false,
    'exclude' => 1,
]);

?>

<main class="_page home-page">
    <div class="head-height-compensation"></div>
    <?php get_template_part('parts/header/categories-menu');?>
    <section class="articles-preview">
        <div class="container">
            <div class="articles-preview__head">
                <div class="articles-preview__col-1">
                    <h2 class="articles-preview__title"><?= is_home()?get_the_title($blog_id):get_queried_object()->name;?></h2>
                </div>
                <div class="articles-preview__col-2">
                    <ul class="breadcrumbs">
                        <li><a href="<?= get_home_url();?>"><?= __('головна', 'yos');?></a></li>
                          <?php if (!is_home()) { ?>
                            <li><a href="<?php the_permalink(256) ?>"><?= __('ДОБІРКИ', 'yos');?></a></li>
                          <?php } ?>
                        <li><?= is_home()?get_the_title($blog_id):get_queried_object()->name;?></li>
                    </ul>
                </div>
            </div>

          <div id="scrollyVideo" data-video="<?= $is_video_desktop ?>" data-videomob="<?= $is_video_mobile ?>"></div>

            <div class="articles-preview__grid">

                <div class="articles-preview__grid-row first">
                    <?php if($cats):?>
                        <div class="articles-preview__grid-item" data-da=".article-preview-card__content,992,last">
                            <div class="article-categories">
                                <div class="article-categories__title"><?= __('Добірки за категоріями', 'yos');?></div>
                                <ul class="article-categories__list">
                                    <?php foreach($cats as $cat):?>
                                        <li>
                                            <a href="<?= get_term_link($cat->term_id);?>"><?= $cat->name;?></a>
                                        </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                    <?php endif;?>
                    <?php while($wp_query->have_posts()): $wp_query->the_post();
                        if($i<3) {
                            get_template_part('parts/post-content', null, ['num' => $i]);
                        }
                        $i++;
                        endwhile;
                        wp_reset_postdata(); ?>
                </div>

                <div class="articles-preview__grid-row">
                    <?php while($wp_query->have_posts()): $wp_query->the_post();
                        if($j>2) {
                            get_template_part('parts/post-content', null, ['num' => $j]);
                        }
                        $j++;
                    endwhile;
                    wp_reset_postdata();?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer();
