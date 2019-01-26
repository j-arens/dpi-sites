const dpiMinistries = (function() {

    let root,
        navItems,
        tabs;

    const state = {
        activeTab: 0
    }

    function toggleTabs() {
        const idx = navItems.findIndex(item => item === this);

        if (idx !== state.activeTab) {

            navItems[state.activeTab].classList.remove('ministries__nav-item_active');
            tabs[state.activeTab].classList.remove('ministries__tabs-article_active');

            navItems[idx].classList.add('ministries__nav-item_active');
            tabs[idx].classList.add('ministries__tabs-article_active');

            state.activeTab = idx;
        }
    }

    function bindEvents() {
        try {
            navItems.forEach(item => item.addEventListener('click', toggleTabs));
        } catch(err) {
            console.error('DPI MINISTRIES: Unable to bind events!');
        }
    }

    function cacheDom() {
        root = document.querySelector('.ministries');
        navItems = Array.from(root.querySelectorAll('.ministries__nav-item'));
        tabs = root.querySelectorAll('.ministries__tabs-article');
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

export default dpiMinistries;