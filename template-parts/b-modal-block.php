<div class="b-modal" data-modal="form">
  <div class="b-modal__container" role="dialog">
    <span tabindex="1" onFocus="document.querySelector('.autofocus2').focus()"></span>
    <button class="b-modal__close autofocus1 js-modal-trigger js-close" type="button" aria-label="Close" autofocus
      tabindex="2">
      <span class="svg-icon svg-icon--close" aria-hidden="true">
        <svg class="svg-icon__link">
          <use xlink:href="#close"></use>
        </svg>
      </span>
    </button>
    <?php echo do_shortcode(get_carbon_translated('feedback_form')); ; ?>
  </div>
</div><!-- b-popup -->