const filterCat = (function() {

    let component,
        dropdown;

    function nextUrl(cat) {
        const domain = window.location.hostname;
        const path = window.location.pathname;
        const pattern = /(\/page\/\d+\/)/g;

        if (cat === 'filter_none') {
            return `${domain}${path.replace(pattern, '')}`;
        }

        return `${domain}${path.replace(pattern, '')}?cat=${cat}`
    }

    function filterCat() {
        window.location.href = `//${nextUrl(this.value)}`;
    }

    function bindEvents() {
        try {
            dropdown.addEventListener('change', filterCat);
        } catch(e) {
            console.error('FILTER_CAT: Unable to bind events!', e);
        }
    }

    function cacheDom() {
        component = document.getElementById('cat-filter-js');
        dropdown = component.querySelector('.cat-filter-dropdown-js');
    }

    function main() {
        cacheDom();
        bindEvents();
    }

    function docReady(fn) {
        if (document.attachEvent ? document.readyState === "complete" : document.readyState !== "loading"){
            fn();
        } else {
            document.addEventListener('DOMContentLoaded', fn);
        }
    }

    return {
        init() {
            docReady(main);
        }
    }

})();

export default filterCat;