<?php 

  // Фоновое изображение
  $hero_img = wp_get_attachment_image_url(carbon_get_post_meta($post->ID, 'hero_main_img'), 'full'); 

  // Фоновое видео
  $hero_video = wp_get_attachment_url(carbon_get_post_meta($post->ID, 'hero_video'));
?>

<div style="background-color: #265771;" class="hero js-intro <?php if ($hero_video) { echo 'has-video';} ?>">
  <div class="hero__in js-hero js-translate">
    <div style="opacity: 0.6;" class="top-shadow">
      <div class="top-shadow__in"></div>
    </div><!-- top-shadow -->
    <div class="hero__media">
      <?php if (!empty($hero_video)): ?>
      <div class="hero__image js-scaleout">
        <video class="s-video" muted="muted" autoplay="" loop="" playsinline="">
          <source src="<?php echo $hero_video; ?>" type="video/mp4">
        </video>
      </div>
      <?php elseif ( !empty ($hero_img) ) : ?>
      <div class="hero__image js-scaleout">
        <img loading="lazy" width="1920" height="1128" sizes="100vw" src="<?php echo $hero_img; ?>" alt="">
        <div class="decor-lines js-opacityout">
          <div class="decor-lines__mask">

            <?php if ( !empty ($hero_img_for_mask = carbon_get_post_meta($post->ID, 'hero_img_for_mask') ) ) : ?>
            <div style="background-image: url('<?php echo wp_get_attachment_image_url(($hero_img_for_mask), 'full'); ?>" class="decor-lines__image"></div>
            <?php else: ?>
            <div style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/hero-img-s.jpeg');" class="decor-lines__image"></div>  
            <?php endif; ?>
            
          </div>
        </div><!-- decor-lines -->
      </div>
      <?php endif; ?>
      <div class="shadow js-shadow"></div>
    </div>
    <div class="hero__container container js-opacityout">
      <div class="hero__text">
        <div class="hero__title text-splitter">
          <?php echo carbon_get_post_meta($post->ID, 'hero_title') ?>
        </div>
        <div class="hero__text-content text-splitter">
            <?php echo carbon_get_post_meta($post->ID, 'hero_text') ?>
        </div>
      </div>
      <button class="scroll-btn">
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
  </div>
</div><!-- hero -->