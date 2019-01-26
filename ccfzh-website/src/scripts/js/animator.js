const animator = (function($) {

  let $window,
      $willAnimate,
      windowDim;

  let store = [];

  function init() {
    cacheDom();
    getDimensions();
    bindEvents();
  }

  function cacheDom() {
    $window = $(window);
    $willAnimate = $('.will-animate');
  }

  function bindEvents() {
    $window.on('resize', resizeHandler);
    $window.on('scroll', isInView);
    $window.trigger('scroll');
  }

  function getDimensions() {
    windowDim = {
      wh: $window.height(),
      wt: 0,
      wb: function() {
        return this.wt + this.wh;
      }
    }

    if ($willAnimate.length > 1) {
      $willAnimate.each(function() {
        addToStore($(this));
      });
    } else {
      addToStore($willAnimate);
    }
  }

  function addToStore(el) {
    store.push({
      el: el,
      eh: el.outerHeight(),
      et: el.offset().top,
      eb: function() {
        return this.et + this.eh;
      }
    });
  }

  function isInView() {
    windowDim.wt = $window.scrollTop();

    store.forEach((obj) => {
      if (obj.eb() >= windowDim.wt && obj.et <= windowDim.wb()) {
        $(obj.el).addClass('in-view');
      }
    });
  }

  function resizeHandler() {
    $.debounce(() => {
      getDimensions();
    }, 100)
  }

  return {
    init() {
      $(document).ready(init);
    }
  }

})(jQuery);

export default animator;
