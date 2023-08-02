<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;

$elements_labels = array(
  'plural_name' => 'Элементы', //entries
  'singular_name' => 'Элемент', //entry
);

Block::make('location', __('Локация'))
  ->add_fields(array(
    // Первый экран
    Field::make('image', 'location_hero_in_main_img', __('Фоновое изображение')),
    Field::make('text', 'location_hero_in_text_title', 'Текст над заголовком'),
    Field::make('text', 'location_hero_in_title', 'Заголовок страны'),
    // Контент
    Field::make('separator', 'location_content_separator', __('Контент')),
    Field::make('text', 'location_content_title', __('Заголовок')),
    Field::make('textarea', 'location_content_text_l', __('Текст слева'))->set_width(50),
    Field::make('textarea', 'location_content_text_r', __('Текст справа'))->set_width(50),
    Field::make('text', 'location_content_title_img', __('Заголовок над изображением')),
    Field::make('image', 'location_content_img', __('Изображение')),
    Field::make('textarea', 'location_content_img_text', __('Текст под изображением')),
    // Банер
    Field::make('separator', 'location_banner_separator', __('Банер')),
    Field::make('image', 'location_contacts_us_main_img', __('Фоновое изображение'))->set_width(50),
    Field::make('image', 'location_contacts_us_img_for_mask', __('Декоративное изображение в виде линий'))->set_width(50),
    Field::make('text', 'location_contacts_us_text_title', 'Текст над заголовком'),
    Field::make('text', 'location_contacts_us_title', 'Заголовок'),
    Field::make('text', 'location_contacts_us_desc', 'Описание'),
  ))
    ->set_icon('location-alt')
    ->set_keywords(array(
      'insight',
    ))
      ->set_category('location', __('Направление'))
      ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
         
?>

<div class="hero-in js-intro" style="background-color: #B29869;">
  <div class="hero-in__in js-hero js-translate">
    <div class="hero-in__media js-scaleout">
      <img src="<?php echo wp_get_attachment_image_url($fields['location_hero_in_main_img'], 'full'); ?>" alt loading="lazy" width="1920" height="751" sizes="100vw">
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
            <?php echo $fields['location_hero_in_text_title']; ?>
          </div>
          <h1 class="h1 text-splitter">
            <?php echo $fields['location_hero_in_title']; ?>, <?php the_title(); ?>
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
<div class="service-text type-2 c-location container">
  <h2 class="service-text__title h2">
    <?php echo $fields['location_content_title']; ?>
  </h2>
  <div class="service-text__container">
    <div class="service-text__row service-text__row--text">
      <div class="service-text__col md-text">
        <?php echo wpautop($fields['location_content_text_l'], false); ?>
      </div>
      <div class="service-text__col sm-text">
        <?php echo wpautop($fields['location_content_text_r'], false); ?>
      </div>
    </div>
    <div class="sm-title"><?php echo $fields['location_content_title_img']; ?></div>
    <div class="b-img">
      <img src="<?php echo wp_get_attachment_image_url($fields['location_content_img'], 'full'); ?>" alt loading="lazy" width="1438" height="299" sizes="100vw">
    </div>
    <p class="sm-text lg-center">
      <?php echo $fields['location_content_img_text']; ?>
    </p>
  </div>
</div><!-- service-text -->
<?php 
  $location_contacts_us_main_img = $fields['location_contacts_us_main_img'] ?? ''; 
  $location_contacts_us_img_for_mask = $fields['location_contacts_us_img_for_mask'] ?? '';
?>

<div class="hotels-and-villas container simple-list">
  <div class="hotels-and-villas__header">
    <h2 class="hotels-and-villas__title h2 decor-title text-splitter">Top hotels in <?php the_title(); ?></h2>
  </div>
  <div class="hotels-and-villas__items">

    <?php

      global $post;

      $services_posts = get_posts(
        array(
          'post_type' => 'services',
          // 'post_parent' => $post->ID,
          'posts_per_page' => -1,
          'orderby' => 'post_title',
          'order' => 'ASC'
        )
      );

      foreach ($services_posts as $post):
        setup_postdata($post); 
    ?>
    <div class="hotels-and-villas__item">
      <a class="hotels-and-villas__item-in" href="<?php the_permalink(); ?>">
        <?php if ( !empty(get_the_post_thumbnail_url()) ) : ?>
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
</div><!-- hotels-and-villas -->


<?php
  // Блок "Поп-ап форма - b-modal"
  echo get_template_part('template-parts/b-modal-block');
?>

<?php if ( !empty ($location_contacts_us_main_img) ) : ?>
<div class="contacts-us type-2 type-3 type-4">
  <div class="contacts-us__image">
    <img loading="lazy" width="1920" height="1684" sizes="100vw" src="<?php echo wp_get_attachment_image_url(($location_contacts_us_main_img), 'full'); ?>" alt="">
    <div class="shadow"></div>
  </div>
  <div class="decor-lines to-right">
    <div class="decor-lines__mask">

      <?php if ( !empty ($location_contacts_us_img_for_mask) ) : ?>
      <div style="background-image: url('<?php echo wp_get_attachment_image_url(($location_contacts_us_img_for_mask), 'full'); ?>" class="decor-lines__image">
      </div>
      <?php else: ?>
      <div style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/contacts-us-5-s.jpg')" class="decor-lines__image">
      </div>
      <?php endif; ?>
      
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
        <?php echo $fields['location_contacts_us_text_title']; ?>
      </div>
      <h2 class="contacts-us__title h2 text-splitter">
        <?php echo $fields['location_contacts_us_title']; ?>
      </h2>
      <div class="contacts-us__text text-splitter">
        <?php echo $fields['location_contacts_us_desc']; ?>
      </div>
      <div class="contacts-us__actions">
        <a href="#form" class="js-modal-trigger site-button">
          Send request
          <span class="svg-icon svg-icon--arr-r3" aria-hidden="true">
            <svg class="svg-icon__link">
              <use xlink:href="#arr-r3"></use>
            </svg>
          </span>
        </a>

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
  </div>
</div><!-- contacts-us -->
<?php endif; ?>

<div class="services2 type-2">
  <div class="services2__in container">
    <div class="services2__header">
      <div class="services2__title text-splitter">Services</div>
      <div class="services2__undertitle text-splitter">Travel around the world with luxury <br> level of the service</div>
    </div>
    <div class="services2__items">
      <?php
        $services = get_terms([
          'taxonomy' => 'service',
          'hide_empty' => false,
          'child_of' => 0,
          'orderby' => 'name',
          'order' => 'ASC'
        ]);

        foreach( $services as $item ) {

      ?>
      <a class="services2__item" href="<?php echo get_term_link($item->term_id, $item->taxonomy); ?>">
        <span class="services2__item-title text-splitter">
          <?php echo $item->name ?>
        </span>
        <span class="services2__item-image">
          <img src="<?php echo wp_get_attachment_image_url(carbon_get_term_meta($item->term_id, 'service_img'), 'full'); ?>" alt width="713" height="250" loading="lazy">
        </span>
        <span class="services2__item-icon">
          <span class="svg-icon svg-icon--arr-r2" aria-hidden="true">
            <svg class="svg-icon__link">
              <use xlink:href="#arr-r2"></use>
            </svg>
          </span>
        </span>
      </a>
      <?php
        }

        wp_reset_postdata();

      ?>
    </div>
  </div>
</div><!-- services2 -->




<?php }); ?>