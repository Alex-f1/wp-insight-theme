<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;

$elements_labels = array(
  'plural_name' => 'Элементы', //entries
  'singular_name' => 'Элемент', //entry
);

Block::make('about_us', __('О нас'))
  ->add_fields(array(
    // Контент
    Field::make('separator', 'about_us_content_separator', __('Контент')),
    Field::make('text', 'about_us_content_title', __('Заголовок')),
    Field::make('textarea', 'about_us_content_desc', __('Описание'))->set_width(70),
    Field::make('image', 'about_us_content_img', __('Изображение'))->set_width(30),
    Field::make('text', 'about_us_content_name', __('Название')),
    Field::make('textarea', 'about_us_content_text', __('Текст')),
    // Бегущий текст при прокрутке
    Field::make('separator', 'about_us_moving_text_separator', __('Бегущий текст при прокрутке')),
    Field::make('text', 'about_us_moving_text', __('Бегущий текст')),
    // Руководство компании
    Field::make('separator', 'about_us_company_ceo', __('Руководство компании')),
    Field::make('text', 'about_us_company_ceo_title', __('Заголовок')),
    Field::make('complex', 'about_us_company_ceo_items', 'Список руководителей')
      ->setup_labels($elements_labels)
      ->set_layout('tabbed-horizontal')
      ->add_fields(array(
        Field::make('image', 'img', __('Аватар'))->set_width(33),
        Field::make('text', 'name', __('Имя'))->set_width(33),
        Field::make('text', 'position', __('Должность'))->set_width(33),
        Field::make('textarea', 'text', __('Текст')),
        Field::make('complex', 'about_us_company_ceo_socials', __('Социальные сети'))
          ->setup_labels($elements_labels)
          ->set_layout('tabbed-horizontal')
          ->add_fields(array(
            Field::make('image', 'icon', __('Иконка'))->set_width(20),
            Field::make('text', 'title', __('Название'))->set_width(40),
            Field::make('text', 'link', __('Ссылка'))->set_width(40)
          ))->set_collapsed( true )->set_header_template('<%- title %>'),
      ))->set_collapsed(true)->set_header_template('<%- name %>'),

  ))
    ->set_icon('admin-page')
    ->set_keywords(array(
      'insight',
    ))
      ->set_category('page', __('О нас'))
      ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
        
        $company_ceo_items = $fields['about_us_company_ceo_items'];
        
?>

<div class="service-text type-2 c-location container">
  <h2 class="service-text__title h2">
    <?php echo $fields['about_us_content_title']; ?>
  </h2>
  <div class="service-text__container">
    <div class="service-text__row">
      <div class="service-text__col md-text">
        <?php echo wpautop($fields['about_us_content_desc'], false); ?>
      </div>
      <div class="service-text__col type-3">
        <div class="b-img type-2">
          <img loading="lazy" width="714" height="410" sizes="100vw" src="<?php echo wp_get_attachment_image_url($fields['about_us_content_img'], 'full'); ?>" alt="">
        </div>
      </div>
    </div>

    <div class="sm-title">
      <?php echo $fields['about_us_content_name']; ?>
    </div>

    <p class="sm-text lg-center">
      <?php echo $fields['about_us_content_text']; ?>
    </p>
  </div>
</div><!-- service-text -->

<div class="moving-text border-top">
  <div class="moving-text__in js-marquee" data-speed="2.1">
    <span>
      <?php echo $fields['about_us_moving_text']; ?>
    </span>
  </div>
</div><!-- moving-text -->

<?php if ( !empty ($company_ceo_items ) ) : ?>
<div class="company-ceo">
  <div class="company-ceo__header container">
    <h2 class="company-ceo__title">
      <?php echo $fields['about_us_company_ceo_title']; ?>
    </h2>
  </div>
  <div class="company-ceo__slider">
    <div class="company-ceo__slider-in container">
      <div class="company-ceo__items-wrapper js-company-ceo-slider swiper">
        <div class="company-ceo__items swiper-wrapper">

          <?php foreach ( $company_ceo_items as $item ) : ?>
            <?php $company_ceo_socials = $item['about_us_company_ceo_socials']; ?>

          <div class="company-ceo__item swiper-slide">
            <div class="company-ceo__item-col">
              <div class="company-ceo__item-image">
                <img src="<?php echo wp_get_attachment_image_url($item['img'], 'full'); ?>" alt="">
              </div>
              <div class="company-ceo__item-name">
                <?php echo $item['name']; ?>
                <span>
                  <?php echo $item['position']; ?>
                </span>
              </div>
            </div>
            <div class="company-ceo__item-container">
              <div class="company-ceo__item-text">
                <?php echo $item['text']; ?>
              </div>

              <?php if ( !empty ($company_ceo_socials ) ) : ?>
              <div class="socials">
                <div class="socials__items">

                  <?php foreach ( $company_ceo_socials as $social_item ) : ?>
                  <a href="<?php echo $social_item['link']; ?>" aria-label="<?php echo $social_item['title']; ?>" class="socials__item">
                    <?php echo file_get_contents(wp_get_attachment_image_url($social_item['icon'], 'full')); ?>
                  </a>
                  <?php endforeach; ?>

                </div>
              </div><!-- socials -->
              <?php endif; ?>

            </div>
          </div>
          <?php endforeach; ?>

        </div>
      </div>
    </div>
  </div>
</div><!-- company-ceo -->
<?php endif; ?>

<?php }); ?>