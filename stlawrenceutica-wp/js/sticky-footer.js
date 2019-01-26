(function($) {

  $(document).ready(function() {
    var windowHeight = $(window).height();
    var adminBar = $('#wpadminbar');
    var page = $('#page');
    var pageHeight = $(page).height();
    var footer = $('.site-footer');
    var footerStyles = {
      position: 'absolute',
      bottom: '0',
      left: '0',
      width: '100%'
    }

    if (pageHeight < windowHeight) {

      if (adminBar) {
          $(page).css({height: (windowHeight - 32)});
          $(footer).css(footerStyles);
      } else {
        $(page).css({height: windowHeight});
        $(footer).css(footerStyles);
      }

    } else {
      return;
    }

  });

})(jQuery);
