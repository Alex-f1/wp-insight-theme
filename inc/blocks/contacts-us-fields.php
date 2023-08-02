<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

//Поля для блока - "contacts-us"
Container::make( 'post_meta', __( 'Банер') )
  ->where('post_type', '=', 'page')
  ->where('post_template', '=', 'page-about.php')
  // ->or_where('post_template', '=', 'page-about.php')
  ->add_fields( array(
    Field::make('image', 'contacts_us_main_img', __('Фоновое изображение'))->set_width(50),
    Field::make('image', 'contacts_us_img_for_mask', __('Декоративное изображение в виде линий'))->set_width(50),
    Field::make('text', 'contacts_us_text_title', 'Текст над заголовком'),
    Field::make('text', 'contacts_us_title', 'Заголовок'),
    Field::make('text', 'contacts_us_desc', 'Описание'),
));

