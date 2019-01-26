import dpiSwatcher from '../dpiSwatcher';

export default {
  init() {
    // JavaScript to be fired on the home page
    dpiSwatcher.init();
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
