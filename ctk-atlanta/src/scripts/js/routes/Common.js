import dpiSliderMenu from '../dpiSliderMenu';
import dpiScroller from '../scroller';
import contactFormHelper from '../contactFormHelper';

export default {
  init() {
    // JavaScript to be fired on all pages
    dpiSliderMenu.init();
    dpiScroller.init();
    contactFormHelper.init();

    // disable smooth scroll on ie/edge
    if (window.navigator.userAgent.match(/Edge|Trident/ig)) {
      jQuery('body').on('mousewheel', () => {
        event.preventDefault();
        window.scrollTo(0, window.pageYOffset - event.wheelDelta);
      });
    }
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
