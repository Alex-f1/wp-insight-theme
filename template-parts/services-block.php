<section class="services">
  <div class="services__overtitle text-splitter">
    <?php echo get_carbon_translated('other_services_text_title') ?>
  </div>
  <h2 class="services__title h2 decor-title text-splitter">
    <?php echo get_carbon_translated('other_services_title') ?>
  </h2>
  <div class="services__items-wrap container">
    <div class="services__items">
      <?php
        /* $service = get_terms([
          'taxonomy' => 'service',
          'hide_empty' => false,
          'child_of' => 0,
          'orderby' => 'name',
          'order' => 'ASC'
        ]); */

        $hotels_id = 34;
        $apartments_id = 36;
        $villas_id = 38;

        $hotels = get_term($hotels_id);
        $apartments = get_term($apartments_id);
        $villas = get_term($villas_id);

        $flights_id = 40;
        $airport_id = 42;
        $transfer_id = 44;

        $flights = get_term($flights_id);
        $airport = get_term($airport_id);
        $transfer = get_term($transfer_id);

      ?>
      
      <div class="services__item rellax" data-rellax-min="0" data-rellax-percentage="0.4" data-rellax-speed="3.5">
        <a class="services__item-link" href="<?php echo get_term_link($hotels_id, $hotels->taxonomy); ?>" aria-label="<?php echo $hotels->name ?>"></a>
        <div class="services__item-image">
          <img src="<?php echo wp_get_attachment_image_url(carbon_get_term_meta($hotels_id, 'service_img'), 'full'); ?>" alt loading="lazy" width="613" height="1053">
        </div>
        <div class="services__item-container">
          <div class="services__item-text text-splitter">
            <?php echo $hotels->description ?>
          </div>
          <div class="services__item-title text-splitter">
            <?php echo $hotels->name ?>
          </div>
          <div class="services__item-icon">
            <span class="svg-icon svg-icon--arr-r2" aria-hidden="true">
              <svg class="svg-icon__link">
                <use xlink:href="#arr-r2"></use>
              </svg>
            </span>
          </div>
        </div>
      </div>
      <div class="services__item rellax" data-rellax-min="0" data-rellax-percentage="0.4" data-rellax-speed="7">
        <a class="services__item-link" href="<?php echo get_term_link($apartments_id, $apartments->taxonomy); ?>" aria-label="<?php echo $apartments->name ?>"></a>
        <div class="services__item-image">
          <img src="<?php echo wp_get_attachment_image_url(carbon_get_term_meta($apartments_id, 'service_img'), 'full'); ?>" alt loading="lazy" width="613" height="1053">
        </div>
        <div class="services__item-container">
          <div class="services__item-text text-splitter">
            <?php echo $apartments->description ?>
          </div>
          <div class="services__item-title text-splitter">
            <?php echo $apartments->name ?>
          </div>
          <div class="services__item-icon">
            <span class="svg-icon svg-icon--arr-r2" aria-hidden="true">
              <svg class="svg-icon__link">
                <use xlink:href="#arr-r2"></use>
              </svg>
            </span>
          </div>
        </div>
      </div>
      <div class="services__item rellax" data-rellax-min="0" data-rellax-percentage="0.4" data-rellax-speed="14">
        <a class="services__item-link" href="<?php echo get_term_link($villas_id, $villas->taxonomy); ?>" aria-label="<?php echo $villas->name ?>"></a>
        <div class="services__item-image">
          <img src="<?php echo wp_get_attachment_image_url(carbon_get_term_meta($villas_id, 'service_img'), 'full'); ?>" alt loading="lazy" width="613" height="1053">
        </div>
        <div class="services__item-container">
          <div class="services__item-text text-splitter">
            <?php echo $villas->description ?>
          </div>
          <div class="services__item-title text-splitter">
            <?php echo $villas->name ?>
          </div>
          <div class="services__item-icon">
            <span class="svg-icon svg-icon--arr-r2" aria-hidden="true">
              <svg class="svg-icon__link">
                <use xlink:href="#arr-r2"></use>
              </svg>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="services__container-wrap">
    <div class="services__image">
      <div class="services__shadows">
        <div class="bl-shadow"></div>
      </div>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/serv-img.jpg" alt loading="lazy" width="1920" height="1308" sizes="100vw" srcset="
                <?php echo get_template_directory_uri(); ?>/assets/img/serv-img-s.jpg 575w,
                <?php echo get_template_directory_uri(); ?>/assets/img/serv-img.jpg 1920w">
    </div>
    <div class="decor-lines">
      <div class="decor-lines__mask">
        <div class="decor-lines__image" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/serv-img.jpg);"></div>
      </div>
    </div><!-- decor-lines -->
    <div class="services__container container">
      <div class="logo-icon">
        <span class="svg-icon svg-icon--logo-icon" aria-hidden="true">
          <svg class="svg-icon__link">
            <use xlink:href="#logo-icon"></use>
          </svg>
        </span>
      </div><!-- logo-icon -->
      <div class="services__text">
        <div class="services__text-title text-splitter">
          <?php echo get_carbon_translated('other_services_airport_title') ?>
        </div>
        <div class="text-splitter"> 
          <?php echo get_carbon_translated('other_services_airport_desc') ?>
        </div>
      </div>
    </div>
  </div>
  <div class="services__items-wrap container">
    <div class="services__items rellaxxx" data-rellax-min="-100" data-rellax-speed="10">
      <div class="services__item rellax" data-rellax-min="0" data-rellax-percentage="0.4" data-rellax-speed="3.5">
        <a class="services__item-link" href="<?php echo get_term_link($flights_id, $flights->taxonomy); ?>" aria-label="<?php echo $flights->name ?>"></a>
        <div class="services__item-image">
          <img src="<?php echo wp_get_attachment_image_url(carbon_get_term_meta($flights_id, 'service_img'), 'full'); ?>" alt loading="lazy" width="613" height="1053">
        </div>
        <div class="services__item-container">
          <div class="services__item-text text-splitter">
            <?php echo $flights->description ?>
          </div>
          <div class="services__item-title text-splitter">
            <?php echo $flights->name ?>
          </div>
          <div class="services__item-icon">
            <span class="svg-icon svg-icon--arr-r2" aria-hidden="true">
              <svg class="svg-icon__link">
                <use xlink:href="#arr-r2"></use>
              </svg>
            </span>
          </div>
        </div>
      </div>
      <div class="services__item rellax" data-rellax-min="0" data-rellax-percentage="0.4" data-rellax-speed="7">
        <a class="services__item-link" href="<?php echo get_term_link($airport_id, $airport->taxonomy); ?>" aria-label="<?php echo $airport->name ?>"></a>
        <div class="services__item-image">
          <img src="<?php echo wp_get_attachment_image_url(carbon_get_term_meta($airport_id, 'service_img'), 'full'); ?>" alt loading="lazy" width="613" height="1053">
        </div>
        <div class="services__item-container">
          <div class="services__item-text text-splitter">
            <?php echo $airport->description ?>
          </div>
          <div class="services__item-title text-splitter">
            <?php echo $airport->name ?>
          </div>
          <div class="services__item-icon">
            <span class="svg-icon svg-icon--arr-r2" aria-hidden="true">
              <svg class="svg-icon__link">
                <use xlink:href="#arr-r2"></use>
              </svg>
            </span>
          </div>
        </div>
      </div>
      <div class="services__item rellax" data-rellax-min="0" data-rellax-percentage="0.4" data-rellax-speed="14">
        <a class="services__item-link" href="<?php echo get_term_link($transfer_id, $transfer->taxonomy); ?>" aria-label="<?php echo $transfer->name ?>"></a>
        <div class="services__item-image">
          <img src="<?php echo wp_get_attachment_image_url(carbon_get_term_meta($transfer_id, 'service_img'), 'full'); ?>" alt loading="lazy" width="613" height="1053">
        </div>
        <div class="services__item-container">
          <div class="services__item-text text-splitter">
            <?php echo $transfer->description ?>
          </div>
          <div class="services__item-title text-splitter">
            <?php echo $transfer->name ?>
          </div>
          <div class="services__item-icon">
            <span class="svg-icon svg-icon--arr-r2" aria-hidden="true">
              <svg class="svg-icon__link">
                <use xlink:href="#arr-r2"></use>
              </svg>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- services -->