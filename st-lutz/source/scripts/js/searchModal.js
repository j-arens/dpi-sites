import docReady from './utils/docReady';

const searchModal = (() => {

    let modal,
        toggles;

    const toggleModal = (e) => {
        e.preventDefault();
        modal.classList.toggle('search-modal--is-hidden');
    }

    const bindEvents = () => {
        try {
            toggles.forEach(toggle => toggle.addEventListener('click', toggleModal));
        } catch(e) {
            console.error('SEARCH_MODAL: Unable to bind events!', e);
        }
    }

    const cacheDom = () => {
        modal = document.getElementById('js-search-modal');
        toggles = Array.from(document.querySelectorAll('.js-search-toggle'));
    }

    const main = () => {
        cacheDom();
        bindEvents();
    }

    return {
        init() {
            docReady(main);
        }
    }

})();

export default searchModal;