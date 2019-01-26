import featuredLinks from '../featuredLinks';

export default {
  init() {
    // JavaScript to be fired on the home page
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
    featuredLinks().init();
  },
};
