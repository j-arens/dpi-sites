// import { throttle } from 'lodash';

const dpiNav = (function() {

    let siteHeader,
        navContainer,
        siteNav,
        tpl,
        d1Submenus,
        subMenuWrap,
        mobileToggle,
        mobileMenu,
        mobileMenuItems;

    /**
     * Toggle mobile sub menus
     * @param {event} e 
     */
    function toggleSubMenu(e) {
        if (e.target.tagName !== 'A') {
            e.preventDefault();

            if (this.classList.contains('active')) {
                this.classList.remove('active');
            } else {
                mobileMenuItems.forEach(item => item.classList.remove('active'));
                this.classList.add('active');
            }
        }
    }

    /**
     * Toggle mobile nav
     */
    function toggleMobileNav() {
        navContainer.classList.toggle('active');
        mobileToggle.classList.toggle('toggled');
        mobileMenu.classList.toggle('active');
    }

    /**
     * Highlight nav columns and corresponding heading
     */
    function toggleColHighlight() {
        if (window.innerWidth > 1200) {
            const idx = tpl.indexOf(this) >= 0 ? tpl.indexOf(this) : d1Submenus.indexOf(this);
            tpl[idx].classList.toggle('hvr-active');
            d1Submenus[idx].classList.toggle('hvr-active');
        }
    }

    /**
     * Transition the sub menu height when opening or closing on desktop
     */
    function transitionMenuHeight() {
        if (window.innerWidth > 1200) {
            const active = subMenuWrap.classList.contains('active') ? true : false;
            subMenuWrap.classList.toggle('active');

            // clear any possible intervals from previous opening or closing.
            clearInterval(window.hinst);
            window.hinst = setInterval((target, active) => {
                const currentMax = parseFloat(target.style.maxHeight) || 0;
                const inDimension = active ? currentMax > 0 : currentMax < 100;
                const newMax = active ? `${currentMax - 1}vh` : `${currentMax + 1}vh`;

                if (inDimension) {
                    target.style.maxHeight = newMax;
                } else {
                    clearInterval(window.hinst);
                }
            }, 2, subMenuWrap, active);
        }
    }

    /**
     * Setup event listeners
     */
    function bindEvents() {
        try {
            siteNav.addEventListener('mouseenter', () => {
                window.transHeightID = setTimeout(transitionMenuHeight, 250);
            });

            siteNav.addEventListener('mouseleave', () => {
                clearTimeout(window.transHeightID);

                if (subMenuWrap.classList.contains('active')) {
                    transitionMenuHeight();
                }
            });

            [...tpl, ...d1Submenus].forEach(el => {
                el.addEventListener('mouseenter', toggleColHighlight);
                el.addEventListener('mouseleave', toggleColHighlight);
            });

            mobileToggle.addEventListener('click', toggleMobileNav);
            mobileMenuItems.forEach(item => item.addEventListener('click', toggleSubMenu));

        } catch(err) {
            console.error('DPI Nav: Unable to bind events!', err);
        }
    }

    /**
     * Cache nodes
     */
    function cacheDom() {
        siteHeader = document.querySelector('.site-header');
        navContainer = siteHeader.querySelector('.site-nav-row');
        siteNav = navContainer.querySelector('#site-navigation');
        tpl = Array.from(siteNav.querySelectorAll('#menu-primary-menu .tpl'));
        subMenuWrap = siteNav.querySelector('.sub-menu-wrap');
        d1Submenus = Array.from(siteNav.querySelectorAll('.sub-menu-depth-1'));
        mobileMenu = siteNav.querySelector('.mobile-nav-menu');
        mobileToggle = siteNav.querySelector('#mobile-nav-toggle');
        mobileMenuItems = Array.from(mobileMenu.querySelectorAll('.tpl'));
    }

    /**
     * Startup
     */
    function init() {
        cacheDom();
        bindEvents();
    }

    /**
     * Public methods
     */
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

export default dpiNav;