(function($) {

  $(document).ready(function() {

    var rule = {

      init: function() {
        this.cacheDom();
        this.applyRule();
      },

      cacheDom: function() {
        this.$headingTwo = $('.entry-content h2');
      },

      applyRule: function() {
        this.$headingTwo.each(function() {
          $(this).addClass('rule');
        });
      },

    }

    rule.init();

  });

})(jQuery);
