<?php if ( !empty ($travel = carbon_get_post_meta($post->ID, 'travel_items') ) ) : ?>
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

    <?php foreach ($travel as $key => $item): ?>
    <div class="travel__item rellax2" data-rellax-speed="<?php echo $key == 0 ? 6 : 2 ?>" data-rellax-percentage="0.46" data-rellax-min="0">
      <div class="travel__item-image">
        <img loading="lazy" width="920" height="669" sizes="100vw" src="<?php echo wp_get_attachment_image_url($item['img'], 'full'); ?>" alt="">
      </div>
      <div class="travel__item-container">
        <div class="travel__item-text text-splitter">
          <?php echo $item['title_text']; ?>
        </div>
        <div class="travel__item-title text-splitter">
          <?php echo $item['title']; ?>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
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
<?php endif; ?>