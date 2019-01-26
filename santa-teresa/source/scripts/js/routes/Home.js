import IconAnim from '../icon-anim';

export default {
  init() {
    // JavaScript to be fired on the home page
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
    const animations = new IconAnim();
    animations.init();
  },
};
