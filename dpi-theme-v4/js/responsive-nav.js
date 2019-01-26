'use-strict';

(function($) {

  // doc ready
  $(function() {
    var responsiveNav = {

      init: function() {
        this.cacheDom();
        this.initRender();
        this.setContext();
        this.resizeListener();
      },

      cacheDom: function() {
        this.$siteNav = $('#site-navigation');
        this.$wpMenu = this.$siteNav.find('.menu');
        this.$subMenus = this.$siteNav.find('.sub-menu');
        this.$menuToggle = this.$siteNav.find('.menu-toggle');
        this.$toggleBtn = this.$siteNav.find('.toggle-btn');
        this.$nestedMenu = this.$siteNav.find('.menu-item-has-children');
        this.$topLvlSub = this.$siteNav.find('#menu-primary > .menu-item-has-children > .sub-menu');
        this.$topLvlItem = this.$siteNav.find('#menu-primary > .menu-item');
      },

      initRender: function() {
        // append triggers and dropdowns to li's with sub menus
        this.$nestedMenu.each(function() {
            $(this).append('<div class="trigger"><button class="dropdown-toggle"></button></div>');
        });

        // cache appended elements
        this.$dropDownTrigger = $('#site-navigation .trigger');
        this.$dropDownBtn = $('#site-navigation .dropdown-toggle');

        // top level sub menus with more than 8 items become two columns
        this.$topLvlSub.each(function() {
          var liQuantity = $(this).find('li').length;

          if (liQuantity > 8) {
            $(this).addClass('two-col-menu');
          }
        });

        // top lvl .tow-col-menus that are on the right side of the page gets a modifier class to position it right of its parent so it doesnt display off the page
        var median = Math.floor(this.$topLvlItem.length / 2);

        this.$topLvlItem.each(function(i) {
          if (i > median) {
            $(this).find('> .sub-menu').addClass('pos-right');
          }
        });
      },

      setContext: function() {
        var breakpoint = this.getBreakPoint();

        if (typeof breakpoint !== 'number') {
          throw new Error('data-breakpoint is not a number!')
          return;
        } else {
          if ($(window).width() <= breakpoint) {
              this.bindEvents('mobile');
          } else {
              this.bindEvents('desktop');
              this.renderDesktop();
          }
        }
      },

      getBreakPoint: function() {
        return parseInt(this.$siteNav.attr('data-breakpoint'));
      },

      bindEvents: function(context) {
        if (context === 'desktop') {
          // remove any event listeners in case of coming from mobile context
          this.$menuToggle.off('click');
          this.$dropDownTrigger.off('click');
        } else if (context === 'mobile') {
          this.$menuToggle.on('click', this.renderMobile.bind(this));
          this.$dropDownTrigger.on('click', this.renderDropDown);
        }
      },

      renderDropDown: function(e) {
        $(this).parent().find('> .sub-menu').slideToggle('fast');
        $(this).children().toggleClass('dropdown-open');
      },

      renderMobile: function() {
        var navHeight = this.$siteNav.height();
        var menuExpanded = this.$wpMenu.hasClass('menu-expanded');

        // open or close mobile nav slideout
        if (menuExpanded) {
            this.$toggleBtn.toggleClass('close');
            this.$wpMenu.slideUp(300, function() {
                $(this).css({
                    top: '0'
                }).removeClass('menu-expanded');
            });
        } else {
            this.$toggleBtn.toggleClass('close');
            this.$wpMenu.css({
                top: navHeight + 'px'
            }).slideDown(300, function() {
                $(this).addClass('menu-expanded');
            });
        }
      },

      renderDesktop: function() {

        // append arrows to sub menu items with children
        var $firstLvlHasSub = this.$siteNav.find('#menu-primary > .menu-item-has-children > a');
        var $secondLvlHasSub = this.$siteNav.find('#menu-primary > .menu-item-has-children > .sub-menu > .menu-item-has-children > a');
        var $thirdLvlHasSub = this.$siteNav.find('#menu-primary > .menu-item-has-children > .sub-menu > .menu-item-has-children > .sub-menu .menu-item-has-children > a');

        $firstLvlHasSub.each(function() {
          $(this).append('<span class="menuarrow down-arrow"></span>');
        });

        $secondLvlHasSub.each(function() {
          $(this).append('<span class="menuarrow right-arrow"></span>');
        });

        $thirdLvlHasSub.each(function() {
          $(this).append('<span class="menuarrow down-arrow"></span>');
        });

        // remove all classes and inline mobile nav styles in case of resize
        this.$toggleBtn.removeClass('close');

        this.$wpMenu.css({
            top: '',
            display: ''
        }).removeClass('menu-expanded');

        this.$dropDownBtn.each(function() {
            $(this).removeClass('dropdown-open');
        });
        this.$subMenus.css({
            display: ''
        });
      },

      resizeListener: function() {
        // listen for manual viewport resizing and reset context
        var $windowWidth = $(window).width();

        $(window).resize(function() {
          if ($windowWidth != $(window).width()) {
            // if page has been resized then reload window
            window.location = window.location;
            return;
          }
        });
      },
    }
    // get things going
    responsiveNav.init();
  });

})(jQuery);
