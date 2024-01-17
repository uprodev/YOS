<?php 

get_header();

$aside = get_field('aside_menu');
$blog_id = get_option('page_for_posts');

?>

	<main class="_page home-page">
		<div class="head-height-compensation"></div>
		<section class="article">
			<div class="container">
				<div class="article__head article__grid">
					<div class="article__col-1">
						<h2 class="article__title"><?= __('добірки', 'yos');?></h2>
					</div>
					<div class="article__col-2">
						<ul class="breadcrumbs">
							<li><a href="<?= get_home_url();?>"><?= __('головна', 'yos');?></a></li>
							<li><a href="<?= get_permalink($blog_id);?>"><?= get_the_title($blog_id);?></a></li>
							<li><?php the_title();?></li>
						</ul>
					</div>
				</div>
				<div class="article__body article__grid">
					<div class="article__col-1">
                        <?php if($aside):?>
                            <div class="article__nav">
                                <div class="article__nav-title"><?= __('зміст', 'yos');?></div>
                                <ul>
                                    <?php foreach($aside as $as):?>
                                        <li>
                                            <a href="#<?= $as['id'];?>" class="button-link"><span><?= $as['title'];?></span></a>
                                        </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        <?php endif;?>
					</div>
					<div class="article__col-2">
						<div class="article__content">
							<div class="article__content-head">
								<h2 class="article__content-head-title">
									<span><?php the_title();?></span></h2>
								<div class="article__content-head-date">
									<?= __('Останнє оновлення:', 'yos');?> <?=  get_post_modified_time('d F Y');?>
								</div>
							</div>
							<div class="article__text text-content last-no-margin">
								<?php the_content();?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>



<?php 

get_footer();

?>