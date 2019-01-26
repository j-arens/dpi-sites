const dpiSiteNav = (function() {

    let navToggle,
        navItems;

    const state = {
        currentItem: null
    }

    function toggleSubmenu() {
        const idx = navItems.findIndex(item => item === this);

        if (state.currentItem === idx && this.classList.contains('item-active')) {
            this.classList.remove('item-active');
        } else {

            if (state.currentItem !== null) {
                navItems[state.currentItem].classList.remove('item-active');
            }

            this.classList.add('item-active');
            state.currentItem = idx;
        }
    }

    function toggleMenu() {
        document.body.classList.toggle('nav-active');
    }

    function bindEvents() {
        try {
            navToggle.addEventListener('click', toggleMenu);
            navItems.forEach(item => item.addEventListener('click', toggleSubmenu));
        } catch(err) {
            console.error('DPI Site Nav: Unable to bind events!', err);
        }
    }

    function cacheDom() {
        navToggle = document.getElementById('nav-toggle');
        navItems = Array.from(document.querySelectorAll('.menu-item-has-children'));
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