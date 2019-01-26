import { throttle } from 'lodash';

const dpiSliderMenu = (function($) {

  let $nav,
      $toggleOpen,
      $toggleClose,
      $menu,
      $primaryMenu,
      $bodyClick,
      nonFixedHeight;

  function toggleSubMenu() {
    $(this).parent().toggleClass('active');
  }

  function toggleNav() {
    $nav.toggleClass('active');
    $toggleOpen.toggleClass('hide');
    $toggleClose.toggleClass('hide');
    $menu.toggleClass('active');
  }

  function fixNav() {
    const $sibling = $nav.next();

    if (!nonFixedHeight) {
      nonFixedHeight = $nav.outerHeight();
    }

    if ($(window).scrollTop() >= $nav.offset().top && !$nav.hasClass('fixed')) {
      $nav.addClass('fixed');
      $sibling.css({marginTop: `${parseFloat($sibling.css('marginTop')) + nonFixedHeight}px`});
    } else if ($(window).scrollTop() === 0) {
      $sibling.css({marginTop: `${parseFloat($sibling.css('marginTop')) - nonFixedHeight}px`});
      $nav.removeClass('fixed');
    }
  }

  function bindEvents() {
    try {
      $(window).on('scroll', throttle(fixNav, 200));
      $toggleOpen.on('click', toggleNav);
      $toggleClose.on('click', toggleNav);
      $bodyClick.on('click', toggleNav);
      $primaryMenu.delegate('.item-has-children', 'click', toggleSubMenu);
    } catch(err) {
      console.error('DPI Slider Menu: Unable to bind events!');
    }
  }

  function cacheDom() {
    $nav = $('#slider-menu');
    $toggleOpen = $nav.find('#nav-toggle-open');
    $toggleClose = $nav.find('#nav-toggle-close');
    $menu = $nav.find('#site-nav');
    $bodyClick = $nav.find('.body-click');
    $primaryMenu = $nav.find('#menu-primary-navigation');
  }

  function init() {
    cacheDom();
    bindEvents();
  }

  return {
    init() {
      $(document).ready(init);
    }
  }

})(jQuery);

export default dpiSliderMenu;
