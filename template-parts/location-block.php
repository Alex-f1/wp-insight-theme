<?php 

  $location = get_posts(array( 
    'post_type' => 'location', 
    'post_parent' => $post->ID, 
    'posts_per_page' => -1, 
    'orderby' => 'post_title', 
    'order' => 'ASC'
  ));

?>

<?php if ( $location ): ?>
<div class="all-countries type-2">
  <div class="countries-list-wrapper type-2 swiper-parent">
    <div class="countries-list-wrapper__header container">
      <h2 class="countries-list-wrapper__title h2 text-splitter">Popular Destinations</h2>
      <div class="countries-list-wrapper__undertitle">most popular</div>
    </div>
    <div class="countries-list type-3">
      <div class="countries-list__items js-countries3 swiper">
        <div class="countries-list__items-in swiper-wrapper">

          <?php

            foreach( $location as $post ){
              setup_postdata( $post );
    
          ?>
          <div class="countries-list__item swiper-slide">
            <a class="countries-list__item-in" href="<?php the_permalink(); ?>">
              <span class="countries-list__item-img">
                <img src="<?php the_post_thumbnail_url(); ?>" alt loading="lazy" width="277" height="384">
              </span>
              <span class="countries-list__item-name">
                <?php the_title(); ?>
              </span>
            </a>
          </div>
          <?php
            }

            wp_reset_postdata();

          ?>

        </div>
      </div>
    </div><!-- countries-list -->
    <div class="countries-list-wrapper__footer container">
      <div class="swiper-scrollbar"></div>
    </div>
  </div>
  <!--countries-list-wrapper-->
  <div class="all-countries__top container">
    <div class="all-countries__image">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/countries-bg2.png" alt loading="lazy" width="1920" height="1863" sizes="100vw" srcset="
            <?php echo get_template_directory_uri(); ?>/assets/img/countries-bg2-s.png 575w,
            <?php echo get_template_directory_uri(); ?>/assets/img/countries-bg2-s.png 992w,
            <?php echo get_template_directory_uri(); ?>/assets/img/countries-bg2.png 1920w">
    </div>
  </div>
</div><!-- all-countries -->
<?php endif; ?>