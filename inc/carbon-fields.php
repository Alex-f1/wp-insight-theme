<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Кастомные стили для админ-панели WordPress
 */
function wp_admin_custom_scripts() {
  echo '
	<style>
    :root {
      --cf-heads-radius: 8px;
    }
    .cf-field.cf-separator h3 {
      margin: 0;
    }
    .cf-complex--grid .cf-complex__group {
      margin-bottom: 6px;
    }
    .cf-complex__group:hover {
      box-shadow: 0 0 0 3px #00a0d0;
    }
    .cf-complex__group-head {
      border-bottom-color: rgba(0,0,0,0);
    }
    .cf-complex__group--collapsed .cf-complex__group-head {
      border: 1px solid #e2e4e7;
    }
    .cf-complex__group .cf-complex__group-body .cf-complex__group--collapsed .cf-complex__group-head,
    .cf-complex__group .cf-complex__group.cf-complex__group--collapsed {
      border-radius: var(--cf-heads-radius);
    }
    .cf-complex__group .cf-complex__group-body .cf-complex__group-head,
    .cf-complex__group .cf-complex__group {
      border-radius: var(--cf-heads-radius) var(--cf-heads-radius) 0 0;
    }
    .cf-complex__group .cf-complex__group-body .cf-complex__group-head,
    .cf-complex__group .cf-complex__group-body .cf-complex__group-body {
      background-color: #F5F5F5;
    }

    .cf-container .dashicons,
    .cf-container .dashicons-before:before {
      width: 20px;
      height: 20px;
      font-size: 20px;
    }

    .cf-container .cf-complex__group-action:hover .dashicons-before:before {
      color: #23282d;
    }
	</style>
	';
}
add_action('admin_head', 'wp_admin_custom_scripts');

function crb_attach_theme_options() {
  $elements_labels = array(
    'plural_name' => 'Элементы', //entries
    'singular_name' => 'Элемент', //entry
  );

  $theme_options = Container::make(
    'theme_options',
    'main_options',
    'Настройки сайта'
  )
  ->add_tab( __('Социальные сети'), array(
    Field::make('complex', 'theme_socials', __('Список'))
    ->setup_labels($elements_labels)
    ->set_layout('tabbed-horizontal')
    ->add_fields(array(
      Field::make('image', 'icon', __('Иконка'))->set_width(20),
      Field::make('text', 'title', __('Название'))->set_width(40),
      Field::make('text', 'link', __('Ссылка'))->set_width(40)
    ))->set_collapsed( true )->set_header_template('<%- title %>'),
  ))
  ->add_tab( __('Контакты'), array(
    Field::make('text', 'theme_phone', __('Телефон'))->set_width(50),
    Field::make('text', 'theme_copyright', __('Копирайт')),
    Field::make('separator', 'theme_separator_international_calls', __('международные телефоны')),
    Field::make('text', 'theme_phone_international', __('международный телефон')),
    Field::make('text', 'theme_phone_international_office', __('международный телефон (Офис)'))->set_width(50),
    Field::make('text', 'theme_phone_international_office_text', __('Офис'))->set_width(50),
  ))
  ->add_tab( __('Подвал'), array(
    Field::make('image', 'theme_logo_footer', __('Лого')),
    Field::make('separator', 'theme_separator_socials_footer', __('Социальные сети')),
    Field::make('complex', 'theme_socials_footer', __('Список'))
    ->setup_labels($elements_labels)
    ->set_layout('tabbed-horizontal')
    ->add_fields(array(
      Field::make('image', 'icon', __('Иконка'))->set_width(20),
      Field::make('text', 'title', __('Название'))->set_width(40),
      Field::make('text', 'link', __('Ссылка'))->set_width(40)
    ))->set_collapsed(true)->set_header_template('<%- title %>'),
  ))
  ->add_tab( __('Преимущества'), array(
    Field::make('text', 'advantages_title', __('Заголовок')),
    Field::make('text', 'advantages_desc', __('Описание')),
    Field::make('complex', 'advantages_items', __('Список'))
    ->setup_labels( $elements_labels )
    ->set_layout( 'tabbed-horizontal' )
    ->add_fields(array(
      Field::make('image', 'icon', __('Иконка'))->set_width(20),
      Field::make('text', 'name', __('Название'))->set_width(40),
      Field::make('text', 'text', __('Текст'))->set_width(40),
    ))->set_collapsed(true)->set_header_template('<%- name %>'),
  ))->add_tab( __('Форма обратной связи'), array(
    Field::make('text', 'feedback_form', __('Шорткод формы')),
  ))->add_tab(__('Банер (Общий)'), array(
    Field::make('image', 'contacts_us_common_main_img', __('Фоновое изображение'))->set_width(50),
    Field::make('text', 'contacts_us_common_text_title', __('Текст над заголовком')),
    Field::make('text', 'contacts_us_common_title', __('Заголовок')),
    Field::make('text', 'contacts_us_common_desc', __('Описание')),
  ))->add_tab(__('Прочее'), array(
    // Для блока Услуг (Главная)
    Field::make('separator', 'other_services_separator', __('Для блока Услуг (Главная)')),
    Field::make('text', 'other_services_text_title', __('Текст над заголовком')),
    Field::make('text', 'other_services_title', __('Заголовок')),
    Field::make('text', 'other_services_airport_title', __('Заголовок (Аэропорт)')),
    Field::make('text', 'other_services_airport_desc', __('Описание (Аэропорт)')),
    // Для блока Стран (Главная)
    Field::make('separator', 'other_countries_separator', __('Для блока Стран (Главная)')),
    Field::make('text', 'other_countries_text_title', __('Текст над заголовком')),
    Field::make('text', 'other_countries_title', __('Заголовок')),
    Field::make('text', 'other_countries_desc', __('Описание')),
    // Для блока услуги - Развлечения (Главная)
    Field::make('separator', 'other_services_entertainment_separator', __('Для блока услуг - Развлечения (Главная)')),
    Field::make('text', 'other_services_entertainment_title', __('Заголовок')),
    Field::make('text', 'other_services_entertainment_desc', __('Описание')),
    // Для блока услуг - Дубай (Главная)
    Field::make('separator', 'other_services_dubai_separator', __('Для блока услуг - Дубай (Главная)')),
    Field::make('text', 'other_services_dubai_title', __('Заголовок')),
    Field::make('text', 'other_services_dubai_desc', __('Описание')),
  ));
  $theme_options_ru = Container::make(
    'theme_options',
    'main_options',
    'Настройки сайта Ru'
  )
  ->add_tab( __('Социальные сети'), array(
    Field::make('complex', 'theme_socials_ru', __('Список'))
    ->setup_labels($elements_labels)
    ->set_layout('tabbed-horizontal')
    ->add_fields(array(
      Field::make('image', 'icon', __('Иконка'))->set_width(20),
      Field::make('text', 'title', __('Название'))->set_width(40),
      Field::make('text', 'link', __('Ссылка'))->set_width(40)
    ))->set_collapsed( true )->set_header_template('<%- title %>'),
  ))
  ->add_tab( __('Контакты'), array(
    Field::make('text', 'theme_phone_ru', __('Телефон'))->set_width(50),
    Field::make('text', 'theme_copyright_ru', __('Копирайт')),
    Field::make('separator', 'theme_separator_international_calls_ru', __('международные телефоны')),
    Field::make('text', 'theme_phone_international_ru', __('международный телефон')),
    Field::make('text', 'theme_phone_international_office_ru', __('международный телефон (Офис)'))->set_width(50),
    Field::make('text', 'theme_phone_international_office_text_ru', __('Офис'))->set_width(50),
  ))
  ->add_tab( __('Подвал'), array(
    Field::make('image', 'theme_logo_footer_ru', __('Лого')),
    Field::make('separator', 'theme_separator_socials_footer_ru', __('Социальные сети')),
    Field::make('complex', 'theme_socials_footer_ru', __('Список'))
    ->setup_labels($elements_labels)
    ->set_layout('tabbed-horizontal')
    ->add_fields(array(
      Field::make('image', 'icon', __('Иконка'))->set_width(20),
      Field::make('text', 'title', __('Название'))->set_width(40),
      Field::make('text', 'link', __('Ссылка'))->set_width(40)
    ))->set_collapsed(true)->set_header_template('<%- title %>'),
  ))
  ->add_tab( __('Преимущества'), array(
    Field::make('text', 'advantages_title_ru', __('Заголовок')),
    Field::make('text', 'advantages_desc_ru', __('Описание')),
    Field::make('complex', 'advantages_items_ru', __('Список'))
    ->setup_labels( $elements_labels )
    ->set_layout( 'tabbed-horizontal' )
    ->add_fields(array(
      Field::make('image', 'icon', __('Иконка'))->set_width(20),
      Field::make('text', 'name', __('Название'))->set_width(40),
      Field::make('text', 'text', __('Текст'))->set_width(40),
    ))->set_collapsed(true)->set_header_template('<%- name %>'),
  ))->add_tab( __('Форма обратной связи'), array(
    Field::make('text', 'feedback_form_ru', __('Шорткод формы')),
  ))->add_tab(__('Банер (Общий)'), array(
    Field::make('image', 'contacts_us_common_main_img_ru', __('Фоновое изображение'))->set_width(50),
    Field::make('text', 'contacts_us_common_text_title_ru', __('Текст над заголовком')),
    Field::make('text', 'contacts_us_common_title_ru', __('Заголовок')),
    Field::make('text', 'contacts_us_common_desc_ru', __('Описание')),
  ))->add_tab(__('Прочее'), array(
    // Для блока Услуг (Главная)
    Field::make('separator', 'other_services_separator_ru', __('Для блока Услуг (Главная)')),
    Field::make('text', 'other_services_text_title_ru', __('Текст над заголовком')),
    Field::make('text', 'other_services_title_ru', __('Заголовок')),
    Field::make('text', 'other_services_airport_title_ru', __('Заголовок (Аэропорт)')),
    Field::make('text', 'other_services_airport_desc_ru', __('Описание (Аэропорт)')),
    // Для блока Стран (Главная)
    Field::make('separator', 'other_countries_separator_ru', __('Для блока Стран (Главная)')),
    Field::make('text', 'other_countries_text_title_ru', __('Текст над заголовком')),
    Field::make('text', 'other_countries_title_ru', __('Заголовок')),
    Field::make('text', 'other_countries_desc_ru', __('Описание')),
    // Для блока услуги - Представления (Главная)
    Field::make('separator', 'other_services_entertainment_separator_ru', __('Для блока услуг - Представления (Главная)')),
    Field::make('text', 'other_services_entertainment_title_ru', __('Заголовок')),
    Field::make('text', 'other_services_entertainment_desc_ru', __('Описание')),
    // Для блока услуг - Дубай (Главная)
    Field::make('separator', 'other_services_dubai_separator_ru', __('Для блока услуг - Дубай (Главная)')),
    Field::make('text', 'other_services_dubai_title_ru', __('Заголовок')),
    Field::make('text', 'other_services_dubai_desc_ru', __('Описание')),
  ));
  Container::make('term_meta', __('Услуги'))
    ->where('term_taxonomy', '=','service')
    ->or_where('term_taxonomy', '=','dubai')
    ->or_where('term_taxonomy', '=','entertainment')
    ->add_fields(array(
      // Превью для главной
      Field::make('separator', 'service_preview_main_separator', __('Превью для главной')),
      Field::make('image', 'service_preview_main_img', __('Превью изображение')),
      Field::make('text', 'service_preview_main_title', __('Превью заголовок')),
      Field::make('image', 'service_img', __('Общее изображение')),
      // Field::make( 'checkbox', 'crb_category_show', 'Отображать Страну'),
      // Первый экран
      Field::make('separator', 'service_hero_in_separator', __('Первый экран')),
      Field::make('image', 'service_hero_in_main_img', __('Фоновое изображение')),
      Field::make('text', 'service_hero_in_text_title', __('Текст над заголовком')),
      Field::make('text', 'service_hero_in_title', __('Заголовок')),
      // Контент
      Field::make('separator', 'service_content_separator', __('Контент')),
      Field::make('text', 'service_content_moving_text', __('Бегущий текст при прокрутке')),
      Field::make('text', 'service_content_title', __('Заголовок')),
      Field::make('textarea', 'service_content_desc', __('Описание')),
      Field::make('image', 'service_content_img_l', __('Изображение'))->set_width(20),
      Field::make('text', 'service_content_img_name_r', __('Название справа от изо-ния'))->set_width(30),
      Field::make('textarea', 'service_content_img_text_r', __('Текст справа от изо-ния'))->set_width(30),
      Field::make('text', 'service_content_info_title', __('Инфо Заголовок')),
      Field::make('textarea', 'service_content_info_text_l', __('Инфо Текст слева'))->set_width(50),
      Field::make('textarea', 'service_content_info_text_r', __('Инфо Текст справа'))->set_width(50),
      Field::make('textarea', 'service_content_info_text_b', __('Инфо Текст')),
      Field::make('text', 'service_content_img_name_l', __('Название слева от изо-ния'))->set_width(30),
      Field::make('textarea', 'service_content_img_text_l', __('Текст слева от изо-ния'))->set_width(30),
      Field::make('image', 'service_content_img_r', __('Изображение'))->set_width(20),
      // Банер
      Field::make('separator', 'service_banner_separator', __('Банер')),
      Field::make('image', 'service_contacts_us_main_img', __('Фоновое изображение'))->set_width(50),
      Field::make('image', 'service_contacts_us_img_for_mask', __('Декоративное изображение в виде линий'))->set_width(50),
      Field::make('text', 'service_contacts_us_text_title', __('Текст над заголовком')),
      Field::make('text', 'service_contacts_us_title', __('Заголовок')),
      Field::make('text', 'service_contacts_us_desc', __('Описание')),
      // На главную
      Field::make('separator', 'service_show_separator', __('Вывести на Главную')),
      Field::make( 'select', 'service_choice', __( 'Выбор услуг' ) )
        ->add_options( array(
          'service_choice_for_placeholder' => __( 'Не выбрано' ),
          'service_choice_for_placement' => __( 'Для размещения' ),
          'service_choice_for_airports' => __( 'Для аэропорта' ),
          'service_choice_for_rental' => __( 'Для аренды' ),
        ) )->set_help_text( 'Выбирайте нужную услугу для Главной страницы. Распростроняется только для блоков "Расположения", "Аэропорта", "Аренда". В любом другом случае оставьте поле "Не выбрано".' ),
      Field::make( 'checkbox', 'service_show', 'Выводить на Главную'),

    ));
}

add_action('carbon_fields_register_fields', 'crb_attach_theme_options');