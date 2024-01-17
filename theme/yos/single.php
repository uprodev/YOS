<?php 

get_header(); 

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
							<li><a href="#"><?= __('добірки', 'yos');?></a></li>
							<li><?php the_title();?></li>
						</ul>
					</div>
				</div>
				<div class="article__body article__grid">
					<div class="article__col-1">
						<div class="article__nav">
							<div class="article__nav-title"><?= __('зміст', 'yos');?></div>
							<ul>
								<li>
									<a href="#products-1" class="button-link"><span>полігідроксикислота (PHA)</span></a>
								</li>
								<li>
									<a href="#products-2" class="button-link"><span>гідроксикислота (AHA)</span></a>
								</li>
								<li>
									<a href="#products-3" class="button-link"><span>бета-гідроксикислота (BHA)</span></a>
								</li>
							</ul>
						</div>
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