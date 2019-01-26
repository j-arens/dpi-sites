import docReady from './utils/docReady';

const skipTo = (() => {

    let toggles;

    const getTop = (node) => {
        const rect = node.getBoundingClientRect();
        const doc = document.documentElement;
        return rect.top + window.pageYOffset - doc.clientTop;
    }

    const skipTo = (e) => {
        const anchor = e.target.dataset.anchor;
        
        if (!anchor) return;

        const target = document.getElementById(anchor);
        let compensation = 0;

        if (document.body.classList.contains('admin-bar')) {
            compensation += 32; // compensate for the wp admin bar
        }

        window.scrollTo(0, Math.round(getTop(target) + compensation));
    }

    const bindEvents = () => {
        toggles.forEach(toggle => toggle.addEventListener('click', skipTo));
    }

    const cacheDom = () => {
        toggles = Array.from(document.querySelectorAll('.js-skip-to'));
        
        if (!toggles.length) {
            return false;
        }

        return true;
    }

    const main = () => {
        if (cacheDom()) bindEvents();
    }

    return {
        init() {
            docReady(main);
        }
    }

})();

export default skipTo;