<?php get_header(); ?>

<?php the_content(); ?>

<?php
  // Блок "Поп-ап форма - b-modal"
  echo get_template_part('template-parts/b-modal-block');
?>

<?php
  // Блок "Банер (Общий) - contacts-us(common)"
  echo get_template_part('template-parts/contacts-us_common-block');
?>

<?php get_footer(); ?>