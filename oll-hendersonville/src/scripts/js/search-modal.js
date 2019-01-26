const dpiSearchModal = (function() {

    let toggles,
        searchModal;

    function toggleSearchModal() {
        searchModal.classList.toggle('searchmodal__container-active');
    }

    function bindEvents() {
        try {
            toggles.forEach(toggle => toggle.addEventListener('click', toggleSearchModal));
        } catch(err) {
            console.error('DPI SEARCH MODAL: Unable to bind events!');
        }
    }

    function cacheDom() {
        toggles = Array.from(document.querySelectorAll('.searchmodal__toggle'));
        searchModal = document.querySelector('.searchmodal__container');
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

export default dpiSearchModal;