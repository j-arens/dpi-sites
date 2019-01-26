(function($) {

  // doc ready
  $(function() {
    var pageHeight = {

      init: function() {
        this.cacheDom();
        this.setHeight();
      },

      cacheDom: function() {
        this.$html = $('html');
        this.$page = this.$html.find('body:not(.home) #page');
        this.$header = this.$page.find('#masthead');
        this.$footer = this.$page.find('#colophon');
        this.$content = this.$page.find('#content');
      },

      combineHeight: function() {
        var totalHeight = (this.$header.outerHeight() + this.$footer.outerHeight()) / (parseInt(this.$html.css('fontSize')));
        return totalHeight;
      },

      setHeight: function() {
        this.$content.css({
          minHeight: 'calc(100vh - ' + this.combineHeight() + 'em)',
        });
      },

    }

    pageHeight.init();
  });


})(jQuery);
