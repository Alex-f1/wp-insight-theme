<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

$elements_labels = array(
  'plural_name' => 'Элементы', //entries
  'singular_name' => 'Элемент', //entry
);

//Поля для блока - "Контакты"
Container::make( 'post_meta', __( 'Контактные данные') )
  ->where('post_type', '=', 'page')
  ->where('post_template', '=', 'page-contacts.php')
  ->add_tab( __('Контакты'), array(
    Field::make('text', 'contacts_email_text', __('Текст у e-mail'))->set_width(50),
    Field::make('text', 'contacts_email', __('E-mail'))->set_width(50),
    Field::make('text', 'contacts_phone_text', __('Текст у телефона'))->set_width(50),
    Field::make('text', 'contacts_phone', __('Телефон'))->set_width(50),
  ))
  ->add_tab( __('Локация'), array(
    Field::make('text', 'contacts_map_text', __('Текст у карты'))->set_width(30),
    Field::make('text', 'contacts_address', __('Адрес'))->set_width(50),
    Field::make('text', 'contacts_schedule', __('Время работы'))->set_width(20),
    Field::make('text', 'contacts_coords', 'Координаты')->help_text("Пример координат: 52.858344160406, -3.0526742311971726"),
  ))
  ->add_tab( __('Социальные сети'), array(
    Field::make('text', 'contacts_socials_title', __('Заголовок социальных сетей'))->set_width(30),
    Field::make('text', 'contacts_socials_text', __('Текст социальных сетей'))->set_width(30),
    Field::make('complex', 'contacts_socials', __('Список'))
    ->setup_labels($elements_labels)
    ->set_layout('tabbed-horizontal')
    ->add_fields(array(
      Field::make('image', 'icon', __('Иконка'))->set_width(20),
      Field::make('text', 'title', __('Название'))->set_width(40),
      Field::make('text', 'link', __('Ссылка'))->set_width(40)
    ))
    ->set_collapsed(true)->set_header_template('<%- title %>')
    ->help_text("Список соцсетей можно оставить пустым. По умолчанию они загрузятся из \"Настроек сайта\""),
  ));

