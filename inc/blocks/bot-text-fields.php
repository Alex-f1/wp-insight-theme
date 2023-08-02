<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

//Поля для блока - "bot-text"
Container::make( 'post_meta', __( 'Текстовая информация под Банером') )
  ->where('post_type', '=', 'page')
  ->where('post_template', '=', 'page-about.php')
  ->add_fields( array(
    Field::make('textarea', 'bot_text_main', __('Основной текст')),
    Field::make('textarea', 'bot_text_extra', __('Дополнительный текст')),
    Field::make('text', 'bot_text_name', __('Название')),
));

