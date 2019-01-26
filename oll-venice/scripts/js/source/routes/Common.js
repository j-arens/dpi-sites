import searchModal from '../searchModal';
import subMenus from '../subMenus';

export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    searchModal.init();
    subMenus(window.jQuery).init();
  },
};
