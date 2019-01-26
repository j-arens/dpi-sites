export default function quoteSlider() {

    let root,
        slides,
        buttons,
        intId;

    const state = {
        activeSlide: 0
    }

    const slide = (idx) => {
        if (idx === state.activeSlide || slides[idx] === 'undefined') return;

        clearInterval(intId);
        [buttons[state.activeSlide], slides[state.activeSlide]].forEach(node => node.classList.remove('active'));
        [buttons[idx], slides[idx]].forEach(node => node.classList.add('active'));

        state.activeSlide = idx;
        cycle();
    }

    const cycle = () => intId = setInterval(index => {

        if ((index + 1) <= (slides.length - 1)) {
            slide(index + 1);
        } else {
            slide(0);
        }

    }, 10000, state.activeSlide);

    const handleClick = (e) => {
        if (e.target.dataset.idx) {
            slide(parseInt(e.target.dataset.idx));
        }
    }

    const bindEvents = () => {
        root.addEventListener('click', handleClick);
    }

    const cacheDom = () => {
        root = document.getElementById('js-quote-slider');

        try {
            slides = Array.from(root.querySelectorAll('.quote-slider__list-item'));
            buttons = Array.from(root.querySelectorAll('.quote-slider__nav-button'));
            return true;
        } catch(err) {
            console.error('QUOTE_SLIDER: Unable to cache working nodes!', err);
            return false;
        }
    }

    const init = () => {
        if (cacheDom()) {
            bindEvents();
            cycle();
        }
    }

    return {
        init
    }

}