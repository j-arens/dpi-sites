import { throttle } from 'lodash';

const dpiSiteNav = (function() {

  let siteHeader,
      navWrap,
      siteNav,
      itemHasChildren,
      mobileNavToggle,
      nonFixedHeight;

  function toggleMobileNav() {
    navWrap.classList.toggle('active');
  }

  function toggleSubMenu(e) {
    if (e.target.classList.contains('item-has-children') && !e.target.classList.contains('gl-tpl-title')) {

      const removeActive = itemHasChildren.filter(item => {
        if (item.classList.contains('tpl-title') && item.parentNode.contains(e.target)) {
          return false;
        } else if (item === e.target) {
          return false;
        } else {
          return true;
        }
      });

      removeActive.forEach(item => item.parentNode.classList.remove('active'));
      e.target.parentNode.classList.toggle('active');
    } else if (!siteNav.contains(e.target)) {
      itemHasChildren.forEach(item => item.parentNode.classList.remove('active'));
    }
  }

  function sticky() {
    if (window.innerWidth > 1250) {
      const navSibling = navWrap.nextElementSibling;
      const headerSibling = siteHeader.nextElementSibling;
      const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      const offset = navWrap.getBoundingClientRect();

      if (!nonFixedHeight) {
        nonFixedHeight = navWrap.offsetHeight;
      }

      if (scrollTop >= offset.top + scrollTop && !navWrap.classList.contains('sticky')) {
        navWrap.classList.add('sticky');
        if (navSibling) {
          navSibling.style.top = `${(parseFloat(navSibling.style.top) || 0) + nonFixedHeight}px`;
        } else {
          headerSibling.style.marginTop = `${(parseFloat(headerSibling.style.marginTop) || 0) + nonFixedHeight}px`;
        }
      } else if (scrollTop === 0) {
        navWrap.classList.remove('sticky');
        if (navSibling) {
          navSibling.style.top = `${parseFloat(navSibling.style.top) - nonFixedHeight}px`;
        } else {
          headerSibling.style.marginTop = `${parseFloat(headerSibling.style.marginTop) - nonFixedHeight}px`;
        }
      }
    }
  }

  function bindEvents() {
    try {
      document.addEventListener('click', toggleSubMenu);
      window.addEventListener('scroll', throttle(sticky, 200));
      mobileNavToggle.addEventListener('click', toggleMobileNav);
    } catch(err) {
      console.error('DPI Nav: Unable to bind events!', err);
    }
  }

  function cacheDom() {
    siteHeader = document.querySelector('.site-header');
    navWrap = siteHeader.querySelector('.site-nav-wrap');
    siteNav = navWrap.querySelector('.site-nav');
    itemHasChildren = Array.from(siteNav.querySelectorAll('.item-has-children'));
    mobileNavToggle = siteNav.querySelector('#mobile-nav-toggle');
  }

  function init() {
    cacheDom();
    bindEvents();
  }

  return {
    init() {
      if (document.readyState != 'loading'){
        init();
      } else {
        document.addEventListener('DOMContentLoaded', init);
      }
    }
  }

})();

export default dpiSiteNav;
