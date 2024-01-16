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
								<p>
									Усі кислоти можна поділити на 3 основні групи: <strong>полігідроксикислота (PHA),
										альфа-гідроксикислота (AHA) та бета-гідроксикислота (BHA).</strong>
								</p>
								<p>
									<strong>Ну що ж, почнімо з полігідроксикислоти — PHA</strong>
								</p>
								<p>
									Полигідроксикислота (PHA) заявила про себе у світі хімічних відлущувальних засобів, як
									найбільш м’яка. Є серйозні дослідження, що підтверджують її користь. Шукайте PHA, такі як:
									глюконолактон і лактобіонова кислота, обидва з яких обіцяють дбайливе ставлення до шкіри
									через молекулярний розмір і структуру. PHA також можуть давати антиоксидантну дію та
									потенційно підвищувати поверхневу міцність шкіри. Однак, дослідження не показують, що PHA
									перевершують аналоги — AHA і BHA, проте це відмінний варіант, якщо ваша шкіра не «приймає»
									інші хімічні ексфоліанти. PHA підходить власницям навіть найбільш чутливої шкіри, додатково
									зволожує та делікатно відлущує.
								</p>
								<figure>
									<picture>
										<source srcset="img/photo/article.jpg" media="(min-width: 768px)" >
										<img  src="img/photo/article-mob.jpg" alt="img">
									</picture>
								</figure>
								<p>
									<strong>
										Ну що ж, почнімо з полігідроксикислоти — PHA
									</strong>
								</p>
								<p>
									Полигідроксикислота (PHA) заявила про себе у світі хімічних відлущувальних засобів, як найбільш м’яка. Є серйозні дослідження, що підтверджують її користь. Шукайте PHA, такі як: глюконолактон і лактобіонова кислота, обидва з яких обіцяють дбайливе ставлення до шкіри через молекулярний розмір і структуру. PHA також можуть давати антиоксидантну дію та потенційно підвищувати поверхневу міцність шкіри. Однак, дослідження не показують, що PHA перевершують аналоги — AHA і BHA, проте це відмінний варіант, якщо ваша шкіра не «приймає» інші хімічні ексфоліанти. PHA підходить власницям навіть найбільш чутливої шкіри, додатково зволожує та делікатно відлущує.
								</p>
							</div>
							<div class="article__products" id="products-1">
								<div class="article__products-text text-content last-no-margin text-end">
									<p>
										<strong>
											Ви знайдете PHA в таких продуктах по догляду за шкірою, як:
										</strong>
									</p>
								</div>
								<ul class="article__products-list">
									<li>
										<div class="product-card-sm">
											<div class="product-card-sm__left">

												<a href="#" class="product-card-sm__img">
													<img src="img/photo/product-card-img-1.png" alt="">
												</a>
											</div>
											<div class="product-card-sm__right">
												<div class="product-card-sm__title"><a href="#">zein obagi</a></div>
												<div class="product-card-sm__text">
													<div class="product-card-sm__text-1">
														Exfoliating Polish, 65g
													</div>
													<div class="product-card-sm__text-2">
														Zo Skin Health
													</div>
												</div>
												<div class="product-card-sm__group">
													<div class="product-card-sm__price">
														<div class="product-card-sm__price-current">3 199 ₴</div>
														<div class="product-card-sm__price-old">7 299 ₴</div>
													</div>
												</div>
											</div>
										</div>
									</li>
									<li>
										<div class="product-card-sm">
											<div class="product-card-sm__left">

												<a href="#" class="product-card-sm__img">
													<img src="img/photo/product-card-img-2.png" alt="">
												</a>
											</div>
											<div class="product-card-sm__right">
												<div class="product-card-sm__title"><a href="#">rare paris</a></div>
												<div class="product-card-sm__text">
													<div class="product-card-sm__text-1">
														Ecological Cellulose, 65g
													</div>
													<div class="product-card-sm__text-2">
														Tresor Solaire
													</div>
												</div>
												<div class="product-card-sm__group">
													<div class="product-card-sm__price">
														<div class="product-card-sm__price-current">299 ₴</div>
													</div>
												</div>
											</div>
										</div>
									</li>
									<li>
										<div class="product-card-sm">
											<div class="product-card-sm__left">

												<a href="#" class="product-card-sm__img">
													<img src="img/photo/product-card-img-1.png" alt="">
												</a>
											</div>
											<div class="product-card-sm__right">
												<div class="product-card-sm__title"><a href="#">zein obagi</a></div>
												<div class="product-card-sm__text">
													<div class="product-card-sm__text-1">
														Exfoliating Polish, 65g
													</div>
													<div class="product-card-sm__text-2">
														Zo Skin Health
													</div>
												</div>
												<div class="product-card-sm__group">
													<div class="product-card-sm__price">
														<div class="product-card-sm__price-current">3 199 ₴</div>
														<div class="product-card-sm__price-old">7 299 ₴</div>
													</div>
												</div>
											</div>
										</div>
									</li>
									<li>
										<div class="product-card-sm">
											<div class="product-card-sm__left">

												<a href="#" class="product-card-sm__img">
													<img src="img/photo/product-card-img-1.png" alt="">
												</a>
											</div>
											<div class="product-card-sm__right">
												<div class="product-card-sm__title"><a href="#">zein obagi</a></div>
												<div class="product-card-sm__text">
													<div class="product-card-sm__text-1">
														Exfoliating Polish, 65g
													</div>
													<div class="product-card-sm__text-2">
														Zo Skin Health
													</div>
												</div>
												<div class="product-card-sm__group">
													<div class="product-card-sm__price">
														<div class="product-card-sm__price-current">3 199 ₴</div>
														<div class="product-card-sm__price-old">7 299 ₴</div>
													</div>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</div>

							<div class="article__text text-content last-no-margin">
								<p>
									<strong>Ну що ж, почнімо з полігідроксикислоти — PHA</strong>
								</p>
								<p>
									Полигідроксикислота (PHA) заявила про себе у світі хімічних відлущувальних засобів, як найбільш м’яка. Є серйозні дослідження, що підтверджують її користь. Шукайте PHA, такі як: глюконолактон і лактобіонова кислота, обидва з яких обіцяють дбайливе ставлення до шкіри через молекулярний розмір і структуру. PHA також можуть давати антиоксидантну дію та потенційно підвищувати поверхневу міцність шкіри. Однак, дослідження не показують, що PHA перевершують аналоги — AHA і BHA, проте це відмінний варіант, якщо ваша шкіра не «приймає» інші хімічні ексфоліанти. PHA підходить власницям навіть найбільш чутливої шкіри, додатково зволожує та делікатно відлущує.
								</p>
							</div>

							<div class="article__products" id="products-2">
								<div class="article__products-text text-content last-no-margin text-end">
									<p>
										<strong>
											Ви знайдете PHA в таких продуктах по догляду за шкірою, як:
										</strong>
									</p>
								</div>
								<ul class="article__products-list">
									<li>
										<div class="product-card-sm">
											<div class="product-card-sm__left">

												<a href="#" class="product-card-sm__img">
													<img src="img/photo/product-card-img-1.png" alt="">
												</a>
											</div>
											<div class="product-card-sm__right">
												<div class="product-card-sm__title"><a href="#">zein obagi</a></div>
												<div class="product-card-sm__text">
													<div class="product-card-sm__text-1">
														Exfoliating Polish, 65g
													</div>
													<div class="product-card-sm__text-2">
														Zo Skin Health
													</div>
												</div>
												<div class="product-card-sm__group">
													<div class="product-card-sm__price">
														<div class="product-card-sm__price-current">3 199 ₴</div>
														<div class="product-card-sm__price-old">7 299 ₴</div>
													</div>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</div>

							<div class="article__text text-content last-no-margin">
								<p>
									Усі кислоти можна поділити на 3 основні групи: <strong>полігідроксикислота (PHA),
										альфа-гідроксикислота (AHA) та бета-гідроксикислота (BHA).</strong>
								</p>
								<p>
									<strong>Ну що ж, почнімо з полігідроксикислоти — PHA</strong>
								</p>
								<p>
									Полигідроксикислота (PHA) заявила про себе у світі хімічних відлущувальних засобів, як
									найбільш м’яка. Є серйозні дослідження, що підтверджують її користь. Шукайте PHA, такі як:
									глюконолактон і лактобіонова кислота, обидва з яких обіцяють дбайливе ставлення до шкіри
									через молекулярний розмір і структуру. PHA також можуть давати антиоксидантну дію та
									потенційно підвищувати поверхневу міцність шкіри. Однак, дослідження не показують, що PHA
									перевершують аналоги — AHA і BHA, проте це відмінний варіант, якщо ваша шкіра не «приймає»
									інші хімічні ексфоліанти. PHA підходить власницям навіть найбільш чутливої шкіри, додатково
									зволожує та делікатно відлущує.
								</p>
								<figure>
									<picture>
										<source srcset="img/photo/article.jpg" media="(min-width: 768px)" >
										<img  src="img/photo/article-mob.jpg" alt="img">
									</picture>
								</figure>
								<p>
									<strong>
										Ну що ж, почнімо з полігідроксикислоти — PHA
									</strong>
								</p>
								<p>
									Полигідроксикислота (PHA) заявила про себе у світі хімічних відлущувальних засобів, як найбільш м’яка. Є серйозні дослідження, що підтверджують її користь. Шукайте PHA, такі як: глюконолактон і лактобіонова кислота, обидва з яких обіцяють дбайливе ставлення до шкіри через молекулярний розмір і структуру. PHA також можуть давати антиоксидантну дію та потенційно підвищувати поверхневу міцність шкіри. Однак, дослідження не показують, що PHA перевершують аналоги — AHA і BHA, проте це відмінний варіант, якщо ваша шкіра не «приймає» інші хімічні ексфоліанти. PHA підходить власницям навіть найбільш чутливої шкіри, додатково зволожує та делікатно відлущує.
								</p>
							</div>
							<div class="article__products" id="products-3">
								<div class="article__products-text text-content last-no-margin text-end">
									<p>
										<strong>
											Ви знайдете PHA в таких продуктах по догляду за шкірою, як:
										</strong>
									</p>
								</div>
								<ul class="article__products-list">
									<li>
										<div class="product-card-sm">
											<div class="product-card-sm__left">

												<a href="#" class="product-card-sm__img">
													<img src="img/photo/product-card-img-1.png" alt="">
												</a>
											</div>
											<div class="product-card-sm__right">
												<div class="product-card-sm__title"><a href="#">zein obagi</a></div>
												<div class="product-card-sm__text">
													<div class="product-card-sm__text-1">
														Exfoliating Polish, 65g
													</div>
													<div class="product-card-sm__text-2">
														Zo Skin Health
													</div>
												</div>
												<div class="product-card-sm__group">
													<div class="product-card-sm__price">
														<div class="product-card-sm__price-current">3 199 ₴</div>
														<div class="product-card-sm__price-old">7 299 ₴</div>
													</div>
												</div>
											</div>
										</div>
									</li>
									<li>
										<div class="product-card-sm">
											<div class="product-card-sm__left">

												<a href="#" class="product-card-sm__img">
													<img src="img/photo/product-card-img-2.png" alt="">
												</a>
											</div>
											<div class="product-card-sm__right">
												<div class="product-card-sm__title"><a href="#">rare paris</a></div>
												<div class="product-card-sm__text">
													<div class="product-card-sm__text-1">
														Ecological Cellulose, 65g
													</div>
													<div class="product-card-sm__text-2">
														Tresor Solaire
													</div>
												</div>
												<div class="product-card-sm__group">
													<div class="product-card-sm__price">
														<div class="product-card-sm__price-current">299 ₴</div>
													</div>
												</div>
											</div>
										</div>
									</li>
									<li>
										<div class="product-card-sm">
											<div class="product-card-sm__left">

												<a href="#" class="product-card-sm__img">
													<img src="img/photo/product-card-img-1.png" alt="">
												</a>
											</div>
											<div class="product-card-sm__right">
												<div class="product-card-sm__title"><a href="#">zein obagi</a></div>
												<div class="product-card-sm__text">
													<div class="product-card-sm__text-1">
														Exfoliating Polish, 65g
													</div>
													<div class="product-card-sm__text-2">
														Zo Skin Health
													</div>
												</div>
												<div class="product-card-sm__group">
													<div class="product-card-sm__price">
														<div class="product-card-sm__price-current">3 199 ₴</div>
														<div class="product-card-sm__price-old">7 299 ₴</div>
													</div>
												</div>
											</div>
										</div>
									</li>
									<li>
										<div class="product-card-sm">
											<div class="product-card-sm__left">

												<a href="#" class="product-card-sm__img">
													<img src="img/photo/product-card-img-1.png" alt="">
												</a>
											</div>
											<div class="product-card-sm__right">
												<div class="product-card-sm__title"><a href="#">zein obagi</a></div>
												<div class="product-card-sm__text">
													<div class="product-card-sm__text-1">
														Exfoliating Polish, 65g
													</div>
													<div class="product-card-sm__text-2">
														Zo Skin Health
													</div>
												</div>
												<div class="product-card-sm__group">
													<div class="product-card-sm__price">
														<div class="product-card-sm__price-current">3 199 ₴</div>
														<div class="product-card-sm__price-old">7 299 ₴</div>
													</div>
												</div>
											</div>
										</div>
									</li>
								</ul>
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