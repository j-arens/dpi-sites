export default function subMenus($) {

    const state = {
        sliding: false
    }

    let siteNav,
        toggles;

    /**
     * Flip flop the sliding state value
     */
    const toggleSlidingState = () => {
        state.sliding = !state.sliding;
    }

    /**
     * Toggle a sub menu open or closed
     * @param {object} e 
     */
    function toggleSubMenu(e) {
        e.preventDefault();
        const parentItem = this.parentElement;

        if (!state.sliding) {
            parentItem.classList.toggle('submenu-active');
            $(parentItem).find('.sub-menu').slideToggle({start: toggleSlidingState, complete: toggleSlidingState});
        }
    }

    /**
     * Bind event listeners
     */
    const bindEvents = () => {
        toggles.map(toggle => toggle.addEventListener('click', toggleSubMenu));
    }

    /**
     * Cache dom nodes
     */
    const cacheDom = () => {
        siteNav = document.getElementById('js-site-nav');

        try {
            toggles = Array.from(siteNav.querySelectorAll('.js-submenu-toggle'));
            return true;
        } catch(err) {
            console.error('SUBMENUS: Unable to cache working nodes!', err);
            return false;
        }
    }

    /**
     * Initialize component
     */
    const init = () => cacheDom() ? bindEvents() : false;

    /**
     * Public methods
     */
    return {
        init
    }
}