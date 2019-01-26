// mobile menu
(function($) {

    // add debounce to jquery for any possible future usage
    $.extend({
        debounce: function(func, wait, immediate) {
            var timeout;
            return function() {
                var context = this,
                    args = arguments;
                var later = function() {
                    timeout = null;
                    if (!immediate) func.apply(context, args);
                };
                var callNow = immediate && !timeout;
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
                if (callNow) func.apply(context, args);
            };
        }
    });

    $(document).ready(function() {

        // cache frequently called dom elements
        var siteNav = $('#site-navigation');
        var wpMenu = $('.menu');
        var subMenus = $('.sub-menu');
        var menuToggle = $('.menu-toggle');
        var toggleBtn = $('.toggle-btn');
        var nestedMenu = $('.menu-item-has-children');
        var dropDownTrigger;
        var dropDownBtn;

        // get the nav breakpoint set in navigation.scss
        var getBreakPoint = function() {
            return parseInt(window.getComputedStyle(document.querySelector('body'), ':before').getPropertyValue('content').replace(/\"/g, ''));
        }

        // init
        var navInit = function() {

            // append triggers and dropdowns to li's with sub menus
            nestedMenu.each(function() {
                $(this).append('<div class="trigger"><button class="dropdown-toggle"></button></div>');
            });

            // set reference to appended elements
            dropDownTrigger = $('.trigger');
            dropDownBtn = $('.dropdown-toggle');
        }


        // mobile nav control
        var mobileNavControl = function() {
            $(menuToggle).click(function() {
                // **cant use slideToggle because it will close when swiping on mobile

                var navHeight = $(siteNav).height();
                var menuExpanded = $(wpMenu).hasClass('menu-expanded');

                // open or close mobile nav slideout
                if (menuExpanded) {
                    $(toggleBtn).toggleClass('close');
                    $(wpMenu).slideUp(300, function() {
                        $(this).css({
                            top: '0'
                        }).removeClass('menu-expanded');
                    });
                } else {
                    $(toggleBtn).toggleClass('close');
                    $(wpMenu).css({
                        top: navHeight + 'px'
                    }).slideDown(300, function() {
                        $(this).addClass('menu-expanded');
                    });
                }
            });

            //display nested menus on dropdown click
            dropDownTrigger.click(function(e) {
                $(this).parent().find('> .sub-menu').slideToggle('fast');
                $(this).children().toggleClass('dropdown-open');
            });
        }


        // desktop nav control
        var desktopNavControl = function() {

          // unbind click listeners in case of coming from resize
          $(menuToggle).off('click');
          $(dropDownTrigger).off('click');

          // remove all classes and inline mobile nav styles in case of resize
          $(toggleBtn).removeClass('close');
          $(wpMenu).css({
              top: '',
              display: ''
          }).removeClass('menu-expanded');
          $(dropDownBtn).each(function() {
              $(this).removeClass('dropdown-open');
          });
          $(subMenus).css({
              display: ''
          });
        }

        navInit();

        // manual resize debouncers
        var resizedMobile = $.debounce(function() {
            mobileNavControl();
        }, 100);

        var resizedDesktop = $.debounce(function() {
            desktopNavControl();
        }, 100);

        // listen for manual viewport resizing
        $(window).resize(function() {
            if ($(window).width() > getBreakPoint()) {
                resizedDesktop();
            } else if ($(window).width() <= getBreakPoint()) {
                resizedMobile();
            }
        });

        // set the correct nav context on dom ready
        if ($(window).width() <= getBreakPoint()) {
            mobileNavControl();
        } else if ($(window).width() > getBreakPoint()) {
            desktopNavControl();
        }

    });
})(jQuery);
