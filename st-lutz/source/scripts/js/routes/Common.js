import searchModal from '../searchModal';
import skipTo from '../skipTo';

export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    searchModal.init();
    skipTo.init();
  },
};
