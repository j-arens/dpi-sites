const dpiSearchModal = (function() {

    const buttons = [];
    let searchModal;

    function toggleModal() {
        if (this.dataset.action === 'open') {
            searchModal.classList.add('active');
        } else {
            searchModal.classList.remove('active');
        }
    }

    function bindEvents() {
        buttons.forEach(btn => btn.addEventListener('click', toggleModal));
    }

    function cacheDom() {
        searchModal = document.querySelector('.search-modal');
        buttons.push(
            document.getElementById('search-modal-open'),
            document.getElementById('search-modal-close')
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

export default dpiSearchModal;