import dpiNav from '../site-nav';
import dpiSearch from '../search';

export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    dpiNav.init();
    dpiSearch.init();
  },
};
