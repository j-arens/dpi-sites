const dpiSlideBg = (function() {

    let targets;

    function transitionWidth(parent) {
        const slide = parent.querySelector('.slide-bg-fx');
        const winst = setInterval(target => {
            if (parseFloat(target.style.width) !== 100) {
                target.style.width = `${(parseFloat(target.style.width) || 0) + 2}%`;
            } else {
                clearInterval(winst);
            }
        }, 1, slide);
    }

    function createSlide(dir) {
        const style = `style="position: absolute; height: 100%; width: 0; top: 0; ${dir}: 0;"`;
        const el = `<span class="slide-bg-fx" ${style}></span>`;
        return document.createRange().createContextualFragment(el);
    }

    function appendSlide(e) {
        if (!this.classList.contains('slide-active')) {
            const width = this.offsetWidth;
            const middle = (this.getBoundingClientRect().left + document.body.scrollLeft) + width / 2;
            const direction = e.clientX > middle ? 'right' : 'left';
            const slide = createSlide(direction);

            this.classList.add('slide-active');
            this.appendChild(slide);
            transitionWidth(this);
        }
    }

    function clearSlide(interval) {
        const slide = this.querySelector('.slide-bg-fx');

        const inst = setInterval((parent, slide) => {
            parent.removeChild(slide);
            parent.classList.remove('slide-active');
            clearInterval(inst);
        }, interval, this, slide);
    }

    function bindEvents() {
        try {
            targets.forEach(target => {
                target.addEventListener('mouseleave', clearSlide);
                target.addEventListener('mouseenter', appendSlide);
            });
        } catch(err) {
            console.error('DPI Slide BG: Unable to bind events!', err);
        }
    }

    function cacheDom() {
        targets = Array.from(document.querySelectorAll('.slide-bg'));
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

export default dpiSlideBg;