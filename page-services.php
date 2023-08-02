<?php
/*
  Template Name: Услуги
*/
?>

<?php get_header(); ?>

<?php
  // Блок "Первый экран (внутрення страница) - hero-in"
  echo get_template_part('template-parts/hero-in-block');
?>

<?php 
  // Основной контент
  the_content(); 
?>

<?php
  // Блок "Поп-ап форма - b-modal"
  echo get_template_part('template-parts/b-modal-block');
?>

<?php get_footer(); ?>