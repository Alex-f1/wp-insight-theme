<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="theme-color" content="">

	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
	<meta name="format-detection" content="telephone=no">

	<link type="image/png" href="favicon.png" rel="icon">

	<meta name="msapplication-tap-highlight" content="no">

	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">

	<meta name="MobileOptimized" content="320">
	<meta name="HandheldFriendly" content="True">

	<?php wp_head(); ?>

</head>

<?php
	// Ссылка на логотип из "Свойства сайта"
	$custom_logo_url = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');

	// Кастомный переключатель языков (плагин Polylang)
	$custom_switcher_languages = pll_the_languages(
		array(
			"raw" => 1,
		)
	);
?>

<body <?php body_class('app'); ?> >

	<?php wp_body_open(); ?>

	<div class="app__wrapper">
		<div class="mobile-sidebar">
			<div class="mobile-sidebar__container">
				<div class="mobile-sidebar__header">
					<a href="<?php echo get_home_url(); ?>" class="mobile-sidebar__logo">
						<img width="263" height="33" src="<?php echo $custom_logo_url[0]; ?>" alt="">
					</a>
					<div class="languages">
						<div class="languages__active">
							<a href="#" class="languages__active">
								<span class="ttx">
									<?php echo $custom_switcher_languages[pll_current_language()]['slug']; ?>
								</span>
								<span class="svg-icon svg-icon--arr-d" aria-hidden="true">
									<svg class="svg-icon__link">
										<use xlink:href="#arr-d"></use>
									</svg>
								</span>
							</a>
						</div>
						<div class="languages__dropdown">

							<?php foreach ($custom_switcher_languages as $item): ?>
								<?php if (!$item['current_lang']): ?>
									<div class="languages__item">
										<a href="<? echo $item['url']; ?>">
											<?php echo $item['slug']; ?>
										</a>
									</div>
								<?php endif; ?>
							<?php endforeach; ?>
							
						</div>
					</div><!-- languages -->

					<div class="mobile-sidebar__close js-menu">
						<span class="svg-icon svg-icon--close" aria-hidden="true">
							<svg class="svg-icon__link">
								<use xlink:href="#close"></use>
							</svg>
						</span>
					</div>
				</div>
				<div class="mobile-sidebar__content">
					<nav class="main-menu">
						<?php
							wp_nav_menu([
								'theme_location' => 'main-menu',
								'menu' => '',
								'container' => false,
								'container_class' => '',
								'container_id' => '',
								'menu_class' => '',
								'menu_id' => '',
								'echo' => true,
								'fallback_cb' => 'wp_page_menu',
								'before' => '',
								'after' => '',
								'link_before' => '',
								'link_after' => '',
								'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'depth' => 0,
								'walker' => '',
							]);
						?>
					</nav><!-- main-menu -->

					<?php if ( !empty ($socials = get_carbon_translated('theme_socials') ) ) : ?>
					<div class="socials">
						<div class="socials__items">

							<?php foreach ($socials as $item): ?>
							<a href="<?php echo $item['link']; ?>" aria-label="<?php echo $item['title']; ?>" class="socials__item">
								<?php echo file_get_contents(wp_get_attachment_image_url($item['icon'], 'full')); ?>
							</a>
							<?php endforeach; ?>
							
						</div>
					</div><!-- socials -->
					<?php endif; ?>

				</div>
			</div>
		</div><!-- mobile-sidebar -->



		<header class="header">

			<div class="header__container">
				<div class="header__content container">
					<div class="header__logo">
						<a href="<?php echo get_home_url(); ?>">
							<img src="<?php echo $custom_logo_url[0]; ?>" alt="">
						</a>
					</div>
					<nav class="main-menu">
						<?php
							wp_nav_menu([
								'theme_location' => 'main-menu',
								'menu' => '',
								'container' => false,
								'container_class' => '',
								'container_id' => '',
								'menu_class' => '',
								'menu_id' => '',
								'echo' => true,
								'fallback_cb' => 'wp_page_menu',
								'before' => '',
								'after' => '',
								'link_before' => '',
								'link_after' => '',
								'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'depth' => 0,
								'walker' => '',
							]);
						?>
					</nav><!-- main-menu -->
					
					<?php if ( !empty ($socials = get_carbon_translated('theme_socials') ) ) : ?>
					<div class="socials">
						<div class="socials__items">

							<?php foreach ($socials as $item): ?>
							<a href="<?php echo $item['link']; ?>" aria-label="<?php echo $item['title']; ?>" class="socials__item">
								<?php echo file_get_contents(wp_get_attachment_image_url($item['icon'], 'full')); ?>
							</a>
							<?php endforeach; ?>
						</div>
					</div><!-- socials -->
					<?php endif; ?>
					
					<?php if ( $phone = get_carbon_translated('theme_phone') ) : ?>
					<a href="tel:<?php echo make_phone_url($phone); ?>" aria-label="phone" class="header__phone">
						<span class="svg-icon svg-icon--phone" aria-hidden="true">
							<svg class="svg-icon__link">
								<use xlink:href="#phone"></use>
							</svg>
						</span>
					</a>
					<?php endif; ?>

					<div class="languages">
						<div class="languages__active">
							<a href="#" class="languages__active">
								<span class="ttx">
									<?php echo $custom_switcher_languages[pll_current_language()]['slug']; ?>
								</span>
								<span class="svg-icon svg-icon--arr-d" aria-hidden="true">
									<svg class="svg-icon__link">
										<use xlink:href="#arr-d"></use>
									</svg>
								</span>
							</a>
						</div>
						<div class="languages__dropdown">

							<?php foreach ($custom_switcher_languages as $item) : ?>
								<?php if (!$item['current_lang']) : ?>
								<div class="languages__item">
									<a href="<? echo $item['url']; ?>">
										<?php echo $item['slug']; ?>
									</a>
								</div>
								<?php endif; ?>
							<?php endforeach; ?>

						</div>
						
					</div><!-- languages -->

					<div class="header__burger js-menu">
						<span class="svg-icon svg-icon--menu" aria-hidden="true">
							<svg class="svg-icon__link">
								<use xlink:href="#menu"></use>
							</svg>
						</span>
					</div>
				</div>
			</div>
		</header><!-- header -->



		<div class="app__content">

			<main class="app__main">