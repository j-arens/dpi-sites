const locationsTabs = (function() {

    let root,
        tabs,
        btns;

    function toggleLocations(idx) {
        if (idx === undefined) return;

        tabs.forEach(tab => tab.classList.remove('welcome-locations__item--is-active'));
        tabs[idx].classList.add('welcome-locations__item--is-active');

        btns.forEach(btn => btn.classList.remove('welcome-locations__btn--is-active'));
        btns[idx].classList.add('welcome-locations__btn--is-active');
    }

    function handleClick() {
        const idx = btns.findIndex(btn => btn === this);
        toggleLocations(idx);
    }

    function bindEvents() {
        btns.forEach(btn => btn.addEventListener('click', handleClick));
    }

    function cacheDom() {
        try {
            root = document.getElementById('js-locations-root');
            tabs = Array.from(root.querySelectorAll('.js-locations-tab'));
            btns = Array.from(root.querySelectorAll('.js-locations-btn'));
        } catch(e) {
            console.error('LOCATIONS_TABS: Unable to bind events!', e);
        }
    }

    function main() {
        cacheDom();
        bindEvents();
    }

    function docReady(fn) {
        if (document.attachEvent ? document.readyState === "complete" : document.readyState !== "loading"){
            fn();
        } else {
            document.addEventListener('DOMContentLoaded', fn);
        }
    }

    return {
        init() {
            docReady(main);
        }
    }

})();

export default locationsTabs;