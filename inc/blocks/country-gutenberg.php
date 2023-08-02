<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;

$elements_labels = array(
  'plural_name' => 'Элементы', //entries
  'singular_name' => 'Элемент', //entry
);

Block::make('country', __('Страна'))
  ->add_fields(array(
    // Первый экран
    Field::make('image', 'country_hero_in_main_img', __('Фоновое изображение')),
    Field::make('text', 'country_hero_in_text_title', 'Текст над заголовком'),
    // Field::make('text', 'country_hero_in_title', 'Заголовок'),
    // Контент
    Field::make('separator', 'country_content_separator', __('Контент')),
    Field::make('text', 'country_content_title', __('Заголовок')),
    Field::make('text', 'country_content_subtitle', __('Подзаголовок')),
    Field::make('textarea', 'country_content_text_l', __('Текст слева'))->set_width(50),
    Field::make('textarea', 'country_content_text_r', __('Текст справа'))->set_width(50),
    // Информация о путешествии
    Field::make('separator', 'country_info_travel_separator', __('Информация о путешествии')),
    Field::make('text', 'country_info_travel_title', __('Заголовок')),
    Field::make('text', 'country_info_travel_subtitle', __('Подзаголовок')),
    Field::make('textarea', 'country_info_travel_text', __('Текст')),
    Field::make('complex', 'country_info_travel_items', __('Дополнительная информация'))
      ->setup_labels($elements_labels)
      ->set_layout('tabbed-horizontal')
      ->add_fields(array(
        Field::make('image', 'img', __('Изображение'))->set_width(30),
        Field::make('textarea', 'text', __('text'))->set_width(70),
      ))->set_collapsed(true),
  ))
    ->set_icon('location')
    ->set_keywords(array(
      'insight',
    ))
      ->set_category('countries', __('Страны'))
      ->set_render_callback(function ($fields, $attributes, $inner_blocks) {

        $country_info_travel_items = $fields['country_info_travel_items'];
         
?>

<div class="hero-in js-intro" style="background-color: #446B7F;">
  <div class="hero-in__in js-hero js-translate">
    <div class="hero-in__media js-scaleout">
      <img src="<?php echo wp_get_attachment_image_url($fields['country_hero_in_main_img'], 'full'); ?>" alt loading="lazy" width="1920" height="751" sizes="100vw">
    </div>
    <div class="shadow js-shadow"></div>
    <div class="top-shadow" style="opacity: 0.6;">
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
            <?php echo $fields['country_hero_in_text_title']; ?>
          </div>
          <h1 class="h1 text-splitter">
            <?php the_title(); ?>
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
      <span class="stt">scroll down</span></button><!-- scroll-btn -->
  </div>
</div><!-- hero-in -->
<div class="service-text type-2 container">
  <h2 class="service-text__title h2">
    <?php echo $fields['country_content_title']; ?>
  </h2>
  <div class="service-text__container">
    <div class="service-text__row service-text__row--text">
      <h3 class="m-wdith h3">
        <?php echo $fields['country_content_subtitle']; ?>
      </h3>
      <div class="service-text__col sm-text">
        <?php echo wpautop($fields['country_content_text_l'], false); ?>
      </div>
      <div class="service-text__col sm-text">
        <?php echo wpautop($fields['country_content_text_r'], false); ?>
      </div>
    </div>
  </div>
</div><!-- service-text -->

<?php 
  // Блок "Направления (внутрення страница) - location"
  echo get_template_part('template-parts/location-block'); 
?>

<div class="hotels-and-villas swiper-parent">
  <div class="hotels-and-villas__header container">
    <h2 class="hotels-and-villas__title h2 text-splitter">
      Popular <br> 
      Hotels in Italy
    </h2>
    <div class="hotels-and-villas__text text-splitter">Interesting countries in 2023 </div>
  </div>
  <div class="hotels-and-villas__slider">
    <div class="hotels-and-villas__slider-in container">
      <div class="hotels-and-villas__items-wrapper js-hotels-and-villas-slider swiper">
        <div class="hotels-and-villas__items swiper-wrapper">

          <?php

            global $post;

            $services_posts = get_posts(
              array(
                'post_type' => 'services',
                'post_parent' => $post->ID,
                'posts_per_page' => -1,
                'orderby' => 'post_title',
                'order' => 'ASC'
              )
            );

            foreach ($services_posts as $post):
              setup_postdata($post); 
          ?>

          <div class="hotels-and-villas__item swiper-slide">
            <a class="hotels-and-villas__item-in" href="<?php the_permalink(); ?>">
              <?php if ( !empty (get_the_post_thumbnail_url()) ) : ?>
              <span class="hotels-and-villas__item-image">
                <span class="hotels-and-villas__item-shield">exclusive offers</span>
                <img src="<?php the_post_thumbnail_url(); ?>" alt loading="lazy" width="479" height="317" sizes="100vw">
              </span>
              <?php endif; ?>
              <span class="hotels-and-villas__item-container">
                <span class="hotels-and-villas__item-stars"><span></span></span>
                <span class="hotels-and-villas__item-title">
                  <?php the_title(); ?>
                </span>
                <span class="hotels-and-villas__item-text">
                  <?php the_excerpt(); ?>
                </span>
                <span class="svg-icon svg-icon--arr-r2" aria-hidden="true">
                  <svg class="svg-icon__link">
                    <use xlink:href="#arr-r2"></use>
                  </svg>
                </span>
              </span>
            </a>
          </div>
          <?php endforeach; wp_reset_postdata(); ?>

        </div>
      </div>
    </div>
  </div>
  <div class="hotels-and-villas__footer container">
    <div class="swiper-scrollbar"></div>
  </div>
</div><!-- hotels-and-villas -->

<div class="text-block type-2">
  <div class="text-block__header container">
    <div class="text-block__header-in">
      <h2 class="t-title h2 text-splitter">
        <?php echo $fields['country_info_travel_title']; ?>
      </h2>
      <p style="color: #AEAAA0;">
        <?php echo $fields['country_info_travel_subtitle']; ?>
      </p>
    </div>
  </div>
  <div class="text-content">
    <?php echo $fields['country_info_travel_text']; ?>
    <hr>
    <?php foreach ($country_info_travel_items as $key => $item) : ?>
    <div class="b-row v-center sm-margin <?php if ($key % 2 !== 0) {echo "rever";} ?>">
      <div class="b-row__col">
        <div class="b-img">
          <img src="<?php echo wp_get_attachment_image_url($item['img'], 'full'); ?>" alt loading="lazy" width="638" height="260">
        </div>
      </div>
      <div class="b-row__col">
        <?php echo $item['text']; ?>
      </div>
    </div>
    <?php endforeach; ?>
  </div><!--text-content-->
</div><!--text-block-->



<?php }); ?>