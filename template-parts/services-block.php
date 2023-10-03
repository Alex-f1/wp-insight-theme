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
         $service = get_terms([
          'taxonomy' => 'service',
          'hide_empty' => false,
          'child_of' => 0,
          'orderby' => 'id',
          'order' => 'ASC'
        ]);

      foreach( $service as $key=>$item ) {
        $service_choice = carbon_get_term_meta( $item->term_id, 'service_choice' );
      ?>
        <?php if ($service_choice == "service_choice_for_placement") : ?>
          <?php if (carbon_get_term_meta( $item->term_id, 'service_show' )) : ?>
          <div class="services__item rellax" data-rellax-min="0" data-rellax-percentage="0.4" data-rellax-speed="<?php if ($key == 0) {echo 3.5;} else if ($key == 1) {echo 7;} else if ($key == 2) {echo 14;} ?>">
            <a class="services__item-link" href="<?php echo get_term_link($item->term_id, $item->taxonomy); ?>" aria-label="<?php echo $item->name ?>"></a>
            <div class="services__item-image">
              <?php if (carbon_get_term_meta( $item->term_id, 'service_preview_main_img' )) : ?>
                  <img src="<?php echo wp_get_attachment_image_url(carbon_get_term_meta($item->term_id, 'service_preview_main_img'), 'full'); ?>" alt width="613" height="1053" loading="lazy">
              <?php else: ?>
                  <img src="<?php echo wp_get_attachment_image_url(carbon_get_term_meta($item->term_id, 'service_img'), 'full'); ?>" alt loading="lazy" width="613" height="1053">
              <?php endif; ?>
            </div>
            <div class="services__item-container">
              <div class="services__item-text text-splitter">
                <?php echo $item->description ?>
              </div>
              <div class="services__item-title text-splitter">
                <?php if (carbon_get_term_meta( $item->term_id, 'service_preview_main_title' )) : ?>
                  <?php echo carbon_get_term_meta( $item->term_id, 'service_preview_main_title' ) ?>
                <?php else: ?>
                  <?php echo $item->name ?>
                <?php endif; ?>
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
          <?php endif; ?>
        <?php endif; ?>
      <?php
          }

          wp_reset_postdata();

      ?>

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
      <?php
      $service_airport = get_terms([
        'taxonomy' => 'service',
        'hide_empty' => false,
        'child_of' => 0,
        'orderby' => 'id',
        'order' => 'ASC'
      ]);

      foreach( $service_airport as $key=>$item ) {
        $service_choice = carbon_get_term_meta( $item->term_id, 'service_choice' );
      ?>
      <?php if ($service_choice == "service_choice_for_airports") : ?>
          <?php if (carbon_get_term_meta( $item->term_id, 'service_show' )) : ?>
          <div class="services__item rellax" data-rellax-min="0" data-rellax-percentage="0.4" data-rellax-speed="<?php if ($key == 3) {echo 3.5;} else if ($key == 4) {echo 7;} else if ($key == 5) {echo 14;} ?>">
            <a class="services__item-link" href="<?php echo get_term_link($item->term_id, $item->taxonomy); ?>" aria-label="<?php echo $item->name ?>"></a>
            <div class="services__item-image">
            <?php if (carbon_get_term_meta( $item->term_id, 'service_preview_main_img' )) : ?>
                <img src="<?php echo wp_get_attachment_image_url(carbon_get_term_meta($item->term_id, 'service_preview_main_img'), 'full'); ?>" alt width="613" height="1053" loading="lazy">
            <?php else: ?>
                <img src="<?php echo wp_get_attachment_image_url(carbon_get_term_meta($item->term_id, 'service_img'), 'full'); ?>" alt loading="lazy" width="613" height="1053">
            <?php endif; ?>
            </div>
            <div class="services__item-container">
              <div class="services__item-text text-splitter">
                <?php echo $item->description ?>
              </div>
              <div class="services__item-title text-splitter">
                <?php if (carbon_get_term_meta( $item->term_id, 'service_preview_main_title' )) : ?>
                  <?php echo carbon_get_term_meta( $item->term_id, 'service_preview_main_title' ) ?>
                <?php else: ?>
                  <?php echo $item->name ?>
                <?php endif; ?>
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
          <?php endif; ?>
        <?php endif; ?>
      <?php
          }

          wp_reset_postdata();

      ?>
      
    </div>
  </div>
</section><!-- services -->