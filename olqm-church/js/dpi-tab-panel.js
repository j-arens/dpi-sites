(function($) {
  $.extend({
    deBounce: function (func, wait, immediate) {
    	var timeout;
    	return function() {
    		var context = this, args = arguments;
    		var later = function() {
    			timeout = null;
    			if (!immediate) func.apply(context, args);
    		};
    		var callNow = immediate && !timeout;
    		clearTimeout(timeout);
    		timeout = setTimeout(later, wait);
    		if (callNow) func.apply(context, args);
    	};
    },
    dpiTabPanel: function() {
      $(document).ready(function() {
        // get our elements and cache them
        var $tabPanel = $('#dpi-tabs-panel');
        var $tabs = $tabPanel.find('.tab');
        var $tabsUl = $tabPanel.find('.tab-container');
        var $tabNav = $tabPanel.find('nav');
        var $tabNavUl = $tabNav.find('ul')
        var $tabNavLi = $tabNav.find('li');
        var $trigger = $tabNav.find('.tab-trigger');
        var $imgs = $('#church-info .featured-image img');

        // initialize tabs panel component
        var initTabsPanel = function() {

          // add data attr to tabs, nav li, imgs
          $tabNavLi.each(function(i) {
            $(this).attr('data', i);
          });

          $tabs.each(function(i) {
            $(this).attr('data', i);
          });

          $imgs.each(function(i) {
            $(this).attr('data', i);
          });

          // give first nav li active-link class
          $($tabNavLi[0]).addClass('active-link');

          setContext();

        }

        // get the index of the current active tab
        var getActiveTab = function() {
          var index;
          $tabs.each(function(i) {
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
            // throw new Error('Must provide an integer to positionEl!');
            return;
          } else {
            // if the index is above or below range then skip to the first or last tab
            if (index < 0) {
              index = ($tabs.length - 1);
            } else if (index > ($tabs.length - 1)) {
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

        var displayImg = function(el, index) {
          // make sure the parameter is an integer
          if (typeof index !== 'number') {
            // throw new Error('Must provide an integer to displayImg!');
            return;
          } else {
            // if the index is above or below range then skip to the first or last tab
            if (index < 0) {
              index = ($tabs.length - 1);
            } else if (index > ($tabs.length - 1)) {
              index = 0;
            }
            // iterate through each array of elements
            for (var i = 0; i < el.length; i++) {
              // iterate through each element and set the appropitate z index
              $(el[i]).each(function(i) {
                if (i === index) {
                  $(this).css({
                    opacity: '1'
                  });
                } else {
                  $(this).css({
                    opacity: '0'
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
            $tabNavLi.each(function() {
              $(this).removeClass('active-link');
            });

            $($tabNavLi[index]).addClass('active-link');
          }
        }

        // handle clicks on desktop
        var renderDesktop = function() {
          $tabNav.click(function(e) {
            var target = $(e.target).closest('li');
            var index = parseInt($(target).attr('data'));

            // remove mobile click handler
            $trigger.off('click');

            if (isNaN(index)) {
              return;
            } else {
              positionEl([$tabs], index);
              displayImg([$imgs], index);
              styleNav(index);
            }
          });
        }

        // handle clicks on mobile
        var renderMobile = function() {
          // remove desktop click handler
          $tabNav.off('click');

          $trigger.click(function(e) {
            if ($(e.target).hasClass('trigger-prev')) {
              positionEl([$tabs, $tabNavLi], getActiveTab() - 1);
            } else if ($(e.target).hasClass('trigger-next')) {
              positionEl([$tabs, $tabNavLi], getActiveTab() + 1);
            }
          });
        }

        // render correct styles/js based on window width
        var setContext = function() {
          if ($(window).width() > 430) {
            renderDesktop();
          } else {
            renderMobile();
          }
        }

        // listen for manual viewport resizing
        var resizeListener = function() {
          var $windowWidth = $(window).width();

          $(window).resize(function() {
            if ($windowWidth != $(window).width()) {
              $.deBounce(setContext, 250);
              return;
            }
          });
        }

        initTabsPanel();
      });
    }
  });
})(jQuery);

jQuery.dpiTabPanel();
