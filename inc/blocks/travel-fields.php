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
    Field::make('text', 'travel_bottom_title', __('Нижний заголовок')),
    Field::make('text', 'travel_bottom_desc', __('Нижние описание')),
));

