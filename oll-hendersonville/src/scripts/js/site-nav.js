const dpiSiteNav = (function() {

    let siteNav,
        menu,
        itemHasChildren,
        menuToggle;

    function toggleMobileMenu() {
        document.body.classList.toggle('mobile-menu_open');
        menuToggle.classList.toggle('menu-toggle_open');
        menu.classList.toggle('nav-menu_open');
    }

    function toggleSubMenu(e) {
        if (e.target === this) {
            if (this.classList.contains('open')) {
                itemHasChildren.filter(item => item === this)[0].classList.remove('open');
            } else {
                itemHasChildren.forEach(item => item.classList.remove('open'));
                itemHasChildren.filter(item => item === this)[0].classList.add('open');
            }
        }
    }

    function bindEvents() {
        try {
            itemHasChildren.forEach(item => item.addEventListener('click', toggleSubMenu));
            menuToggle.addEventListener('click', toggleMobileMenu);

            // stupid iphone fix
            if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i))) {
                menuToggle.addEventListener('mouseover', toggleMobileMenu);
            }

        } catch(err) {
            console.error('DPI SITE NAV: Unable to bind events!');
        }
    }

    function cacheDom() {
        siteNav = document.getElementById('site-nav');
        menu = siteNav.querySelector('.nav-menu');
        itemHasChildren = Array.from(siteNav.querySelectorAll('.depth-0.menu-item-has-children'));
        menuToggle = siteNav.querySelector('.menu-toggle');
    }

    function main() {
        cacheDom();
        bindEvents();
    }

    function ready(fn) {
        if (document.readyState != 'loading'){
            fn();
        } else {
            document.addEventListener('DOMContentLoaded', fn);
        }
    }

    return {
        init() {
            ready(main);
        }
    }

})();

export default dpiSiteNav;