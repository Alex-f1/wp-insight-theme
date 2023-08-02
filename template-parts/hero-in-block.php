<?php if (!is_page('dubai') && !is_page('services')) : ?>
<div style="background-color: #5B6659;" class="hero-in <?php if (is_page_template(['page-contacts.php'])) {echo 'contacts-intro';} ?> js-intro">
  <div class="hero-in__in js-hero js-translate">
    <div class="hero-in__media js-scaleout">
      <img loading="lazy" width="1920" height="751" sizes="100vw" src="<?php echo wp_get_attachment_image_url(carbon_get_post_meta($post->ID, 'hero_in_main_img'), 'full'); ?>" alt="">
    </div>
    <div class="shadow js-shadow"></div>

    <div style="opacity: 0.9; top: -75px;" class="top-shadow">
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
            <?php echo carbon_get_post_meta($post->ID, 'hero_in_text_title'); ?>
          </div>
          <h1 class="h1 text-splitter">
            <?php echo carbon_get_post_meta($post->ID, 'hero_in_title'); ?>
          </h1>
          
          <?php if (is_page_template(['page-contacts.php'])) : ?>
          <div class="contacts">
            <div class="contacts__item">
              <div class="contacts__item-name">
                <?php echo carbon_get_post_meta($post->ID, 'contacts_email_text'); ?>
              </div>
              <div class="contacts__item-body">
                <div>
                  <a href="mailto:<?php echo carbon_get_post_meta($post->ID, 'contacts_email'); ?>">
                    <?php echo carbon_get_post_meta($post->ID, 'contacts_email'); ?>
                  </a>
                </div>
              </div>
            </div>
            <div class="contacts__item">
              <div class="contacts__item-name">
                <?php echo carbon_get_post_meta($post->ID, 'contacts_phone_text'); ?>
              </div>
              <div class="contacts__item-body">
                <div>
                  <a href="tel:<?php echo make_phone_url(carbon_get_post_meta($post->ID, 'contacts_phone')); ?>">
                    <?php echo carbon_get_post_meta($post->ID, 'contacts_phone'); ?>
                  </a>
                </div>
              </div>
            </div>
          </div><!-- contacts -->
          <?php endif; ?>

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
<?php else: ?>
<div class="hero js-intro" style="background-color: #4B728C;">
  <div class="hero__in js-hero js-translate">
    <div class="top-shadow" style="opacity: 0.6;">
      <div class="top-shadow__in"></div>
    </div><!-- top-shadow -->
    <div class="hero__media">
      <div class="hero__image js-scaleout">
        <img loading="lazy" width="1920" height="1128" sizes="100vw" src="<?php echo wp_get_attachment_image_url(carbon_get_post_meta($post->ID, 'hero_in_main_img'), 'full'); ?>" style="object-position: center top;" alt="">
      </div>
      <div class="shadow js-shadow"></div>
    </div>
    <div class="hero__container container js-opacityout">
      <div class="hero__content-text js-scaleout">
        <div class="h1 text-splitter">
          <?php echo carbon_get_post_meta($post->ID, 'hero_in_title'); ?>
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
<?php endif; ?>