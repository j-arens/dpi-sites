export default function categoryPicker() {

    let component,
        dropdown;

    /**
     * Get the current domain and append a category query var if a category is selected
     * @param {int/string} cat 
     */
    const nextUrl = (cat) => {
        const domain = window.location.hostname;
        const path = window.location.pathname;
        const pattern = /(\/page\/\d+\/)/g;

        if (cat === 'filter_none') {
            return `${domain}${path.replace(pattern, '')}`;
        }

        return `${domain}${path.replace(pattern, '')}?cat=${cat}`;
    }

    /**
     * change the url show results for the selected category
     */
    function filterCat() {
        window.location.href = `//${nextUrl(this.value)}`;
    }

    /**
     * Bind event listeners
     */
    const bindEvents = () => {
        dropdown.addEventListener('change', filterCat);
    }

    /**
     * Cache dom nodes
     */
    const cacheDom = () => {
        component = document.getElementById('cat-filter-js');
        
        try {
            dropdown = component.querySelector('.cat-filter-dropdown-js');
            return true;
        } catch(err) {
            console.error('CATEGORY_PICKER: Unable to cache working nodes!', err);
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
    return {
        init
    }

}