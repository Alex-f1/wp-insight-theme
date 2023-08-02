<?php
/*
Template Name: Главная
*/
?>

<?php get_header(); ?>

<?php 
  // Блок "Первый экран - hero"
  echo get_template_part('template-parts/hero-block'); 
?>

<?php 
  // Блок "Услуги - services"
  echo get_template_part('template-parts/services-block'); 
?>

<?php
/* $categories = get_terms([
  'taxonomy' => 'service',
  'hide_empty' => false,
  'child_of' => 0,
  'orderby' => 'name',
  'order' => 'ASC'
]);

foreach ($categories as $category) {
  echo '<p>Category: <a href="' . get_term_link($category->term_id, $category->taxonomy) . '" title="' . sprintf(__("View all posts in %s"), $category->name) . '" ' . '>' . $category->name . '</a> </p> ';
  echo '<p> Description:' . $category->description . '</p>';
  echo '<p> Post Count: ' . (int) $category->count . '</p>';
  } */
?>

<?php
  // Блок "Страны - countries"
  
  $countries = get_posts([
    'post_type' => 'countries',
    'posts_per_page' => -1,
    'order' => 'ASC',
  ]);

  $countries_count_publish = wp_count_posts("countries")->publish;
?>

<?php if ( $countries ): ?>
<section class="countries container">
  <div class="countries__in">
    <div class="countries__image">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/countries-bg.png" alt loading="lazy" width="1802" height="1462" sizes="100vw" srcset="
            <?php echo get_template_directory_uri(); ?>/assets/img/countries-bg-s.png 640w,
            <?php echo get_template_directory_uri(); ?>/assets/img/countries-bg.png 1920w">
    </div>
    <div class="countries__header">
      <div class="countries__overtitle text-splitter">
        <?php echo get_carbon_translated('other_countries_text_title') ?>
      </div>
      <h2 class="countries__title decor-title text-splitter">
        <?php echo get_carbon_translated('other_countries_title') ?>
      </h2>
      <div class="countries__undertitle text-splitter">
        <?php echo get_carbon_translated('other_countries_desc') ?>
      </div>
    </div>
    <div class="countries-list">
      <div class="countries-list__items js-countries js-autoplay swiper">
        <div class="countries-list__items-in swiper-wrapper">
        
          <?php

            foreach( $countries as $post ){
              setup_postdata( $post );
    
          ?>
          <div class="countries-list__item swiper-slide">
            <a class="countries-list__item-in" href="<?php the_permalink(); ?>">
              <span class="countries-list__item-img">
                <img src="<?php the_post_thumbnail_url(); ?>" alt loading="lazy" width="277" height="384">
              </span>
              <span class="countries-list__item-name"><?php the_title(); ?></span>
              <span class="countries-list__item-text"><?php the_excerpt(); ?></span>
            </a>
          </div>
          <?php
            }

            wp_reset_postdata();

          ?>

        </div>
      </div>
    </div><!-- countries-list -->

    <?php if ($countries_count_publish > 4): ?>
    <div class="countries__footer">
      <a class="countries__more" href="/countries">
        All countries 
        <span class="svg-icon svg-icon--arr-r2" aria-hidden="true">
          <svg class="svg-icon__link">
            <use xlink:href="#arr-r2"></use>
          </svg>
        </span>
      </a>
    </div>
    <?php endif; ?>

  </div>
</section><!-- countries -->
<?php endif; ?>

<?php 
  // Блок "Информация о путешествии - travel"
  echo get_template_part('template-parts/travel-block'); 
?>

<?php
  // Блок "Развлечения - entertainment"
  echo get_template_part('template-parts/entertainment-block');
?>

<div class="services2">
  <div class="services2__image">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/servises2-bg.jpg" alt loading="lazy" width="1865" height="1684" sizes="100vw" srcset="
        <?php echo get_template_directory_uri(); ?>/assets/img/servises2-bg-s.jpg 575w,
        <?php echo get_template_directory_uri(); ?>/assets/img/servises2-bg.jpg 1920w">
  </div>
  <div class="services2__shadows">
    <div class="decor-lines to-right">
      <div class="decor-lines__mask">
        <div class="decor-lines__image" style="background-image: url(img/servises2-bg-s.jpg);"></div>
      </div>
    </div><!-- decor-lines -->
    <div class="shadow"></div>
  </div>
  <div class="services2__in container">
    <div class="services2__header">
      <div class="services2__title text-splitter">
        <?php echo get_carbon_translated('other_services_dubai_title') ?>
      </div>
      <div class="services2__undertitle text-splitter">
        <?php echo get_carbon_translated('other_services_dubai_desc') ?>
      </div>
    </div>
    <div class="services2__decor-text">
      <div class="logo-icon">
        <span class="svg-icon svg-icon--logo-icon" aria-hidden="true">
          <svg class="svg-icon__link">
            <use xlink:href="#logo-icon"></use>
          </svg>
        </span>
      </div><!-- logo-icon -->
      <div class="text-splitter">
        <?php
          $current_lang = pll_current_language();

          if ($current_lang === 'en'):
            echo 'flight to emirates with';

          elseif ($current_lang === 'ru'):
            echo 'перелет в эмираты с';

          endif;
        ?>
      </div>
      <span class="text-splitter">
        <?php
          $current_lang = pll_current_language();

          if ($current_lang === 'en'):
            echo 'premium service';

          elseif ($current_lang === 'ru'):
            echo 'премиум-сервис';

          endif;
        ?>
      </span>
    </div>
    <div class="services2__items">
      <?php
        $services_dubai = get_terms([
          'taxonomy' => 'dubai',
          'hide_empty' => false,
          'child_of' => 0,
          'orderby' => 'name',
          'order' => 'ASC'
        ]);

        foreach( $services_dubai as $item ) {

      ?>
      <a class="services2__item" href="<?php echo get_term_link($item->term_id, $item->taxonomy); ?>">
        <span class="services2__item-title text-splitter">
          <?php echo $item->name ?>
        </span>
        <span class="services2__item-image">
          <img src="<?php echo wp_get_attachment_image_url(carbon_get_term_meta($item->term_id, 'service_img'), 'full'); ?>" alt width="713" height="250" loading="lazy">
        </span>
        <span class="services2__item-icon">
          <span class="svg-icon svg-icon--arr-r2" aria-hidden="true">
            <svg class="svg-icon__link">
              <use xlink:href="#arr-r2"></use>
            </svg>
          </span>
        </span>
      </a>
      <?php
        }

        wp_reset_postdata();

      ?>
      
    </div>
    <div class="services2__more">
      <a href="/dubai">
        <?php
          $current_lang = pll_current_language();

          if ($current_lang === 'en'):
            echo 'TRAVEL TO UAE';

          elseif ($current_lang === 'ru'):
            echo 'ПУТЕШЕСТВИЕ В ОАЭ';

          endif;
        ?>
        <span class="svg-icon svg-icon--arr-r2" aria-hidden="true">
          <svg class="svg-icon__link">
            <use xlink:href="#arr-r2"></use>
          </svg>
        </span>
      </a>
    </div>
  </div>
</div><!-- services2 -->

<?php
  // Блок "Преимущества - advantages"
  echo get_template_part('template-parts/advantages-block');
?>

<?php get_footer(); ?>