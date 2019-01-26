const dpiCustomizer = (function($, local) {

  const customizer = window.wp.customize;

  function renderBackgroundImage(setting) {
    customizer(setting.id, (val) => val.bind(to => {
      if (!to) {
        $(setting.selector).hide();
      } else {
        $(setting.selector).show();
        $(setting.selector).css({
          backgroundImage: `url(${to})`
        });
      }
    }));
  }

  function renderImage(setting) {
    customizer(setting.id, (val) => val.bind(to => {
      if (!to) {
        $(setting.selector).hide();
      } else {
        $(setting.selector).show();
        $(setting.selector).attr('src', to);
      }
    }));
  }

  function renderText(setting) {
    customizer(setting.id, (val) => val.bind(to => $(setting.selector).text(to)));
  }

  function bindRenderMethod() {
    local.settings.forEach(setting => {
      switch(setting.type) {
        case 'image':
          renderImage(setting);
        default:
          renderText(setting);
      }
    });
  }

  function init() {
    if (!local) {
      console.error('DPI Customizer: Unable to get localized data!');
      return false;
    } else {
      // bindRenderMethod();
      console.log(local);
    }
  }

  return {
    init() {
      $(document).ready(init);
    }
  }

})(jQuery, dpi_local_cust);

dpiCustomizer.init();
