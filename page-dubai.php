<?php
/*
  Template Name: Дубай
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
// Блок "Новости - news"
echo get_template_part('template-parts/news-block');
?>

<div class="widgets container">
  <div class="widgets__col swiper-parent">
    <div class="widgets__title h2 text-splitter">
      <?php
        $current_lang = pll_current_language();

        if ($current_lang === 'en'):
          echo 'Currency rate';

        elseif ($current_lang === 'ru'):
          echo 'Валютный курс';

        endif;
      ?>
    </div>
    <div class="widgets__slider">
      <div class="widgets__items-wrapper js-widgets-slider swiper">
        <div class="widgets__items swiper-wrapper">
          <div class="widgets__item swiper-slide">
            <div class="widgets__item-in">
              <div class="widgets__item-head">USD / AED</div>
              <div class="widgets__item-value">3.67</div>
              <div class="widgets__item-comparison">1 USD = <span class="js-val">3.67</span>AED</div>
            </div>
          </div>
          <div class="widgets__item swiper-slide">
            <div class="widgets__item-in">
              <div class="widgets__item-head">EUR / AED</div>
              <div class="widgets__item-value">3.92</div>
              <div class="widgets__item-comparison">1 USD = <span class="js-val">3.67</span>AED</div>
            </div>
          </div>
          <div class="widgets__item swiper-slide">
            <div class="widgets__item-in">
              <div class="widgets__item-head">UAN / AED</div>
              <div class="widgets__item-value">23.70</div>
              <div class="widgets__item-comparison">1 USD = <span class="js-val">3.67</span>AED</div>
            </div>
          </div>
          <div class="widgets__item swiper-slide">
            <div class="widgets__item-in">
              <div class="widgets__item-head">BTC / USD</div>
              <div class="widgets__item-value">26,252</div>
              <div class="widgets__item-comparison">1 USD = <span class="js-val">3.67</span>AED</div>
            </div>
          </div>
          <div class="widgets__item swiper-slide">
            <div class="widgets__item-in">
              <div class="widgets__item-head">ETH / USD</div>
              <div class="widgets__item-value">22,820</div>
              <div class="widgets__item-comparison">1 USD = <span class="js-val">3.67</span>AED</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="swiper-scrollbar"></div>
  </div>
  <div class="widgets__col widgets__col--weather">
    <div class="widgets__title h2 text-splitter">
      <?php
        $current_lang = pll_current_language();

        if ($current_lang === 'en'):
          echo 'Weather';

        elseif ($current_lang === 'ru'):
          echo 'Погода';

        endif;
      ?>
    </div>
    <div class="widgets__items">
      <div class="widgets__item js-weather-item" data-city="Dubai">
        <div class="widgets__item-in">
          <div class="widgets__item-icon"></div>
          <div class="widgets__item-head">Dubai</div>
          <div class="widgets__item-value"><span class="js-temp">32</span>°</div>
        </div>
      </div>
      <div class="widgets__item js-weather-item" data-city="Abu Dhabi">
        <div class="widgets__item-in">
          <div class="widgets__item-icon"></div>
          <div class="widgets__item-head">ABU DHABI</div>
          <div class="widgets__item-value"><span class="js-temp">29</span>°</div>
        </div>
      </div>
    </div>
  </div>
</div><!-- widgets -->

<?php
  // Блок "Поп-ап форма - b-modal"
  echo get_template_part('template-parts/b-modal-block');
?>

<?php get_footer(); ?>