const dpiScrollTo = (function($) {

  let $buttons = [];

  function scroll(e) {
    const $target = $(e.target.dataset.scrollto);

    if ($('body').hasClass('admin-bar')) {
      $('html, body').animate({scrollTop: `${$target.offset().top - 32}px`});
    } else {
      $('html, body').animate({scrollTop: `${$target.offset().top}px`});
    }
  }

  function bindEvents() {
    try {
      $buttons.forEach(button => button.on('click', scroll));
    } catch(err) {
      console.error('DPI Scroll-to: Unable to bind events!', err);
    }
  }

  function disableChildren() {
    $buttons.forEach(button => {
      if (button.children()) {
        button.children().each(function() {
          $(this).css({pointerEvents: 'none'});
        });
      }
    });
  }

  function cacheDom() {
    $buttons.push(
      $('#explore-button'),
      $('#return-button')
    );
  }

  function init() {
    cacheDom();
    disableChildren();
    bindEvents();
  }

  return {
    init() {
      $(document).ready(init);
    }
  }

})(jQuery);

export default dpiScrollTo;
