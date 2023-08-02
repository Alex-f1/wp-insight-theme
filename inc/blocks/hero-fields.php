<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

//Поля для блока - "hero"
Container::make( 'post_meta', __( 'Первый экран') )
  ->where('post_type', '=', 'page')
  ->where('post_template', '=', 'front-page.php')
  ->add_tab( __('Фоновое изображение'), array(
    Field::make('image', 'hero_main_img', __('Основное фоновое изображение'))->set_width(50),
    Field::make('image', 'hero_img_for_mask', __('Декоративное изображение в виде линий'))->set_width(50),
))
->add_tab( __('Индивидуальные путешествия'), array(
  Field::make('text', 'hero_individual_title', __('Заголовок')),
  Field::make('text', 'hero_individual_text', __('Текст')),
  Field::make('text', 'hero_individual_link', __('Ссылка'))->help_text('Укажите ссылку на пост Услуг'),
  Field::make('file', 'hero_individual_video', __('Фоновое видео'))->set_value_type('video')->set_width(50),
  Field::make('file', 'hero_individual_img', __('Фоновое изображение'))->set_value_type('video')->set_width(50)
    ->help_text('Если добавлены сразу "Видео" и "Изображение", то у видео будет приоритет. Если ничего не добавлено, то будет отображаться основное фоновое изображение'),
))
->add_tab( __('Корпоративные путешествия'), array(
  Field::make('text', 'hero_business_title', __('Заголовок')),
  Field::make('text', 'hero_business_text', __('Текст')),
  Field::make('text', 'hero_business_link', __('Ссылка'))->help_text('Укажите ссылку на пост Услуг'),
  Field::make('file', 'hero_business_video', __('Фоновое видео'))->set_value_type('video')->set_width(50),
  Field::make('file', 'hero_business_img', __('Фоновое изображение'))->set_value_type('video')->set_width(50)
    ->help_text('Если добавлены сразу "Видео" и "Изображение", то у видео будет приоритет. Если ничего не добавлено, то будет отображаться основное фоновое изображение'),
));

