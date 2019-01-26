const dpiSearch = (function() {

    let searchOverlay,
        searchBtns;

    /**
     * Toggle the search overlay
     */
    function toggleSearch() {
        searchOverlay.classList.toggle('active');
    }

    /**
     * Bind event listeners
     */
    function bindEvents() {
        try {
            searchBtns.forEach(btn => btn.addEventListener('click', toggleSearch));
        } catch(err) {
            console.error('DPI_SEARCH: Unable to bind events', err);
        }
    }

    /**
     * Cache nodes
     */
    function cacheDom() {
        searchOverlay = document.getElementById('search-overlay');
        searchBtns = document.querySelectorAll('.dpiSearch-toggle');
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

    /**
     * Public methods
     */
    return {
        init() {
            ready(main);
        }
    }

})();

export default dpiSearch;