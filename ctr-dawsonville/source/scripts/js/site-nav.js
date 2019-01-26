const dpiSiteNav = (() => {

    let navToggles;

    const toggleMobileNav = () => {
        document.documentElement.classList.toggle('mobile-nav-active');
    }

    const bindEvents = () => {
        try {
            navToggles.forEach(toggle => toggle.addEventListener('click', toggleMobileNav));
        } catch(err) {
            console.error('DPI_SITE_NAV: Unable to binde events!', err);
        }
    }

    const cacheDom = () => {
        navToggles = document.querySelectorAll('.js-mobile-toggle');
    }

    const main = () => {
        cacheDom();
        bindEvents();
    }

    const ready = (...fnx) => {
        if (document.readyState !== 'loading') {
            fnx.forEach(fn => fn());
        } else {
            document.addEventListener('DOMContentLoaded', () => fnx.forEach(fn => fn()));
        }
    }

    return {
        init() {
            ready(main);
        }
    }

})();

export default dpiSiteNav;