const dpiSearch = (function() {

    const btns = [];
    let searchPanel;

    function toggleSearch() {
        if (searchPanel.classList.contains('active')) {
            searchPanel.classList.remove('active');
        } else {
            searchPanel.classList.add('active');
        }
    }

    function bindEvents() {
        try {
            btns.forEach(btn => btn.addEventListener('click', toggleSearch));
        } catch(err) {
            console.error('DPI Search: Unable to bind events!', err);
        }
    }

    function cacheDom() {
        searchPanel = document.querySelector('.search-overlay');
        btns.push(
            document.getElementById('search-btn'),
            document.getElementById('close-site-search'),
            document.querySelector('.nav-search-btn')
        );
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

export default dpiSearch;