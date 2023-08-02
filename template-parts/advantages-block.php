<?php if ( !empty ($advantages = get_carbon_translated('advantages_items') ) ) : ?>
<div class="advantages">
  <div class="logo-icon">

    <span class="svg-icon svg-icon--logo-icon" aria-hidden="true">
      <svg class="svg-icon__link">
        <use xlink:href="#logo-icon"></use>
      </svg>
    </span>

  </div><!-- logo-icon -->

  <div class="advantages__in container">
    <div class="advantages__header">
      <h2 class="advantages__title h2 text-splitter">
        <?php echo get_carbon_translated('advantages_title'); ?>
      </h2>
      <div class="advantages__text text-splitter">
        <?php echo get_carbon_translated('advantages_desc'); ?>
      </div>
    </div>
    <div class="advantages__items">

      <?php foreach ($advantages as $item): ?>
      <div class="advantages__item">
        <div class="advantages__item-icon">
          <img width="79" height="76" loading="lazy" src="<?php echo wp_get_attachment_image_url($item['icon'], 'full') ?>" alt="">
        </div>
        <div class="advantages__item-title">
          <?php echo $item['name']; ?>
        </div>
        <div class="advantages__item-text">
          <?php echo $item['text']; ?>
        </div>
      </div>
      <?php endforeach; ?>

    </div>
  </div>
</div><!-- advantages -->
<?php endif; ?>