/* eslint-disable */

const debouncer = (function($) {

  function init() {
    $.extend({
      debounce: function(func, wait, immediate) {
        let timeout;

        return function() {
          const context = this, args = arguments;

          function later() {
            timeout = null;
            if (!immediate) func.apply(context, args);
          }

          const callNow = immediate && !timeout;
        }

        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callnow) func.apply(context, args);
      }
    });
  }

  return {
    init: init
  }

})(jQuery);

export default debouncer;
