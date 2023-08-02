<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;

$elements_labels = array(
  'plural_name' => 'Элементы', //entries
  'singular_name' => 'Элемент', //entry
);

Block::make('services', __('Услуги(Пост)'))
  ->add_fields(array(
    // Первый экран
    Field::make('separator', 'services_hero_in_separator', __('Первый экран')),
    Field::make('image', 'services_hero_in_main_img', __('Фоновое изображение')),
    Field::make('text', 'services_hero_in_text_title', 'Текст над заголовком'),
    Field::make('text', 'services_hero_in_title', 'Заголовок'),
    // Контент
    Field::make('separator', 'services_content_separator', __('Контент')),
    Field::make('text', 'services_content_moving_text', __('Бегущий текст при прокрутке')),
    Field::make('text', 'services_content_title', __('Заголовок')),
    Field::make('textarea', 'services_content_desc', __('Описание')),
    Field::make('image', 'services_content_img_l', __('Изображение'))->set_width(20),
    Field::make('text', 'services_content_img_name_r', __('Название справа от изо-ния'))->set_width(30),
    Field::make('textarea', 'services_content_img_text_r', __('Текст справа от изо-ния'))->set_width(30),
    Field::make('text', 'services_content_info_title', __('Инфо Заголовок')),
    Field::make('textarea', 'services_content_info_text_l', __('Инфо Текст слева'))->set_width(50),
    Field::make('textarea', 'services_content_info_text_r', __('Инфо Текст справа'))->set_width(50),
    Field::make('textarea', 'services_content_info_text_b', __('Инфо Текст')),
    Field::make('text', 'services_content_img_name_l', __('Название слева от изо-ния'))->set_width(30),
    Field::make('textarea', 'services_content_img_text_l', __('Текст слева от изо-ния'))->set_width(30),
    Field::make('image', 'services_content_img_r', __('Изображение'))->set_width(20),
    // Банер
    Field::make('separator', 'services_banner_separator', __('Банер')),
    Field::make('image', 'services_contacts_us_main_img', __('Фоновое изображение'))->set_width(50),
    Field::make('image', 'services_contacts_us_img_for_mask', __('Декоративное изображение в виде линий'))->set_width(50),
    Field::make('text', 'services_contacts_us_text_title', 'Текст над заголовком'),
    Field::make('text', 'services_contacts_us_title', 'Заголовок'),
    Field::make('text', 'services_contacts_us_desc', 'Описание'),

  ))
    ->set_icon('products')
    ->set_keywords(array(
      'insight',
    ))
      ->set_category('services', __('Услуги'))
      ->set_render_callback(function ($fields, $attributes, $inner_blocks) {

        
?>

<div class="hero-in js-intro">
  <div class="hero-in__in js-hero js-translate">
    <div class="hero-in__media js-scaleout">
      <img src="<?php echo wp_get_attachment_image_url($fields['services_hero_in_main_img'], 'full'); ?>" alt loading="lazy" width="1920" height="751" sizes="100vw">
    </div>
    <div class="shadow js-shadow"></div>
    <div class="top-shadow" style="opacity: 0.7;">
      <div class="top-shadow__in"></div>
    </div><!-- top-shadow -->
    <div class="hero-in__container container js-opacityout js-hero">
      <div class="breadcrumbs">
        <?php
          if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
          }
        ?>
      </div><!-- breadcrumbs -->
      <div class="hero-in__middle js-scaleout">
        <div class="hero-in__content">
          <div class="hero-in__sm-text">
            <?php echo $fields['services_hero_in_text_title']; ?>
          </div>
          <h1 class="h1 text-splitter">
            <?php echo $fields['services_hero_in_title']; ?>
          </h1>
        </div>
      </div>
    </div>
    <button class="scroll-btn js-opacityout">
      <span class="svg-icon svg-icon--arr-d2" aria-hidden="true">
        <svg class="svg-icon__link">
          <use xlink:href="#arr-d2"></use>
        </svg>
      </span>
      <span class="stt">
        <?php
          $current_lang = pll_current_language();

          if ($current_lang === 'en'):
            echo 'scroll down';

          elseif ($current_lang === 'ru'):
            echo 'прокрутка вниз';

          endif;
        ?>
      </span>
    </button><!-- scroll-btn -->
  </div>
</div><!-- hero-in -->
<div class="moving-text">
  <div class="moving-text__in js-marquee" data-speed="2.1">
    <span>
      <?php echo $fields['services_content_moving_text']; ?>
    </span>
  </div>
</div><!-- moving-text -->
<div class="service-text container">
  <h2 class="h2 text-splitter">
    <?php echo $fields['services_content_title']; ?>
  </h2>
  <p style="color: #AEAAA0;">
    <?php echo $fields['services_content_desc']; ?>
  </p>
  <div class="service-text__row type-1">
    <div class="service-text__col">
      <div class="s-img">
        <img src="<?php echo wp_get_attachment_image_url($fields['services_content_img_l'], 'full'); ?>" alt loading="lazy" width="820" height="460" sizes="100vw">
      </div>
    </div>
    <div class="service-text__col d-flex">
      <h3>
        <?php echo $fields['services_content_img_name_r']; ?>
      </h3>
      <div>
        <p class="sm-text">
          <?php echo $fields['services_content_img_text_r']; ?>
        </p>
      </div>
    </div>
  </div>
  <div class="service-text__container">
    <h3 class="h3">
      <?php echo $fields['services_content_info_title']; ?>
    </h3>
    <div class="service-text__row type-1">
      <div class="service-text__col sm-text">
        <?php echo wpautop($fields['services_content_info_text_l']); ?>
      </div>
      <div class="service-text__col sm-text">
        <?php echo wpautop($fields['services_content_info_text_r']); ?>
      </div>
    </div>
    <p class="sm-text">
      <?php echo $fields['services_content_info_text_b']; ?>
    </p>
    <div class="service-text__row type-1 reverse">
      <div class="service-text__col">
        <!-- <h3 class="h3 d-hidden">Gulf Cooperation Council members which accounted for 34% of tourists</h3> -->
        <div class="s-img">
          <img src="<?php echo wp_get_attachment_image_url($fields['services_content_img_r'], 'full'); ?>" alt loading="lazy" width="840" height="460" sizes="100vw">
        </div>
      </div>
      <div class="service-text__col d-flex">
        <h3 class="h3 m-hidden">
          <?php echo $fields['services_content_img_name_l']; ?>
        </h3>
        <div>
          <p class="sm-text">
            <?php echo $fields['services_content_img_text_l']; ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</div><!-- service-text -->
<div class="decor-lines" style="display: none;">
  <div class="decor-lines__mask">
    <div class="decor-lines__image" style="background: linear-gradient(270deg, #D3C4AE 61.56%, rgba(229, 216, 197, 0) 125.17%);"></div>
  </div>
</div><!-- decor-lines -->
<div class="contacts-us type-2 type-3">
  <div class="contacts-us__image">
    <img src="<?php echo wp_get_attachment_image_url($fields['services_contacts_us_main_img'], 'full'); ?>" alt loading="lazy" width="1920" height="1684" sizes="100vw">
    <div class="shadow"></div>
  </div>
  <div class="decor-lines to-right">
    <div class="decor-lines__mask">
      <div class="decor-lines__image" style="background-image: url(<?php echo wp_get_attachment_image_url($fields['services_contacts_us_img_for_mask'], 'full'); ?>)"></div>
    </div>
  </div><!-- decor-lines -->
  <div class="contacts-us__in container">
    <div class="logo-icon">
      <span class="svg-icon svg-icon--logo-icon" aria-hidden="true">
        <svg class="svg-icon__link">
          <use xlink:href="#logo-icon"></use>
        </svg>
      </span>
    </div><!-- logo-icon -->
    <div class="contacts-us__content">
      <div class="contacts-us__sm-text text-splitter">
        <?php echo $fields['services_contacts_us_text_title']; ?>
      </div>
      <h2 class="contacts-us__title h2 text-splitter">
        <?php echo $fields['services_contacts_us_title']; ?>
      </h2>
      <div class="contacts-us__text text-splitter">
        <?php echo $fields['services_contacts_us_desc']; ?>
      </div>
      <div class="contacts-us__actions">
        <a class="js-modal-trigger site-button" href="#form">Send request <span class="svg-icon svg-icon--arr-r3" aria-hidden="true">
            <svg class="svg-icon__link">
              <use xlink:href="#arr-r3"></use>
            </svg>
          </span>
        </a>

        <?php if (!empty($socials = get_carbon_translated('theme_socials'))): ?>
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
  </div>
</div><!-- contacts-us -->

<?php }); ?>