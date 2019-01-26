export default function tabbedReveal() {

    let root,
        tabs,
        navItems;

    const state = {
        currentTab: 0
    }

    const getActiveClass = node => {
        switch (node.tagName) {
            case 'ARTICLE':
                return 'tabbed__tab--active';
            case 'BUTTON':
                return 'tabbed__nav-item--active';
        }
    }

    const toggleTab = (idx = 0) => {
        if (idx === state.currentTab) return;

        [tabs[state.currentTab], navItems[state.currentTab]].forEach(node => node.classList.remove(getActiveClass(node)));
        [tabs[idx], navItems[idx]].forEach(node => node.classList.add(getActiveClass(node)));

        state.currentTab = idx;
    }

    function handleClick() {
        toggleTab(this.dataset.idx);
    }

    const bindEvents = () => {
        navItems.forEach(item => item.addEventListener('click', handleClick));
    }

    const cacheDom = () => {
        root = document.getElementById('js-tabbed-root');

        try {
            tabs = Array.from(root.querySelectorAll('.tabbed__tab'));
            navItems = Array.from(root.querySelectorAll('.tabbed__nav-item'));
            return true;
        } catch(err) {
            console.error('TABBED_REVEAL: Unable to cache working nodes!', err);
            return false;
        }
    }

    const init = () => cacheDom() ? bindEvents() : 0;

    return {
        init
    }

}