<?php
/*
  Template Name: Контакты
*/
?>

<?php get_header(); ?>

<?php 
  // Блок "Первый экран (внутрення страница) - hero-in"
  echo get_template_part('template-parts/hero-in-block'); 
?>

<div class="contacts-content container">
  <div class="contacts">
    <div class="contacts__item">
      <div class="contacts__item-name">
        <?php echo carbon_get_post_meta($post->ID, 'contacts_email_text'); ?>
      </div>
      <div class="contacts__item-body">
        <div>
          <a href="mailto:<?php echo carbon_get_post_meta($post->ID, 'contacts_email'); ?>">
            <?php echo carbon_get_post_meta($post->ID, 'contacts_email'); ?>
          </a>
        </div>
      </div>
    </div>
    <div class="contacts__item">
      <div class="contacts__item-name">
        <?php echo carbon_get_post_meta($post->ID, 'contacts_phone_text'); ?>
      </div>
      <div class="contacts__item-body">
        <div>
          <a href="tel:<?php echo make_phone_url(carbon_get_post_meta($post->ID, 'contacts_phone')); ?>">
            <?php echo carbon_get_post_meta($post->ID, 'contacts_phone'); ?>
          </a>
        </div>
      </div>
    </div>
  </div><!-- contacts -->

  <div class="contacts-content__container">
    <div class="contacts-content__title">
      <?php echo carbon_get_post_meta($post->ID, 'contacts_map_text'); ?>
    </div>
    <div class="contacts-content__col">
      <div class="contacts-content__address">
        <?php echo carbon_get_post_meta($post->ID, 'contacts_address'); ?>
      </div>
      <div class="contacts-content__work">
        <?php echo carbon_get_post_meta($post->ID, 'contacts_schedule'); ?>
      </div>
    </div>
    <div class="contacts-content__map">
      <div class="contacts-content__map-in js-map">
        <button class="fullscreen"></button>
        <div id="site-map" class="contacts-content__map-container"></div>
      </div>
    </div>
  </div>
  <div class="contacts-content__footer">
    <div class="contacts-content__b-text">
      <?php echo carbon_get_post_meta($post->ID, 'contacts_socials_title'); ?>
    </div>
    <div class="contacts-content__s-text">
      <?php echo carbon_get_post_meta($post->ID, 'contacts_socials_text'); ?>
    </div>

    <?php
      $socials = get_carbon_translated('theme_socials'); 
      $contacts_socials = carbon_get_post_meta($post->ID, 'contacts_socials'); 
    ?>

    <?php if (!empty($contacts_socials) || !empty($socials)) : ?>
    <div class="socials">
      <div class="socials__items">

        <?php if (!empty($contacts_socials)) : ?>
        <?php foreach ($contacts_socials as $item): ?>
        <div class="socials__item-wrap">
          <a href="<?php echo $item['link']; ?>" aria-label="<?php echo $item['title']; ?>" class="socials__item">
            <?php echo file_get_contents(wp_get_attachment_image_url($item['icon'], 'full')); ?>
          </a>
          <span><?php echo $item['title']; ?></span>
        </div>
        <?php endforeach; ?>

        <?php else: ?>

        <?php foreach ($socials as $item): ?>
        <div class="socials__item-wrap">
          <a href="<?php echo $item['link']; ?>" aria-label="<?php echo $item['title']; ?>" class="socials__item">
            <?php echo file_get_contents(wp_get_attachment_image_url($item['icon'], 'full')); ?>
          </a>
          <span><?php echo $item['title']; ?></span>
        </div>
        <?php endforeach; ?>

        <?php endif; ?>
      </div>
    </div><!-- socials -->
    <?php endif; ?>

  </div>
</div><!-- contacts-content -->


<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvxGHYNiUzRXCYRoYxuacudDWe7g8ghFw&amp;sensor=false"></script>

<script>

  var map_marker = '<?php echo get_template_directory_uri() . "/assets/img/map-marker.svg"; ?>';

  var coords = '<?php echo carbon_get_post_meta($post->ID, 'contacts_coords'); ?>';
  var coords_to_array = coords.split(',');

  var initMap = function initMap() {
    var map;
    var center = coords_to_array;
    map = new google.maps.Map(document.getElementById('site-map'), {
      center: {
        lat: Number(center[0]),
        lng: Number(center[1])
      },
      zoom: 15,
      disableDefaultUI: true,
      styles: [{
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [{
          "color": "#e9e9e9"
        }, {
          "lightness": 17
        }]
      }, {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [{
          "color": "#f5f5f5"
        }, {
          "lightness": 20
        }]
      }, {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#ffffff"
        }, {
          "lightness": 17
        }]
      }, {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [{
          "color": "#ffffff"
        }, {
          "lightness": 29
        }, {
          "weight": 0.2
        }]
      }, {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [{
          "color": "#ffffff"
        }, {
          "lightness": 18
        }]
      }, {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [{
          "color": "#ffffff"
        }, {
          "lightness": 16
        }]
      }, {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [{
          "color": "#f5f5f5"
        }, {
          "lightness": 21
        }]
      }, {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [{
          "color": "#dedede"
        }, {
          "lightness": 21
        }]
      }, {
        "elementType": "labels.text.stroke",
        "stylers": [{
          "visibility": "on"
        }, {
          "color": "#ffffff"
        }, {
          "lightness": 16
        }]
      }, {
        "elementType": "labels.text.fill",
        "stylers": [{
          "saturation": 36
        }, {
          "color": "#333333"
        }, {
          "lightness": 40
        }]
      }, {
        "elementType": "labels.icon",
        "stylers": [{
          "visibility": "off"
        }, {
          "color": "#000"
        }, {
          "lightness": 60
        }]
      }, {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [{
          "color": "#f2f2f2"
        }, {
          "lightness": 19
        }]
      }, {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#fefefe"
        }, {
          "lightness": 20
        }]
      }, {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [{
          "color": "#fefefe"
        }, {
          "lightness": 17
        }, {
          "weight": 1.2
        }]
      }]
    });
    var iconDefaultUrl = map_marker;
    var iconDefault = {
      url: iconDefaultUrl,
      scaledSize: new google.maps.Size(52, 62)
    };

    var marker = new google.maps.Marker({
      // id: popupId,
      position: {
        lat: Number(center[0]),
        lng: Number(center[1])
      },
      map: map,
      icon: iconDefault
    });
  };
  initMap();
</script>


<?php get_footer(); ?>