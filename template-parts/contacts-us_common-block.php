<?php if ( !empty ($contacts_us_common_main_img = get_carbon_translated('contacts_us_common_main_img') ) ) : ?>
<div class="contacts-us">
  <div class="contacts-us__image">
    <img src="<?php echo wp_get_attachment_image_url(($contacts_us_common_main_img), 'full'); ?>" alt loading="lazy" width="1920" height="1684" sizes="100vw">
  </div>
  <div class="decor-lines to-right">
    <div class="decor-lines__mask">
      <div class="decor-lines__image"
        style="background-image: linear-gradient(146deg, #FFFFFF 13.43%, rgba(255, 255, 255, 0) 59.86%);"></div>
    </div>
  </div><!-- decor-lines -->
  <div class="contacts-us__in container">
    <div class="contacts-us__content">
      <div class="contacts-us__sm-text text-splitter">
        <?php echo get_carbon_translated('contacts_us_common_text_title'); ?>
      </div>
      <h2 class="contacts-us__title h2 text-splitter">
        <?php echo get_carbon_translated('contacts_us_common_title'); ?>
      </h2>
      <div class="contacts-us__text text-splitter">
        <?php echo get_carbon_translated('contacts_us_common_desc'); ?>
      </div>
      <div class="contacts-us__actions">
        <a class="site-button js-modal-trigger" href="#form">
          Send request 
          <span class="svg-icon svg-icon--arr-r3"
            aria-hidden="true">
            <svg class="svg-icon__link">
              <use xlink:href="#arr-r3"></use>
            </svg>
          </span>
        </a>

        <?php if ( !empty ($socials = get_carbon_translated('theme_socials') ) ) : ?>
        <div class="socials">
          <div class="socials__items">

            <?php foreach ($socials as $item): ?>
            <a class="socials__item" href="<?php echo $item['link']; ?>" aria-label="<?php echo $item['title']; ?>">
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
<?php endif; ?>