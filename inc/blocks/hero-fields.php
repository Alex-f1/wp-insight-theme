<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

//Поля для блока - "hero"
Container::make( 'post_meta', __( 'Первый экран') )
  ->where('post_type', '=', 'page')
  ->where('post_template', '=', 'front-page.php')
  ->add_fields(array(
    Field::make('image', 'hero_main_img', __('Основное фоновое изображение'))->set_width(33),
    Field::make('image', 'hero_img_for_mask', __('Декоративное изображение в виде линий'))->set_width(33),
    Field::make('file', 'hero_video', __('Фоновое видео'))->set_value_type('video')->set_width(33)->help_text('Если добавлены сразу "Видео" и "Изображение", то у видео будет приоритет. Если ничего не добавлено, то будет отображаться основное фоновое изображение'),
    Field::make('text', 'hero_title', __('Заголовок')),
    Field::make('textarea', 'hero_text', __('Текст')),
));

