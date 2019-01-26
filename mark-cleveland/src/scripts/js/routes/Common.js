import dpiSiteNav from '../site-nav';
import dpiScrollTo from '../scroll-to';

export default {
  init() {
    // JavaScript to be fired on all pages
    dpiSiteNav.init();
    dpiScrollTo.init();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
