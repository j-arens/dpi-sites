export default function featuredLinks() {

    // dom nodes
    let root,
        portals,
        cards;

    // component state
    const state = {
        currentIndex: 0
    }

    /**
     * Append active class to portals and cards
     * @param {int} index 
     */
    const appendActiveClass = (index) => {
        portals[index].classList.add('featured-links__portal--active');
        cards[index].classList.add('featured-links__portal-card--active');
    }

    /**
     * Remove active class from portals and cards
     * @param {int} index 
     */
    const removeActiveClass = (index) => {
        portals[index].classList.remove('featured-links__portal--active');
        cards[index].classList.remove('featured-links__portal-card--active');
    }

    /**
     * Toggle featured item card & portal, update state
     */
    function toggleItem() {
        const index = portals.indexOf(this);

        if (state.currentIndex === index) return;

        removeActiveClass(state.currentIndex);
        appendActiveClass(index);

        state.currentIndex = index;
    }

    /**
     * Bind event listeners
     */
    const bindEvents = () => {
        portals.forEach(portal => portal.addEventListener('click', toggleItem));
    }

    /**
     * Cache dom nodes
     */
    const cacheDom = () => {
        root = document.getElementById('js-featured-links-root');

        try {
            portals = Array.from(root.querySelectorAll('.js-featured-links-portal'));
            cards = Array.from(root.querySelectorAll('.js-featured-links-card'));
        } catch(err) {
            console.error('FEATURED_LINKS: Unable to cache working nodes!', err);
            return false;
        }

        return true;
    }

    /**
     * Initialize component
     */
    const init = () => cacheDom() ? bindEvents() : 0;

    /**
     * Public methods
     */
    return {
        init
    }
}