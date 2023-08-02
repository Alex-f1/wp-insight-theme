<?php 

  // Фоновое видео
  $hero_individual_video = wp_get_attachment_url(carbon_get_post_meta($post->ID, 'hero_individual_video')); 
  $hero_business_video = wp_get_attachment_url(carbon_get_post_meta($post->ID, 'hero_business_video')); 

  // Фоновое изображение
  $hero_individual_img = wp_get_attachment_image_url(carbon_get_post_meta($post->ID, 'hero_individual_img'), 'full'); 
  $hero_business_img = wp_get_attachment_image_url(carbon_get_post_meta($post->ID, 'hero_business_img'), 'full'); 

?>

<div style="background-color: #265771;" class="hero js-intro">
  <div class="hero__in js-hero js-translate">
    <div style="opacity: 0.6;" class="top-shadow">
      <div class="top-shadow__in"></div>
    </div><!-- top-shadow -->
    <div class="hero__media">
      <div class="hero__image js-scaleout">
        <img loading="lazy" width="1920" height="1128" sizes="100vw" src="<?php echo wp_get_attachment_image_url(carbon_get_post_meta($post->ID,'hero_main_img'), 'full'); ?>" alt="">
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
      <div class="hero__media-action js-scaleout" data-index="0">

        <?php if ($hero_individual_video): ?>
        <video muted="muted" loop="" playsinline>
          <source src="<?php echo wp_get_attachment_url(carbon_get_post_meta($post->ID, 'hero_individual_video')); ?>" type="video/mp4">
        </video>
        <?php else: ?>
          <?php if (!empty ($hero_individual_img)): ?>
          <img style="object-position: center bottom;" loading="lazy" width="1920" height="1128"
                                    sizes="100vw" src="<?php echo $hero_individual_img; ?>" alt="">
          <?php else: ?>
          <img style="object-position: center top;" loading="lazy" width="1920" height="1128" sizes="100vw" src="<?php echo wp_get_attachment_image_url(carbon_get_post_meta($post->ID, 'hero_main_img'), 'full'); ?>" alt="">
          <?php endif; ?>
        <?php endif; ?>
      </div>
      <div class="hero__media-action js-scaleout" data-index="1">
        
        <?php if ($hero_business_video): ?>
        <video muted="muted" loop="" playsinline>
            <source src="<?php echo wp_get_attachment_url(carbon_get_post_meta($post->ID, 'hero_business_video')); ?>"
            type="video/mp4">
        </video>
        <?php else: ?>
          <?php if (!empty ($hero_business_img)): ?>
          <img style="object-position: center top;" loading="lazy" width="1920" height="1128"
                                    sizes="100vw" src="<?php echo $hero_business_img; ?>" alt="">
          <?php else: ?>
          <img style="object-position: center top;" loading="lazy" width="1920" height="1128" sizes="100vw" src="<?php echo wp_get_attachment_image_url(carbon_get_post_meta($post->ID, 'hero_main_img'), 'full'); ?>" alt="">
          <?php endif; ?>
        <?php endif; ?>
      </div>
      <div class="shadow js-shadow"></div>
    </div>
    <div class="hero__container container js-opacityout">
      <div class="hero__items js-scaleout">
        <a href="<?php echo carbon_get_post_meta($post->ID, 'hero_individual_link') ?>" data-index="0" class="hero__item">
          <span class="hero__item-container">
            <span class="hero__item-title"><?php echo carbon_get_post_meta($post->ID, 'hero_individual_title') ?></span>
            <span class="hero__item-text"><?php echo carbon_get_post_meta($post->ID, 'hero_individual_text') ?></span>
            <span class="svg-icon svg-icon--arr-r2" aria-hidden="true">
              <svg class="svg-icon__link">
                <use xlink:href="#arr-r2"></use>
              </svg>
            </span>
          </span>
        </a>
        <a href="<?php echo carbon_get_post_meta($post->ID, 'hero_business_link') ?>" data-index="1" class="hero__item">
          <span class="hero__item-container">
            <span class="hero__item-title"><?php echo carbon_get_post_meta($post->ID, 'hero_business_title') ?></span>
            <span class="hero__item-text"><?php echo carbon_get_post_meta($post->ID, 'hero_business_text') ?></span>
            <span class="svg-icon svg-icon--arr-r2" aria-hidden="true">
              <svg class="svg-icon__link">
                <use xlink:href="#arr-r2"></use>
              </svg>
            </span>
          </span>
        </a>
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