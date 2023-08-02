
			</main><!-- app:main -->

		</div><!-- app:content -->

		<footer class="footer">
			<div class="footer__content container">
				<div class="footer__row">
					<nav class="footer__menu">
						<div class="footer__menu-col">
							<div class="section-title">
								<?php
									$current_lang = pll_current_language();

									if ($current_lang === 'en'):
										echo 'Sections';

									elseif ($current_lang === 'ru'):
										echo 'Разделы';

									endif;
								?>
							</div>
							<ul>
								<li>
									<a href="#">
										<?php
											$current_lang = pll_current_language();

											if ($current_lang === 'en'):
												echo 'Individual';

											elseif ($current_lang === 'ru'):
												echo 'Индивидуальный';

											endif;
										?>
									</a>
								</li>
								<li>
									<a href="#">
										<?php
											$current_lang = pll_current_language();

											if ($current_lang === 'en'):
												echo 'Business';

											elseif ($current_lang === 'ru'):
												echo 'Бизнес';

											endif;
										?>
									</a>
								</li>
							</ul>
						</div>
						<div class="footer__menu-col">
							<div class="section-title">
								<?php
									$current_lang = pll_current_language();

									if ($current_lang === 'en'):
										echo 'Site';

									elseif ($current_lang === 'ru'):
										echo 'Место';

									endif;
								?>
							</div>
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
						</div>
					</nav>

					<?php 
						$phone_international_calls = get_carbon_translated('theme_phone_international'); 
						$phone_international_calls_office = get_carbon_translated('theme_phone_international_office');

						if ($phone_international_calls || $phone_international_calls_office) :
					?>
					<div class="footer__contacts">
						<div class="section-title">
							<?php
								$current_lang = pll_current_language();

								if ($current_lang === 'en'):
									echo 'International calls';

								elseif ($current_lang === 'ru'):
									echo 'Международные звонки';

								endif;
							?>
						</div>
						<div class="footer__phone">
							<a href="tel:<?php echo make_phone_url($phone_international_calls); ?>">
								<?php echo $phone_international_calls; ?>
							</a>
						</div>
						<div class="footer__phone">
							<a href="tel:<?php echo make_phone_url($phone_international_calls_office); ?>">
								<?php echo $phone_international_calls_office; ?>
							</a>
						</div>
						<div class="footer__address">
							<?php echo get_carbon_translated('theme_phone_international_office_text'); ?>
						</div>
					</div>
					<?php endif; ?>

					<?php if ( !empty ($socials_footer = get_carbon_translated('theme_socials_footer') ) ) : ?>
					<div class="footer__socials">
						<div class="section-title">
							<?php
								$current_lang = pll_current_language();

								if ($current_lang === 'en'):
									echo 'social networks';

								elseif ($current_lang === 'ru'):
									echo 'социальные сети';

								endif;
							?>
						</div>
						<div class="socials">
							<div class="socials__items">

								<?php foreach ($socials_footer as $item): ?>
								<a href="<?php echo $item['link']; ?>" aria-label="<?php echo $item['title']; ?>" class="socials__item">
									<?php echo file_get_contents(wp_get_attachment_image_url($item['icon'], 'full')); ?>
								</a>
								<?php endforeach; ?>
								
							</div>
						</div><!-- socials -->
					</div>
					<?php endif; ?>

				</div>
				<div class="footer__copyright-wrap">
					<div class="footer__logo">
						<a href="<?php echo get_home_url(); ?>">
							<img src="<?php echo wp_get_attachment_image_url(get_carbon_translated('theme_logo_footer')) ?>" alt="">
						</a>
					</div>
					<div class="footer__copyright">
						<?php echo get_carbon_translated('theme_copyright'); ?>
					</div>
					<div class="footer__copyright"><a href="#">
						<?php
							$current_lang = pll_current_language();

							if ($current_lang === 'en'):
								echo 'Privacy Policy';

							elseif ($current_lang === 'ru'):
								echo 'Политика конфиденциальности';

							endif;
						?>
					</a></div>
				</div>
			</div>
		</footer><!-- footer -->

	</div><!-- app:wrapper -->

	<button id="back_to" type="button" aria-hidden="true" title="В начало страницы" class="page-scroller">
		<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20"
			height="20" viewBox="0 0 20 20" class="page-scroller__icon">
			<path
				d="M2.582 13.891c-0.272 0.268-0.709 0.268-0.979 0s-0.271-0.701 0-0.969l7.908-7.83c0.27-0.268 0.707-0.268 0.979 0l7.908 7.83c0.27 0.268 0.27 0.701 0 0.969s-0.709 0.268-0.978 0l-7.42-7.141-7.418 7.141z">
			</path>
		</svg>
	</button><!-- page-scroller -->


	<svg class="main-svg-sprite main-svg-sprite--icons" xmlns="http://www.w3.org/2000/svg"
		xmlns:xlink="http://www.w3.org/1999/xlink">
		<symbol viewBox="0 0 7.06 4.03" id="arr-d" xmlns="http://www.w3.org/2000/svg">
			<path
				d="M3.53 4a.47.47 0 01-.35-.15l-3-3a.48.48 0 010-.7.48.48 0 01.7 0l2.65 2.67L6.21.15a.48.48 0 01.7 0 .48.48 0 010 .7l-3 3a.47.47 0 01-.38.15z">
			</path>
		</symbol>
		<symbol viewBox="0 0 11 23" id="arr-d2" xmlns="http://www.w3.org/2000/svg">
			<path
				d="M5.21 21l.707.707-.707.707-.707-.707L5.21 21zm-1-20a1 1 0 012 0h-2zm5.918 16.497l-4.21 4.21-1.415-1.414 4.21-4.21 1.415 1.414zm-5.625 4.21l-4.21-4.21 1.414-1.415 4.21 4.21-1.414 1.415zM4.21 21V1h2v20h-2z">
			</path>
		</symbol>
		<symbol viewBox="0 0 23 11" id="arr-r2" xmlns="http://www.w3.org/2000/svg">
			<path
				d="M21 5.21l.707-.707.707.708-.707.707L21 5.21zm-20 1a1 1 0 010-2v2zM17.497.294l4.21 4.21-1.414 1.415-4.21-4.21L17.496.292zm4.21 5.625l-4.21 4.21-1.415-1.414 4.21-4.21 1.415 1.414zM21 6.21H1v-2h20v2z">
			</path>
		</symbol>
		<symbol viewBox="0 0 20 9" id="arr-r3" xmlns="http://www.w3.org/2000/svg">
			<path
				d="M19.05 4.934l.278-.278.278.278-.278.277-.278-.277zm-17.682.393a.393.393 0 010-.786v.786zM15.605.933l3.723 3.723-.556.555L15.05 1.49l.555-.556zm3.723 4.278l-3.723 3.723-.555-.556 3.722-3.722.556.555zm-.278.116H1.368V4.54H19.05v.786z">
			</path>
		</symbol>
		<symbol viewBox="0 0 13.97 13.97" id="close" xmlns="http://www.w3.org/2000/svg">
			<g data-name="Layer 2">
				<path d="M14 1.41L8.39 7 14 12.56 12.56 14 7 8.39 1.41 14 0 12.56 5.58 7 0 1.41 1.41 0 7 5.58 12.56 0z"
					data-name="Layer 1"></path>
			</g>
		</symbol>
		<symbol viewBox="0 0 13 12" id="close2" xmlns="http://www.w3.org/2000/svg">
			<path d="M1.965 1.095l9.224 9.224m-9.224 0l9.224-9.224" stroke="#C09D84" stroke-width="2" stroke-miterlimit="10"
				stroke-linecap="round" stroke-linejoin="round"></path>
		</symbol>
		<symbol viewBox="0 0 14 17" id="location-icon" xmlns="http://www.w3.org/2000/svg">
			<path clip-rule="evenodd"
				d="M3.532.937a6.89 6.89 0 017.034.058C12.71 2.327 14.012 4.705 14 7.26c-.05 2.54-1.447 4.929-3.193 6.775a18.727 18.727 0 01-3.358 2.82A1.174 1.174 0 017.04 17a.82.82 0 01-.39-.119 18.515 18.515 0 01-4.839-4.547A9.28 9.28 0 010 7.134C-.001 4.572 1.347 2.206 3.532.937zm1.262 7.258a2.378 2.378 0 002.198 1.497 2.339 2.339 0 001.683-.702c.446-.453.696-1.07.694-1.712a2.423 2.423 0 00-1.462-2.243 2.346 2.346 0 00-2.594.52 2.455 2.455 0 00-.519 2.64z">
			</path>
		</symbol>
		<symbol viewBox="0 0 64 46" id="logo-icon" xmlns="http://www.w3.org/2000/svg">
			<path
				d="M41.545.015V0H22.186l-.27.015A22.934 22.934 0 0011.317 3.09h-.216v.124C4.249 7.316 0 14.778 0 22.734c0 12.144 9.803 22.28 21.908 22.72v.023h19.737l.27-.023a22.652 22.652 0 0015.273-6.914A22.607 22.607 0 0063.6 22.735C63.6 10.514 53.727.37 41.537.008l.008.007zm-.68 3.446c9.911 0 18.285 7.663 19.19 17.497H45.407c-.526-6.705-4.087-12.932-9.603-16.825a19.25 19.25 0 015.06-.68v.008zm-13.063.68a23.053 23.053 0 00-3.151 2.68 20.422 20.422 0 00-6.05-2.904 19.3 19.3 0 019.201.224zm-2.719 7.555a17.534 17.534 0 014.828 9.27h-8.235a19.219 19.219 0 013.407-9.27zM12.291 6.559h.54c3.422 0 6.729 1.012 9.58 2.92a22.636 22.636 0 00-4.21 11.487H3.552c.541-5.84 3.793-11.202 8.745-14.407h-.008zm10.444 35.465c-9.958 0-18.34-7.702-19.197-17.59h14.654c.503 6.736 4.064 13.01 9.61 16.918-1.645.448-3.345.68-5.06.68l-.007-.008zm-1.074-17.59h8.528l.016 14.361c-4.867-3.245-8.026-8.56-8.536-14.36h-.008zm5.655-15.388a19.378 19.378 0 014.48-3.306c5.77 3.082 9.533 8.752 10.128 15.226H33.41a21.178 21.178 0 00-6.095-11.92zm6.334 15.388h8.281c-.494 5.678-3.56 11.101-8.265 14.353V24.434h-.016zm7.2 17.59c-1.715 0-3.415-.224-5.06-.68 5.547-3.909 9.108-10.174 9.61-16.918h14.647c-.866 9.889-9.24 17.59-19.197 17.59v.008z">
			</path>
		</symbol>
		<symbol viewBox="0 0 30 18" id="menu" xmlns="http://www.w3.org/2000/svg">
			<rect width="30" height="2" rx="1"></rect>
			<rect y="8" width="30" height="2" rx="1"></rect>
			<rect y="16" width="30" height="2" rx="1"></rect>
		</symbol>
		<symbol viewBox="0 0 9 9" id="phone" xmlns="http://www.w3.org/2000/svg">
			<path
				d="M2.25 0H.5C.225 0 0 .225 0 .5A8.5 8.5 0 008.5 9c.275 0 .5-.225.5-.5V6.755c0-.275-.225-.5-.5-.5-.62 0-1.225-.1-1.785-.285a.512.512 0 00-.51.12l-1.1 1.1A7.574 7.574 0 011.81 3.895l1.1-1.1c.14-.14.18-.335.125-.51A5.68 5.68 0 012.75.5c0-.275-.225-.5-.5-.5z">
			</path>
		</symbol>
	</svg><svg class="main-svg-sprite main-svg-sprite--colored" xmlns="http://www.w3.org/2000/svg"
		xmlns:xlink="http://www.w3.org/1999/xlink">
		<symbol id="marmelad" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
			<style>
				.ast6 {
					fill: #fff
				}
			</style>
			<path fill="#f7e018"
				d="M272 274.8c-37.5 0-67.9-30.4-67.9-67.9 0-31.4-25.6-57-57-57-37.5 0-67.9-30.4-67.9-67.9s30.4-67.9 67.9-67.9c106.3 0 192.8 86.5 192.8 192.8 0 37.5-30.4 67.9-67.9 67.9z">
			</path>
			<path fill="#1988c6"
				d="M243.8 394.9c0-37.5 30.4-67.9 67.9-67.9 31.4 0 57-25.6 57-57 0-37.5 30.4-67.9 67.9-67.9s67.9 30.4 67.9 67.9c0 106.3-86.5 192.8-192.8 192.8-37.5 0-67.9-30.4-67.9-67.9z">
			</path>
			<path fill="#f16524"
				d="M133.5 200.3c31.3 20.7 39.9 62.8 19.2 94.1-17.3 26.2-10.1 61.6 16.1 79 31.3 20.7 39.9 62.8 19.2 94.1s-62.8 39.9-94.1 19.2C5.2 427.9-19.2 308.1 39.4 219.5c20.7-31.3 62.8-39.9 94.1-19.2z">
			</path>
			<path fill="#e5cd1a"
				d="M234.1 206.9c0-31.4-25.6-57-57-57-37.5 0-67.9-30.4-67.9-67.9 0-33.7 24.5-61.7 56.7-67-6.2-.6-12.5-.9-18.8-.9-37.5 0-67.9 30.4-67.9 67.9s30.4 67.9 67.9 67.9c31.4 0 57 25.6 57 57 0 37.5 30.4 67.9 67.9 67.9 5.2 0 10.2-.6 15-1.7-30.3-6.8-52.9-33.8-52.9-66.2z">
			</path>
			<path fill="#1c73ba"
				d="M273.8 394.9c0-37.5 30.4-67.9 67.9-67.9 31.4 0 57-25.6 57-57 0-32.3 22.6-59.4 52.9-66.2-4.8-1.1-9.8-1.7-15-1.7-37.5 0-67.9 30.4-67.9 67.9 0 31.4-25.6 57-57 57-37.5 0-67.9 30.4-67.9 67.9s30.4 67.9 67.9 67.9c6.4 0 12.6-.3 18.8-.9-32.1-5.3-56.7-33.3-56.7-67z">
			</path>
			<path fill="#e54c21"
				d="M123.9 486.6C35.2 427.9 10.8 308.1 69.4 219.5c10.1-15.2 25.2-25.1 41.7-28.8-26.8-6.1-55.7 4.5-71.7 28.8C-19.2 308.2 5.2 428 93.9 486.6c16.1 10.6 35 13.5 52.4 9.6-7.8-1.8-15.4-5-22.4-9.6z">
			</path>
			<path
				d="M347.4 206.9c0-110.4-89.8-200.3-200.3-200.3-41.6 0-75.4 33.8-75.4 75.4s33.8 75.4 75.4 75.4c27.3 0 49.5 22.2 49.5 49.5 0 41.6 33.8 75.4 75.4 75.4 41.6 0 75.4-33.8 75.4-75.4zm-135.8 0c0-35.6-28.9-64.5-64.5-64.5-33.3 0-60.4-27.1-60.4-60.4s27.1-60.4 60.4-60.4c102.2 0 185.3 83.1 185.3 185.3 0 33.3-27.1 60.4-60.4 60.4s-60.4-27.1-60.4-60.4z">
			</path>
			<path
				d="M120.7 82h-15c0 22.9 18.6 41.4 41.4 41.4 17.7 0 34.7 5.5 49 15.9l8.8-12.1c-16.9-12.3-36.9-18.8-57.8-18.8-14.5.1-26.4-11.8-26.4-26.4zm186.7 80.2c-12.8-45.8-44.8-84.1-87.7-105l-6.6 13.5c39.1 19 68.2 53.8 79.8 95.5l14.5-4zM190.9 62.1c4.5 1.4 9.1 3 13.5 4.8l5.7-13.9c-4.8-2-9.8-3.8-14.8-5.3l-4.4 14.4zM185.2 45c-5.1-1.2-10.3-2.2-15.5-2.9l-2 14.9c4.7.6 9.4 1.5 14.1 2.6l3.4-14.6z"
				class="ast6"></path>
			<path
				d="M436.6 194.7c-41.6 0-75.4 33.8-75.4 75.4 0 27.3-22.2 49.5-49.5 49.5-41.6 0-75.4 33.8-75.4 75.4s33.8 75.4 75.4 75.4c110.4 0 200.3-89.8 200.3-200.3 0-41.6-33.8-75.4-75.4-75.4zM311.7 455.3c-33.3 0-60.4-27.1-60.4-60.4s27.1-60.4 60.4-60.4c35.6 0 64.5-28.9 64.5-64.5 0-33.3 27.1-60.4 60.4-60.4S497 236.7 497 270c0 102.2-83.1 185.3-185.3 185.3z">
			</path>
			<path
				d="M407.5 312.4l14.1 5.1c1.8-5.1 3.3-10.3 4.3-15.6l-14.7-2.8c-.9 4.6-2.1 9-3.7 13.3zm-10.7 20.3l12.2 8.7c3.1-4.4 5.9-9.1 8.3-13.9l-13.4-6.6c-2 4.1-4.4 8-7.1 11.8z">
			</path>
			<path
				d="M363.3 326.9c-14.2 12.9-32.5 19.9-51.6 19.9-26.5 0-48.1 21.6-48.1 48.1h15c0-18.2 14.8-33.1 33.1-33.1 22.8 0 44.7-8.5 61.6-23.8l-10-11.1z"
				class="ast6"></path>
			<path
				d="M365.6 418.5l5.1 14.1c4.9-1.8 9.8-3.8 14.5-6l-6.4-13.6c-4.3 2.1-8.7 3.9-13.2 5.5zm-22.9 6.4l2.9 14.7c5.1-1 10.2-2.3 15.2-3.8l-4.3-14.4c-4.5 1.5-9.2 2.6-13.8 3.5zm-23.7 2.9l.7 15c5.2-.2 10.5-.7 15.6-1.4l-2-14.9c-4.8.7-9.5 1.1-14.3 1.3z">
			</path>
			<path
				d="M481.9 254.1l-14.1 5c1.2 3.5 1.9 7.2 1.9 11 0 32.2-9.7 63.3-28 89.7l12.3 8.5c20.1-29 30.7-63 30.7-98.3 0-5.4-1-10.8-2.8-15.9zM454 225.3c-5.5-2.2-11.4-3.3-17.4-3.3v15c4.1 0 8.1.8 11.9 2.2l5.5-13.9zm10.2 26.5l12.5-8.3c-3.3-5-7.4-9.2-12.3-12.7l-8.7 12.2c3.4 2.5 6.2 5.4 8.5 8.8z"
				class="ast6"></path>
			<path
				d="M172.9 367c-22.8-15-29-45.8-14-68.6 11.1-16.8 15-36.9 11-56.6-4-19.7-15.5-36.7-32.3-47.8-16.8-11.1-36.9-15-56.6-11-19.7 4-36.7 15.5-47.8 32.3-60.9 92.1-35.5 216.6 56.6 277.5 12.5 8.3 26.8 12.5 41.4 12.5 5.1 0 10.2-.5 15.2-1.5 19.7-4 36.7-15.5 47.8-32.3s15-36.9 11-56.6c-4-19.8-15.5-36.8-32.3-47.9zm8.8 96.2c-8.9 13.5-22.5 22.6-38.3 25.9-15.8 3.2-31.9.1-45.4-8.8C12.8 424-10.7 308.8 45.7 223.6c8.9-13.5 22.5-22.6 38.3-25.9 4.1-.8 8.1-1.2 12.2-1.2 11.7 0 23.2 3.4 33.2 10 13.5 8.9 22.6 22.5 25.9 38.3 3.2 15.8.1 31.9-8.8 45.4-19.6 29.7-11.4 69.7 18.2 89.4 13.5 8.9 22.6 22.5 25.9 38.3 3.1 15.8 0 31.9-8.9 45.3z">
			</path>
			<path
				d="M116.8 452C100.1 441 86 427.1 75 410.8l-12.4 8.4c12.2 18 27.6 33.2 45.9 45.3 6.9 4.5 14.7 6.9 22.8 6.9 2.8 0 5.6-.3 8.4-.9l-3-14.7c-7 1.5-14.1.1-19.9-3.8zm5.1-200.4c.4 1.8.5 3.6.5 5.4 0 5.1-1.5 10.2-4.4 14.5-10.7 16.2-16.3 34.8-16.3 54.1 0 6.6.7 13.3 2 19.9l14.7-3c-1.1-5.6-1.7-11.3-1.7-16.9 0-16.3 4.8-32.1 13.8-45.8 4.5-6.8 6.9-14.7 6.9-22.8 0-2.8-.3-5.6-.8-8.4-.3-1.3-.6-2.6-1-3.9l-14.3 4.4c.3.8.5 1.7.6 2.5zm-3.9-9.5l12.4-8.4c-3-4.5-6.9-8.3-11.5-11.4-.6-.4-1.1-.7-1.7-1.1l-7.7 12.9c.4.2.7.5 1.1.7 3 2 5.4 4.4 7.4 7.3zm-15.7-10.9l3.6-14.6c-5.9-1.5-12.1-1.6-18.2-.3l3 14.7c3.9-.8 7.9-.7 11.6.2z"
				class="ast6"></path>
		</symbol>
	</svg>

	<script>
		var site_defers = {
			smoothscroll: 'js/vendors/smoothscroll.polyfill-0.4.4.js',
			weatherApiKey: '01f2d8be13d1f2d15b212d8895dee94d',
		}
	</script>


	<?php wp_footer(); ?>

	</body>

</html>