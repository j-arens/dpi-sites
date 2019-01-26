import categoryPicker from '../categoryPicker';

export default {
  init() {
    // JavaScript to be fired on the about us page
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    categoryPicker().init();
  },
};