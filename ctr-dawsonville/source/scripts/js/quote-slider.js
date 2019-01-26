const quoteSlider = (function() {

    const state = {
        activeIdx: 0,
        dom: {
            root: null,
            quotes: null,
            buttons: null
        }
    };

    /**
     * Transition to the next quote
     */
    function _slide(newIdx) {
        if (newIdx !== state.activeIdx) {
            const { dom, activeIdx } = state;

            clearInterval(window.quoteSliderIntId);
            [dom.quotes[activeIdx], dom.buttons[activeIdx]].forEach(node => node.classList.remove('active'));
            [dom.quotes[newIdx], dom.buttons[newIdx]].forEach(node => node.classList.add('active'));

            state.activeIdx = newIdx;
            _cycle();
        }
    }

    /**
     * Cycle to the next quote every 10 seconds
     */
    function _cycle() {
        window.quoteSliderIntId = setInterval(activeIdx => {
            if (activeIdx + 1 <= state.dom.quotes.length - 1) {
                _slide(activeIdx + 1);
            } else {
                _slide(0);
            }
        }, 10000, state.activeIdx);
    }

    /**
     * Route click events
     */
    function _handleClick(e) {
        if (e.target.dataset.idx) {
            _slide(parseInt(e.target.dataset.idx));
        }
    }

    /**
     * Setup event listeners
     */
    function _bindEvents() {
        try {
            state.dom.root.addEventListener('click', _handleClick);
        } catch(err) {
            console.error('DPI QUOTE SLIDER: Unable to bind events!', err);
        }
    }

    /**
     * Cache dom nodes
     */
    function _cacheDom() {
        state.dom.root = document.getElementById('quote-slider__root');
        state.dom.quotes = state.dom.root.querySelectorAll('.quote-slider__list-item');
        state.dom.buttons = state.dom.root.querySelectorAll('.quote-slider__nav-button');
    }

    /**
     * Kick it off
     */
    function _main() {
        _cacheDom();
        _bindEvents();
        _cycle();
    }

    /**
     * Dom ready
     */
    function _ready(fn) {
        if (document.readyState != 'loading'){
            fn();
        } else {
            document.addEventListener('DOMContentLoaded', fn);
        }
    }

    /**
     * Public methods
     */
    return {
        init() {
            return _ready(_main);
        }
    }

})();

export default quoteSlider;