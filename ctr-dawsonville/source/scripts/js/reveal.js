const dpiReveal = (function() {

    const state = {
        currentActive: 0,
        dom: {
            root: null,
            navItems: null,
            items: null
        }
    }

    /**
     * Show/hide items and change active classes
     * @param {integer} idx 
     */
    function reveal(idx) {
        if (idx !== state.currentActive) {
            const { dom, currentActive } = state;

            [dom.navItems[currentActive], dom.items[currentActive]].forEach(node => node.classList.remove('active'));
            [dom.navItems[idx], dom.items[idx]].forEach(node => node.classList.add('active'));

            state.currentActive = idx;
        }
    }

    /**
     * Route click events
     * @param {object} e 
     */
    function handleClick(e) {
        if (e.target.dataset.idx) {
            reveal(parseInt(e.target.dataset.idx));
        }
    }

    /**
     * Bind event listeners
     */
    function bindEvents() {
        try {
            state.dom.root.addEventListener('click', handleClick);
        } catch(err) {
            console.error('DPI_REVEAL: Unable to bind events!', err);
        }
    }

    /**
     * Cache nodes
     */
    function cacheDom() {
        state.dom.root = document.getElementById('dpi-reveal__root');
        state.dom.navItems = state.dom.root.querySelectorAll('#dpi-reveal__nav li');
        state.dom.items = state.dom.root.querySelectorAll('#dpi-reveal__list li');
    }

    /**
     * Startup
     */
    function main() {
        cacheDom();
        bindEvents();
    }

    /**
     * Dom ready
     * @param {callback} fn 
     */
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

export default dpiReveal;