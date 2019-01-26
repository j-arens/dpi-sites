/**
* associated styles
*
  #rev-scroll-btn:hover > i {animation: moveArrow .7s ease-in-out infinite;}

  #rev-scroll-btn > i {margin: 0 !important; font-size: 1em !important;}

  @keyframes moveArrow {
    100% {
      top: 20px;
    }
  }
*
*/

(function($) {
  $(document).ready(function() {
    var revBtn = $('#rev-scroll-btn');
    var headerHeight = $('#masthead').outerHeight(true);
    var revSliderHeight = $('.rev_slider_wrapper').height();

    var revBtnListener = function() {
      revBtn.click(function() {
        $('html, body').animate({
          scrollTop: (headerHeight + revSliderHeight)
        }, 'slow');
      });
    }

    var windowResized = $.debounce(function() {
      if ($(window).width() < 1400) {
        console.log('btn off and hide');
        revBtn.off('click').hide();
      } else {
        revBtn.show().click(revBtnListener());
        headerHeight = $('#masthead').height();
        revSliderHeight = $('.rev_slider_wrapper').height();
      }
    }, 250);

    $(window).resize(function() {
      windowResized();
    });

    if ($(window).width() >= 1400) {
      revBtnListener();
    } else {
      revBtn.hide();
    }

  });
})(jQuery)
