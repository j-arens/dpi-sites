(function($) {
  $.extend({
    dpiTabPanel: function() {
      $(document).ready(function() {
        // get our elements and cache them
        var tabs = $('#dpi-tabs-panel .tab');
        var tabsUl = $('#dpi-tabs-panel .tab-container');
        var tabNav = $('#dpi-tabs-panel nav');
        var tabNavUl = $('#dpi-tabs-panel nav ul')
        var tabNavLi = $('#dpi-tabs-panel nav li');
        var trigger = $('#dpi-tabs-panel .tab-trigger');

        // initialize tabs panel component
        var initTabsPanel = function() {

          // add data attr to tabs and nav li
          $(tabNavLi).each(function(i) {
            $(this).attr('data', i);
          });

          $(tabs).each(function(i) {
            $(this).attr('data', i);
          });

          // give first nav li active-link class
          $(tabNavLi[0]).addClass('active-link');

        }

        // get the index of the current active tab
        var getActiveTab = function() {
          var index;
          $(tabs).each(function(i) {
            if ($(this).css('zIndex') === '2') {
              index = i;
            }
          });
          return index;
        }

        /**
         * Position the elements.
         * el - array, an array containing an array of the elements to be positioned, '[[elArr1], [elArr2]], index'
         * index - integer, the index number to retrieve the apporpiate element from the array
         */
        var positionEl = function(el, index) {

          // make sure the parameter is an integer
          if (typeof index !== 'number') {
            throw new Error('Must provide an integer to positionEl!');
            return;
          } else {
            // if the index is above or below range then skip to the first or last tab
            if (index < 0) {
              index = (tabs.length - 1);
            } else if (index > (tabs.length - 1)) {
              index = 0;
            }
            // iterate through each array of elements
            for (var i = 0; i < el.length; i++) {
              // iterate through each element and set the appropitate z index
              $(el[i]).each(function(i) {
                if (i === index) {
                  $(this).css({
                    zIndex: '2'
                  });
                } else {
                  $(this).css({
                    zIndex: '1'
                  });
                }
              });
            }
          }
        }

        // style the nav
        var styleNav = function(index) {

          // make sure the parameter is an integer
          if (typeof index !== 'number') {
            throw new Error('Must provide an integer to positionEl!');
            return;
          } else {

            // style active nav heading
            $(tabNavLi).each(function() {
              $(this).removeClass('active-link');
            });

            $(tabNavLi[index]).addClass('active-link');
          }
        }

        // handle clicks on desktop
        var desktopClicker = function() {
          $(tabNav).click(function(e) {
            var target = $(e.target).closest('li');
            var index = parseInt($(target).attr('data'));

            // remove mobile click handler
            $(trigger).off('click');

            positionEl([tabs], index);
            styleNav(index);
          });
        }

        // handle clicks on mobile
        var mobileClicker = function() {
          // remove desktop click handler
          $(tabNav).off('click');

          $(trigger).click(function(e) {
            if ($(e.target).hasClass('trigger-prev')) {
              positionEl([tabs, tabNavLi], getActiveTab() - 1);
            } else if ($(e.target).hasClass('trigger-next')) {
              positionEl([tabs, tabNavLi], getActiveTab() + 1);
            }
          });
        }

        // desktop click listener
        if ($(window).width() > 430) {
          desktopClicker();
        }

        // mobile click listener
        else if ($(window).width() <= 430) {
          mobileClicker();
        }

        var debouncedMobile = $.debounce(function() {
          mobileClicker();
        });

        var debouncedDesktop = $.debounce(function() {
          desktopCliker();
        });

        // keep things consistent if manually resizing the viewport
        $(window).resize(function() {
          // desktop click listener
          if ($(window).width() > 430) {
            debouncedDesktop();
          }

          // mobile click listener
          else if ($(window).width() <= 430) {
            debouncedMobile();
          }
        });

        initTabsPanel();
      });
    }
  });
})(jQuery);

jQuery.dpiTabPanel();
