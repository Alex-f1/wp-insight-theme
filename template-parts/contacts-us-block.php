<?php if ( !empty ($contacts_us_main_img = carbon_get_post_meta($post->ID, 'contacts_us_main_img') ) ) : ?>
<div class="contacts-us type-2 type-3 type-4">
  <div class="contacts-us__image">
    <img loading="lazy" width="1920" height="1684" sizes="100vw" src="<?php echo wp_get_attachment_image_url(($contacts_us_main_img), 'full'); ?>" alt="">
    <div class="shadow"></div>
  </div>
  <div class="decor-lines to-right">
    <div class="decor-lines__mask">

      <?php if ( !empty ($contacts_us_img_for_mask = carbon_get_post_meta($post->ID, 'contacts_us_img_for_mask') ) ) : ?>
      <div style="background-image: url('<?php echo wp_get_attachment_image_url(($contacts_us_img_for_mask), 'full'); ?>" class="decor-lines__image">
      </div>
      <?php else: ?>
      <div style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/contacts-us-5-s.jpg')" class="decor-lines__image">
      </div>
      <?php endif; ?>
      
    </div>
  </div><!-- decor-lines -->
  <div class="contacts-us__in container">
    <div class="logo-icon">
      <span class="svg-icon svg-icon--logo-icon" aria-hidden="true">
        <svg class="svg-icon__link">
          <use xlink:href="#logo-icon"></use>
        </svg>
      </span>
    </div><!-- logo-icon -->
    <div class="contacts-us__content">
      <div class="contacts-us__sm-text text-splitter">
        <?php echo carbon_get_post_meta($post->ID, 'contacts_us_text_title'); ?>
      </div>
      <h2 class="contacts-us__title h2 text-splitter">
        <?php echo carbon_get_post_meta($post->ID, 'contacts_us_title'); ?>
      </h2>
      <div class="contacts-us__text text-splitter">
        <?php echo carbon_get_post_meta($post->ID, 'contacts_us_desc'); ?>
      </div>
      <div class="contacts-us__actions">
        <a href="#form" class="js-modal-trigger site-button">
          Send request
          <span class="svg-icon svg-icon--arr-r3" aria-hidden="true">
            <svg class="svg-icon__link">
              <use xlink:href="#arr-r3"></use>
            </svg>
          </span>
        </a>

        <?php if ( !empty ($socials = get_carbon_translated('theme_socials') ) ) : ?>
        <div class="socials">
          <div class="socials__items">

            <?php foreach ($socials as $item): ?>
            <a href="<?php echo $item['link']; ?>" aria-label="<?php echo $item['title']; ?>" class="socials__item">
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