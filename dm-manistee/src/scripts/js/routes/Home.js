import dpiReveal from '../reveal';
import dpiSlideBg from '../slide-bg';

export default {
  init() {
    // JavaScript to be fired on the home page
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
    dpiSlideBg.init();
    dpiReveal.init();
  },
};
