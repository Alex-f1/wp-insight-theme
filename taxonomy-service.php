<?php
/*
 Template Name: Услуги
*/
?>

<?php get_header(); ?>

<div class="hero-in js-intro">
  <div class="hero-in__in js-hero js-translate">
    <div class="hero-in__media js-scaleout">
      <img src="<?php echo wp_get_attachment_image_url(carbon_get_term_meta(get_queried_object_id(), 'service_hero_in_main_img'), 'full'); ?>" alt loading="lazy" width="1920" height="751" sizes="100vw">
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
            <?php echo carbon_get_term_meta(get_queried_object_id(), 'service_hero_in_text_title'); ?>
          </div>
          <h1 class="h1 text-splitter">
            <?php echo carbon_get_term_meta(get_queried_object_id(), 'service_hero_in_title'); ?>
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
<div class="moving-text">
  <div class="moving-text__in js-marquee" data-speed="2.1">
    <span>
      <?php echo carbon_get_term_meta(get_queried_object_id(), 'service_content_moving_text'); ?>
    </span>
  </div>
</div><!-- moving-text -->
<div class="service-text container">
  <h2 class="h2 text-splitter">
    <?php echo carbon_get_term_meta(get_queried_object_id(), 'service_content_title'); ?>
  </h2>
  <p style="color: #AEAAA0;">
    <?php echo carbon_get_term_meta(get_queried_object_id(), 'service_content_desc'); ?>
  </p>
  <div class="service-text__row type-1">
    <div class="service-text__col">
      <div class="s-img">
        <img src="<?php echo wp_get_attachment_image_url(carbon_get_term_meta(get_queried_object_id(), 'service_content_img_l'), 'full'); ?>" alt loading="lazy" width="820" height="460" sizes="100vw">
      </div>
    </div>
    <div class="service-text__col d-flex">
      <h3>
        <?php echo carbon_get_term_meta(get_queried_object_id(), 'service_content_img_name_r'); ?>
      </h3>
      <div>
        <p class="sm-text">
          <?php echo carbon_get_term_meta(get_queried_object_id(), 'service_content_img_text_r'); ?>
        </p>
      </div>
    </div>
  </div>
  <div class="service-text__container">
    <h3 class="h3">
      <?php echo carbon_get_term_meta(get_queried_object_id(), 'service_content_info_title'); ?>
    </h3>
    <div class="service-text__row type-1">
      <div class="service-text__col sm-text">
        <?php echo wpautop(carbon_get_term_meta(get_queried_object_id(), 'service_content_info_text_l')); ?>
      </div>
      <div class="service-text__col sm-text">
        <?php echo wpautop(carbon_get_term_meta(get_queried_object_id(), 'service_content_info_text_r')); ?>
      </div>
    </div>
    <p class="sm-text">
      <?php echo carbon_get_term_meta(get_queried_object_id(), 'service_content_info_text_b'); ?>
    </p>
    <div class="service-text__row type-1 reverse">
      <div class="service-text__col">
        <!-- <h3 class="h3 d-hidden">Gulf Cooperation Council members which accounted for 34% of tourists</h3> -->
        <div class="s-img">
          <img src="<?php echo wp_get_attachment_image_url(carbon_get_term_meta(get_queried_object_id(), 'service_content_img_r'), 'full'); ?>" alt loading="lazy" width="840" height="460" sizes="100vw">
        </div>
      </div>
      <div class="service-text__col d-flex">
        <h3 class="h3 m-hidden">
          <?php echo carbon_get_term_meta(get_queried_object_id(), 'service_content_img_name_l'); ?>
        </h3>
        <div>
          <p class="sm-text">
            <?php echo carbon_get_term_meta(get_queried_object_id(), 'service_content_img_text_l'); ?>
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
    <img src="<?php echo wp_get_attachment_image_url(carbon_get_term_meta(get_queried_object_id(), 'service_contacts_us_main_img'), 'full'); ?>" alt loading="lazy" width="1920" height="1684" sizes="100vw">
    <div class="shadow"></div>
  </div>
  <div class="decor-lines to-right">
    <div class="decor-lines__mask">
      <div class="decor-lines__image" style="background-image: url(<?php echo wp_get_attachment_image_url(carbon_get_term_meta(get_queried_object_id(), 'service_contacts_us_img_for_mask'), 'full'); ?>)"></div>
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
        <?php echo carbon_get_term_meta(get_queried_object_id(), 'service_contacts_us_text_title'); ?>
      </div>
      <h2 class="contacts-us__title h2 text-splitter">
        <?php echo carbon_get_term_meta(get_queried_object_id(), 'service_contacts_us_title'); ?>
      </h2>
      <div class="contacts-us__text text-splitter">
        <?php echo carbon_get_term_meta(get_queried_object_id(), 'service_contacts_us_desc'); ?>
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

<?php
$services = get_posts(array(
  'post_type' => 'services',
  'posts_per_page' => -1,
  'orderby' => 'rand',
  'tax_query' => array(
    array(
      'taxonomy' => 'service',
      'field' => 'id',
      'terms' => array(get_queried_object_id())
    )
  )
));

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

            foreach ($services as $post):
              setup_postdata($post); 
          ?>

          <div class="hotels-and-villas__item swiper-slide">
            <a class="hotels-and-villas__item-in" href="<?php the_permalink(); ?>">
              <span class="hotels-and-villas__item-image">
                <span class="hotels-and-villas__item-shield">exclusive offers</span>
                <img src="<?php the_post_thumbnail_url(); ?>" alt loading="lazy" width="479" height="317" sizes="100vw">
              </span>
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

<?php
  // Блок "Поп-ап форма - b-modal"
  echo get_template_part('template-parts/b-modal-block');
?>

<?php get_footer(); ?>