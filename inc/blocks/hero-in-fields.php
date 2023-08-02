<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

//Поля для блока - "hero-in"
Container::make( 'post_meta', __( 'Первый экран') )
  ->where('post_type', '=', 'page')
  ->where('post_template', '=', 'page-contacts.php')
  ->or_where('post_template', '=', 'page-about.php')
  ->or_where('post_template', '=', 'page-dubai.php')
  ->or_where('post_template', '=', 'page-services.php')
  ->add_fields( array(
    Field::make('image', 'hero_in_main_img', __('Фоновое изображение')),
    Field::make('text', 'hero_in_text_title', 'Текст над заголовком'),
    Field::make('text', 'hero_in_title', 'Заголовок'),
));

