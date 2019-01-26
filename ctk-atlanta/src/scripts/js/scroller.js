const dpiScroller = (function($) {

  const $buttons = [];

  function scroll(e) {
    const $target = $(e.target.dataset.scrollto);
    let scrollTop;

    if ($target != '.site-header') {
      scrollTop = $target.offset().top - 48; // 48 to account for .site-topbar
    }

    if ($('body').hasClass('admin-bar')) {
      $('body, html').animate({scrollTop: `${scrollTop - 32}px`});
    } else {
      $('body, html').animate({scrollTop: `${scrollTop}px`});
    }
  }

  function bindEvents() {
    try {
      $buttons.forEach(btn => btn.on('click', scroll));
    } catch(err) {
      console.error('DPI Scroller: Unable to bind events!');
    }
  }

  function cacheDom() {
    $buttons.push(
      $('#explore-button'),
      $('#return-button')
    );
  }

  function init() {
    cacheDom();
    bindEvents();
  }

  return {
    init() {
      $(document).ready(init);
    }
  }

})(jQuery);

export default dpiScroller;
