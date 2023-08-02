<?php
/**
 * Архив стран
*/

?>
<?php get_header(); ?>

<?php 
  
  $this_page_id = 121;
  $this_post = get_post($this_page_id);
  $the_content = apply_filters('the_content', $this_post->post_content);

?>

<?php
  echo $the_content;
?>

<?php
  // Блок "Страны - популярные - countries"
  $popular_countries_id = 17;

  $popular_countries = get_posts([
    'post_type' => 'countries',
    'category_name' => 'popular',
    'category' => $popular_countries_id,
    'posts_per_page' => -1,
    'orderby' => 'name',
    'order' => 'ASC',
  ]);

  $popular_countries_i = 0;
  $popular_countries_column = array();
  $popular_countries_column[1] = 
  $popular_countries_column[2] = 
  $popular_countries_column[3] = 
  $popular_countries_column[4] = '';

?>

<div class="container">
  <div class="desc-block">
    Travel around the world with luxury level of the service
  </div><!-- desc-block -->
  <div class="most-popular js-parent">
    <h2 class="most-popular__title">most popular</h2>
    <div class="most-popular__items js-hidden-items">
      <?php
        foreach( $popular_countries as $post ) {
          setup_postdata( $post );
          $popular_countries_i++;

          $popular_countries_column[$popular_countries_i] .= 
          '<div class="most-popular__item"><a href=' . get_the_permalink() . '>' . get_the_title() . '</a></div>';

          $popular_countries_i = ($popular_countries_i == 4) ? 0 : $popular_countries_i;

      ?>

      <?php 
        }

        wp_reset_postdata(); 
      
      ?>

      <div class="most-popular__col">
        <?php echo $popular_countries_column[1] ?>
      </div>
      <div class="most-popular__col">
        <?php echo $popular_countries_column[2] ?>
      </div>
      <div class="most-popular__col">
        <?php echo $popular_countries_column[3] ?>
      </div>
      <div class="most-popular__col">
        <?php echo $popular_countries_column[4] ?>
      </div>
    </div>
    <div class="show-more-btn">
      <button class="js-more-btn" data-text="Hide"><span class="jtx">Show all</span>
        <span class="svg-icon svg-icon--arr-d2" aria-hidden="true">
          <svg class="svg-icon__link">
            <use xlink:href="#arr-d2"></use>
          </svg>
        </span>
      </button>
    </div><!-- show-more-btn -->
  </div><!-- most-popular -->
</div>

<?php
  // Блок "Страны - countries"
  
  $countries = get_posts([
    'post_type' => 'countries',
    'posts_per_page' => -1,
    'orderby' => 'name',
    'order' => 'ASC',
  ]);

  $all_countries_i = 0;
  $all_countries_column = array();
  $all_countries_column[1] = 
  $all_countries_column[2] = 
  $all_countries_column[3] = 
  $all_countries_column[4] = '';

  $cat_name = '';

?>

<div class="all-countries">
  <div class="all-countries__top container">
    <div class="all-countries__image">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/countries-bg2.png" alt loading="lazy" width="1920" height="1863" sizes="100vw" srcset="
        <?php echo get_template_directory_uri(); ?>/assets/img/countries-bg2-s.png 575w,
        <?php echo get_template_directory_uri(); ?>/assets/img/countries-bg2-s.png 992w,
        <?php echo get_template_directory_uri(); ?>/assets/img/countries-bg2.png 1920w">
    </div>
    <h2 class="all-countries__title h2">All countries</h2>
    <div class="all-countries__list">

      <?php
        foreach( $countries as $post ) {
          setup_postdata( $post );
          $all_countries_i++;

          $all_countries_column[$all_countries_i] .= 
          '<div class="all-countries__item"><a href=' . get_the_permalink() . '>' . get_the_title() . '</a></div>';

          $all_countries_i = ($all_countries_i == 4) ? 0 : $all_countries_i;

      ?>


      <?php 
        }

        wp_reset_postdata(); 
      
      ?>

      <div class="all-countries__col">
        <?php echo $all_countries_column[1] ?>
      </div>
      <div class="all-countries__col">
        <?php echo $all_countries_column[2] ?>
      </div>
      <div class="all-countries__col">
        <?php echo $all_countries_column[3] ?>
      </div>
      <div class="all-countries__col">
        <?php echo $all_countries_column[4] ?>
      </div>
    </div>
  </div>

  <div class="all-countries__middle container">
    <?php
    // Блок "Страны - популярные/дочерние "
    
    $popular_countries_children = get_categories(
      array(
        'child_of' => $popular_countries_id,
        'hide_empty' => 0
      )
    );
    ?>

    <?php 
    // Для заголовка дочерних рубрик
    foreach ($popular_countries_children as $cat) {
      $popular_countries_children_name = $cat->name;
    } 
    wp_reset_postdata(); 
    ?>

    <h2>
      <?php
        $current_lang = pll_current_language();

        if ($current_lang === 'en'):
          echo 'Popular Destinations';

        elseif ($current_lang === 'ru'):
          echo 'Популярные направления';

        endif;
      ?>
      <?php echo $popular_countries_children_name; ?></h2>
    <p>
      <?php
        $current_lang = pll_current_language();

        if ($current_lang === 'en'):
          echo 'Interesting countries in';

        elseif ($current_lang === 'ru'):
          echo 'Интересные страны в';

        endif;
      ?>
      <?php echo $popular_countries_children_name; ?> </p>
  </div>
  <div class="countries-list-wrapper swiper-parent">
    <div class="countries-list type-2">
      <div class="countries-list__items js-countries2 js-autoplay swiper">
        <div class="countries-list__items-in swiper-wrapper">

        <?php if ($popular_countries_children) : ?>
          <?php foreach ($popular_countries_children as $cat) : ?>

            <?php
            
            // Дочерние 
            $popular_countries_child = get_posts(
              array(
                'category' => $cat->cat_ID,
                'post_type' => 'countries',
                'posts_per_page' => -1,
                'orderby' => 'post_date',
                'order' => 'DESC',
              ));
            ?> 
            <?php 
              
              foreach ($popular_countries_child as $post) : 
                setup_postdata($post);
          
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

            <?php endforeach; ?>
          <?php endforeach; wp_reset_postdata(); ?>
        <?php endif; ?>
        </div>
      </div>
    </div><!-- countries-list -->
    <div class="countries-list-wrapper__footer container">
      <div class="swiper-scrollbar"></div>
    </div>
  </div>
  <!--countries-list-wrapper-->
</div><!-- all-countries -->

<?php get_footer(); ?>