export default function searchModal() {

    let modal,
        toggles;

    /**
     * Toggle the search modal open or closed
     * @param {object} e 
     */
    const toggleModal = (e) => {
        e.preventDefault();
        modal.classList.toggle('search-modal--is-hidden');
    }

    /**
     * Bind event listeners
     */
    const bindEvents = () => {
        toggles.forEach(toggle => toggle.addEventListener('click', toggleModal));
    }

    /**
     * Cache dom nodes
     */
    const cacheDom = () => {
        modal = document.getElementById('js-search-modal');

        try {
            toggles = Array.from(document.querySelectorAll('.js-search-toggle'));
            return true;
        } catch(err) {
            console.error('SEARCH_MODAL: Unable to cache working nodes!', err);
            return false;
        }
    }

    /**
     * Initialize component
     */
    const init = () => cacheDom() ? bindEvents() : 0;

    /**
     * Public methods
     */
    return  {
        init
    }

}