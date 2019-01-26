import contactFormHelper from '../contactFormHelper';
import animator from '../animator';

export default {
  init() {
    // JavaScript to be fired on the home page
    if (jQuery(window).width() > 1120) {
      animator.init();
    }
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
    contactFormHelper.init();
  },
};
