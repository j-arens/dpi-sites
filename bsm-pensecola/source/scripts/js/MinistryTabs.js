export default class MinistryTabs {
    constructor() {
        this.state = {
            currentTab: 0,
            dom: {
                root: null,
                menuItems: null,
                tabs: null
            }
        }

        this.cacheDom();
        this.bindEvents();
    }

    toggleTab(idx = 0) {
        this.state.dom.tabs[this.state.currentTab].classList.remove('ministries__tab--active');
        this.state.dom.menuItems[this.state.currentTab].classList.remove('ministries__nav-item--active');

        this.state.dom.tabs[idx].classList.add('ministries__tab--active');
        this.state.dom.menuItems[idx].classList.add('ministries__nav-item--active');

        this.state.currentTab = idx;
    }

    handleActions(e) {
        const idx = this.state.dom.menuItems.indexOf(e.target);

        if (idx !== this.state.currentTab) {
            this.toggleTab(idx);
        }
    }

    bindEvents() {
        try {
            this.state.dom.menuItems.forEach(item => item.addEventListener('click', this.handleActions.bind(this)));
        } catch(err) {
            console.error('MINISTRY_TABS: unable to bind events!', err);
        }
    }

    cacheDom() {
        const dom = this.state.dom;
        dom.root = document.getElementById('js-ministries');
        dom.menuItems = Array.from(dom.root.querySelectorAll('.js-ministries-menu li'));
        dom.tabs = Array.from(dom.root.querySelectorAll('.js-ministries-tabs article'));
    }
}