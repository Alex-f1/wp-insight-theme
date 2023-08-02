<?php

function crb_attach_blocks() {

  // Блок "hero"
  require get_theme_file_path() . '/inc/blocks/hero-fields.php';

  // Блок "travel"
  require get_theme_file_path() . '/inc/blocks/travel-fields.php';

  // Блок "hero-in"
  require get_theme_file_path() . '/inc/blocks/hero-in-fields.php';

  // Блок "contacts-content"
  require get_theme_file_path() . '/inc/blocks/contacts-content-fields.php';

  // Блок "/contacts-us"
  require get_theme_file_path() . '/inc/blocks/contacts-us-fields.php';

  // Блок "bot-text"
  require get_theme_file_path() . '/inc/blocks/bot-text-fields.php';

  // Блок "services"
  require get_theme_file_path() . '/inc/blocks/services-fields.php';

  // Блок(gutenberg) "about-us"
  require get_theme_file_path() . '/inc/blocks/about-us-gutenberg.php';

  // Блок(gutenberg) "countries"
  require get_theme_file_path() . '/inc/blocks/countries-gutenberg.php';

  // Блок(gutenberg) "country"
  require get_theme_file_path() . '/inc/blocks/country-gutenberg.php';

  // Блок(gutenberg) "location"
  require get_theme_file_path() . '/inc/blocks/location-gutenberg.php';

  // Блок(gutenberg) "services"
  require get_theme_file_path() . '/inc/blocks/services-gutenberg.php';
  
  // Блок(gutenberg) "dubai"
  require get_theme_file_path() . '/inc/blocks/dubai-gutenberg.php';

  // Блок(gutenberg) "dubai"
  require get_theme_file_path() . '/inc/blocks/services-page-gutenberg.php';

}

add_action('carbon_fields_register_fields', 'crb_attach_blocks');