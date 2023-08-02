<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;

$elements_labels = array(
  'plural_name' => 'Элементы', //entries
  'singular_name' => 'Элемент', //entry
);

Block::make('countries', __('Все страны'))
  ->add_fields(array(
    // Первый экран
    Field::make('image', 'countries_hero_in_main_img', __('Фоновое изображение')),
    Field::make('text', 'countries_hero_in_text_title', 'Текст над заголовком'),
    // Контент
    Field::make('separator', 'countries_content_separator', __('Контент')),
    Field::make('textarea', 'countries_content_text', __('Текст')),
  ))
    ->set_icon('location')
    ->set_keywords(array(
      'insight',
    ))
      ->set_category('countries', __('Все страны'))
      ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
         
?>

<div class="hero-in type-2 js-intro" style="background-color: #446B7F;">
  <div class="hero-in__in js-hero js-translate">
    <div class="hero-in__media js-scaleout">
      <img src="<?php echo wp_get_attachment_image_url($fields['countries_hero_in_main_img'], 'full'); ?>" alt loading="lazy" width="1920" height="751" sizes="100vw">
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
            <?php echo $fields['countries_hero_in_text_title']; ?>
          </div>
          <h1 class="h1 text-splitter">
            Countries
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


<?php }); ?>