<section class="articles swiper-parent">
  <div class="articles__header container">
    <h2 class="articles__title h2 text-splitter">news</h2>
  </div>
  <div class="articles__slider">
    <div class="articles__slider-in">
      <div class="articles__items-wrapper js-articles swiper">
        <div class="articles__items swiper-wrapper">
          
          <?php

            $news = get_posts([
              'post_type' => 'post',
              'posts_per_page' => -1,
              'orderby' => 'date',
              'order' => 'ASC',
            ]);

            foreach( $news as $post ) {
              setup_postdata( $post );

          ?>
          <div class="articles__item swiper-slide">
            <a class="articles__item-in" href="<?php the_permalink(); ?>">
              <span class="articles__item-image">
                <img src="<?php the_post_thumbnail_url(); ?>" alt loading="lazy" width="432" height="439">
              </span>
              <span class="articles__item-title">
                <?php the_title(); ?>
              </span>
              <span class="articles__item-text">
                <?php the_excerpt(); ?>
              </span>
              <span class="svg-icon svg-icon--arr-r2" aria-hidden="true">
                <svg class="svg-icon__link">
                  <use xlink:href="#arr-r2"></use>
                </svg>
              </span>
            </a>
          </div>
          <?php
            }

            wp_reset_postdata();

          ?>

        </div>
      </div>
    </div>
  </div>
  <div class="articles__footer container">
    <div class="swiper-scrollbar"></div>
  </div>
</section><!-- articles -->