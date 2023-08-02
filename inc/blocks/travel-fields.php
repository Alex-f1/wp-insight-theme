<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

$elements_labels = array(
  'plural_name' => 'Элементы', //entries
  'singular_name' => 'Элемент', //entry
);

//Поля для блока - "travel"
Container::make('post_meta', __( 'Информация о путешествии') )
  ->where('post_type', '=', 'page')
  ->where('post_template', '=', 'front-page.php')
  ->add_fields( array(
    Field::make('text', 'travel_title', __('Заголовок')),
    Field::make('text', 'travel_desc', __('Описание')),
    Field::make('complex', 'travel_items', __('Список'))
    ->setup_labels($elements_labels)
    ->set_layout('tabbed-horizontal')
    ->add_fields(array(
      Field::make('image', 'img', __('Изображение'))->set_width(20),
      Field::make('text', 'title_text', __('Текст над заголовком'))->set_width(40),
      Field::make('text', 'title', __('Заголовок'))->set_width(40),
    ))->set_collapsed(true)->set_header_template('<%- title %>'),
    Field::make('text', 'travel_bottom_title', __('Нижний заголовок')),
    Field::make('text', 'travel_bottom_desc', __('Нижние описание')),
));

