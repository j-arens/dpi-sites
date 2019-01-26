import dpiSiteNav from '../site-nav';
import dpiSearchModal from '../search-modal';

export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    dpiSiteNav.init();
    dpiSearchModal.init();
  },
};
