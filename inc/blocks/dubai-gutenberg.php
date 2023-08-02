<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;

$elements_labels = array(
  'plural_name' => 'Элементы', //entries
  'singular_name' => 'Элемент', //entry
);

Block::make('dubai', __('Дубай'))
  ->add_fields(array(
    // Контент
    // Field::make('separator', 'dubai_content_separator', __('Контент')),
    Field::make('text', 'dubai_content_title', __('Основной заголовок')),
    Field::make('textarea', 'dubai_content_desc', __('Основное описание')),
    Field::make('text', 'dubai_content_services_title', __('Заголовок услуг')),
    Field::make('text', 'dubai_content_services_subtitle', __('Подзаголовок услуг')),
    // Информация о путешествии
    Field::make('separator', 'dubai_info_travel_separator', __('Информация о путешествии')),
    Field::make('text', 'dubai_info_travel_title', __('Заголовок')),
    Field::make('text', 'dubai_info_travel_subtitle', __('Подзаголовок')),
    Field::make('textarea', 'dubai_info_travel_text_l', __('Текст слева'))->set_width(50),
    Field::make('textarea', 'dubai_info_travel_text_r', __('Текст справа'))->set_width(50),
    Field::make('textarea', 'dubai_info_travel_text', __('Текст')),
    Field::make('text', 'dubai_info_travel_extra_title', __('Заголовок дополнительной инфо-ии')),
    Field::make('complex', 'dubai_info_travel_items', __('Дополнительная информация'))
      ->setup_labels($elements_labels)
      ->set_layout('tabbed-horizontal')
      ->add_fields(array(
        Field::make('image', 'img', __('Изображение'))->set_width(30),
        Field::make('textarea', 'text', __('text'))->set_width(70),
      ))->set_collapsed(true),
    // Эксклюзивное предложение
    Field::make('separator', 'dubai_exclusive_separator', __('Эксклюзивное предложение')),
    Field::make('text', 'dubai_exclusive_title', __('Заголовок')),
    Field::make('textarea', 'dubai_exclusive_text', __('Текст')),
    // Банер
    Field::make('separator', 'dubai_banner_separator', __('Банер Дубай')),
    Field::make('image', 'dubai_contacts_us_main_img', __('Фоновое изображение'))->set_width(50),
    Field::make('image', 'dubai_contacts_us_img_for_mask', __('Декоративное изображение в виде линий'))->set_width(50),
    Field::make('text', 'dubai_contacts_us_text_title', 'Текст над заголовком'),
    Field::make('text', 'dubai_contacts_us_title', 'Заголовок'),
    Field::make('text', 'dubai_contacts_us_desc', 'Описание'),
  ))
    ->set_icon('building')
    ->set_keywords(array(
      'insight',
    ))
      ->set_category('services', __('Дубай'))
      ->set_render_callback(function ($fields, $attributes, $inner_blocks) {

        $dubai_info_travel_items = $fields['dubai_info_travel_items'];
         
?>

<section class="services3">
  <div class="decor-lines">
    <div class="decor-lines__mask">
      <div class="decor-lines__image" style="background: linear-gradient(270deg, #D3C4AE 61.56%, rgba(229, 216, 197, 0) 125.17%);"></div>
    </div>
  </div><!-- decor-lines -->
  <div class="services3__in container">
    <div class="services3__header">
      <h1 class="services3__title text-splitter">
        <?php echo $fields['dubai_content_title']; ?>
      </h1>
      <div class="services3__text">
        <p>
          <?php echo $fields['dubai_content_desc']; ?>
        </p>
      </div>
    </div>
    <h2 class="h2 text-splitter m-hidden">
      <?php echo $fields['dubai_content_services_title']; ?>
    </h2>
    <div class="sm-title m-hidden">
      <?php echo $fields['dubai_content_services_subtitle']; ?>
    </div>
    <div class="services3__items">
      <?php
        $dubai = get_terms([
          'taxonomy' => 'dubai',
          'hide_empty' => false,
          'child_of' => 0,
          'orderby' => 'name',
          'order' => 'ASC'
        ]);

        foreach( $dubai as $item ) {
      ?>
      <a class="services3__item" href="<?php echo get_term_link($item->term_id, $item->taxonomy); ?>">
        <span class="services3__item-image">
          <img src="<?php echo wp_get_attachment_image_url(carbon_get_term_meta($item->term_id, 'service_img'), 'full'); ?>" alt loading="lazy" width="410" height="535">
        </span>
        <span class="services3__item-container">
          <span class="services3__item-title text-splitter">
            <?php echo $item->name; ?>
          </span>
          <span class="services3__item-arrow">
            <span class="svg-icon svg-icon--arr-r2" aria-hidden="true">
              <svg class="svg-icon__link">
                <use xlink:href="#arr-r2"></use>
              </svg>
            </span>
          </span>
        </span>
      </a>
      <?php
        }

        wp_reset_postdata();

      ?>

    </div>
  </div>
</section><!-- services3 -->

<?php
  // Блок "Банер (Общий) - contacts-us(common)"
  echo get_template_part('template-parts/contacts-us_common-block');
?>

<section class="text-block">
  <div class="text-block__header container">
    <h2 class="text-block__title h2 text-splitter">
      <?php echo $fields['dubai_info_travel_title']; ?>
    </h2>
  </div>
  <div class="text-block__container container--small">
    <div class="text-content">
      <h2 class="text-content__title h2 text-splitter">
        <?php echo $fields['dubai_info_travel_subtitle']; ?>
      </h2>
      <div class="b-row">
        <div class="b-row__col">
          <div class="maxw">
            <p>
              <strong class="dark-color">
                <?php echo $fields['dubai_info_travel_text_l']; ?>
              </strong>
            </p>
          </div>
        </div>
        <div class="b-row__col">
          <?php echo wpautop($fields['dubai_info_travel_text_r']); ?>
        </div>
      </div>
    </div>
    <!--text-sontent-->
  </div>
</section><!-- text-block -->

<div class="contacts-us type-2">
  <div class="contacts-us__image">
    <img src="<?php echo wp_get_attachment_image_url($fields['dubai_contacts_us_main_img'], 'full'); ?>" alt loading="lazy" width="1920" height="1684" sizes="100vw">
    <div class="shadow"></div>
  </div>
  <div class="decor-lines to-right">
    <div class="decor-lines__mask">
      <div class="decor-lines__image" style="background-image: url(<?php echo wp_get_attachment_image_url($fields['dubai_contacts_us_img_for_mask'], 'full'); ?>)"></div>
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
        <?php echo $fields['dubai_contacts_us_text_title']; ?>
      </div>
      <h2 class="contacts-us__title h2 text-splitter">
        <?php echo $fields['dubai_contacts_us_title']; ?>
      </h2>
      <div class="contacts-us__text text-splitter">
        <?php echo $fields['dubai_contacts_us_desc']; ?>
      </div>
      <div class="contacts-us__actions">
        <a class="js-modal-trigger site-button" href="#form">
          <?php
            $current_lang = pll_current_language();

            if ($current_lang === 'en'):
              echo 'Send request';

            elseif ($current_lang === 'ru'):
              echo 'Отправить запрос';

            endif;
          ?>
          <span class="svg-icon svg-icon--arr-r3" aria-hidden="true">
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

<div class="text-content container--small">
  <p>
    <?php echo $fields['dubai_info_travel_text']; ?>
  </p>
  <h3>
    <?php echo $fields['dubai_info_travel_extra_title']; ?>
  </h3>
  <?php foreach ($dubai_info_travel_items as $key => $item) : ?>
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
  <div class="lng-text">
    <?php echo $fields['dubai_content_services_subtitle']; ?>
  </div>
  <h2 class="h2 text-splitter border-b">
    <?php echo $fields['dubai_exclusive_title']; ?>
  </h2>
  <p style="color: #AEAAA0;">
    <?php echo $fields['dubai_exclusive_text']; ?>
  </p>
</div><!--text-sontent-->

<?php }); ?>