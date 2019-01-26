import dpiSlideOutMap from '../slideout-map';
import dpiSearchModal from '../search-modal';
import dpiSiteNav from '../site-nav';

export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired

    dpiSiteNav.init();
    dpiSearchModal.init();

    // map slide out
    if (!document.body.classList.contains('page-template-template_contact')) {
      dpiSlideOutMap.init();
    }
  },
};
