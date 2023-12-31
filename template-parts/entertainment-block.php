<div class="entertainment">
  <div class="entertainment__image">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/entertainment-bg.jpg" alt loading="lazy" width="1920" height="1128" sizes="100vw" srcset="
            <?php echo get_template_directory_uri(); ?>/assets/img/entertainment-bg-s.jpg 640w,
            <?php echo get_template_directory_uri(); ?>/assets/img/entertainment-bg.jpg 1920w">
  </div>
  <div class="decor-lines to-right">
    <div class="decor-lines__mask">
      <div class="decor-lines__image" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/entertainment-bg-s.jpg);"></div>
    </div>
  </div><!-- decor-lines -->
  <div class="entertainment__in container">
    <div class="logo-icon">
      <span class="svg-icon svg-icon--logo-icon" aria-hidden="true">
        <svg class="svg-icon__link">
          <use xlink:href="#logo-icon"></use>
        </svg>
      </span>
    </div><!-- logo-icon -->
    <div class="entertainment__header">
      <h2 class="entertainment__title h2 text-splitter">
        <?php echo get_carbon_translated('other_services_entertainment_title') ?>
      </h2>
      <div class="entertainment__text text-splitter">
        <?php echo get_carbon_translated('other_services_entertainment_desc') ?>
      </div>
    </div>
    <div class="entertainment__items">
      <?php
         $service_entertainment = get_terms([
          'taxonomy' => 'entertainment',
          'hide_empty' => false,
          'child_of' => 0,
          'orderby' => 'id',
          'order' => 'ASC'
        ]);

        /*$restaurants_id = 48;
        $beach_clubs_id = 50;
        $tickets_id = 52;

        $restaurants = get_term($restaurants_id);
        $beach_clubs = get_term($beach_clubs_id);
        $tickets = get_term($tickets_id);*/

        foreach( $service_entertainment as $item ) {

      ?>
      <?php if (carbon_get_term_meta( $item->term_id, 'service_show' )) : ?>
      <a class="entertainment__item" href="<?php echo get_term_link($item->term_id, $item->taxonomy); ?>" aria-label="<?php echo $item->name; ?>">
        <span class="entertainment__item-icon">
          <?php echo file_get_contents(wp_get_attachment_image_url(carbon_get_term_meta($item->term_id, 'service_img'), 'full')); ?>
        </span>
        <span class="entertainment__item-container">
          <span class="entertainment__item-title">
            <?php echo $item->name ?>
          </span>
          <span class="entertainment__item-text">
            <?php echo $item->description ?>
          </span>
        </span>
      </a>
      <?php endif; ?>

      <?php
        }

        wp_reset_postdata();

      ?>

    </div>
  </div>
</div><!-- entertainment -->