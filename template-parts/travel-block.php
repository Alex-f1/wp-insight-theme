<?php
  $car_id = 61;
  $yacht_id = 63;

  $car = get_term($car_id);
  $yacht = get_term($yacht_id);

?>
<section class="travel container">
  <div class="travel__header">
    <h2 class="travel__title text-splitter">
      <?php echo carbon_get_post_meta($post->ID, 'travel_title'); ?>
    </h2>
    <div class="travel__text text-splitter">
      <?php echo carbon_get_post_meta($post->ID, 'travel_desc'); ?>
    </div>
  </div>
  <div class="travel__items">
    <div class="travel__item rellax2" data-rellax-speed="6" data-rellax-percentage="0.46" data-rellax-min="0">
      <div class="travel__item-image">
        <img loading="lazy" width="920" height="669" sizes="100vw" src="<?php echo wp_get_attachment_image_url(carbon_get_term_meta($car_id, 'service_img'), 'full'); ?>" alt="">
      </div>
      <div class="travel__item-container">
        <div class="travel__item-text text-splitter">
          <?php echo $car->description ?>
        </div>
        <div class="travel__item-title text-splitter">
          <?php echo $car->name ?>
        </div>
      </div>
      <a href="<?php echo get_term_link($car_id, $car->taxonomy); ?>" class="travel__item-link" aria-label="<?php echo $car->name ?>"></a>
    </div>
    <div class="travel__item rellax2" data-rellax-speed="2" data-rellax-percentage="0.46" data-rellax-min="0">
      <div class="travel__item-image">
        <img loading="lazy" width="920" height="669" sizes="100vw" src="<?php echo wp_get_attachment_image_url(carbon_get_term_meta($yacht_id, 'service_img'), 'full'); ?>" alt="">
      </div>
      <div class="travel__item-container">
        <div class="travel__item-text text-splitter">
          <?php echo $yacht->description ?>
        </div>
        <div class="travel__item-title text-splitter">
          <?php echo $yacht->name ?>
        </div>
      </div>
      <a href="<?php echo get_term_link($yacht_id, $yacht->taxonomy); ?>" class="travel__item-link" aria-label="<?php echo $yacht->name ?>"></a>
    </div>
  </div>
  <div class="travel__footer">
    <div class="travel__footer-title text-splitter">
      <?php echo carbon_get_post_meta($post->ID, 'travel_bottom_title'); ?>
    </div>
    <div class="travel__text text-splitter">
      <?php echo carbon_get_post_meta($post->ID, 'travel_bottom_desc'); ?>
    </div>
  </div>
</section><!-- travel -->