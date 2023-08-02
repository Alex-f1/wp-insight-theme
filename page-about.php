<?php
/*
  Template Name: О нас
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
  // Блок "Преимущества - advantages"
  echo get_template_part('template-parts/advantages-block');
?>

<?php
  // Блок "Банер - contacts-us"
  echo get_template_part('template-parts/contacts-us-block');
?>

<?php
  // Блок "Текст под Банером - bot-text"
  echo get_template_part('template-parts/bot-text-block');
?>

<?php
  // Блок "Поп-ап форма - b-modal"
  echo get_template_part('template-parts/b-modal-block');
?>

<?php get_footer(); ?>