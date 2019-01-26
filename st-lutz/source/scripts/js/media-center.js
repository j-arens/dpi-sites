import docReady from './utils/docReady';

const mediaCenter = (() => {

    const state = {
        currentThumbnail: 0,
        root: null,
        thumbnails: null,
        links: null
    }

    const toggleThumbnail = (index) => {
        if (state.thumbnails[index] === 'undefined') return;

        state.thumbnails[state.currentThumbnail].classList.remove('media-center__thumbnail-active');
        state.thumbnails[index].classList.add('media-center__thumbnail-active');

        state.currentThumbnail = index;
    }

    const handleHover = (e) => {
        const index = state.links.indexOf(e.target);
        toggleThumbnail(index);
    }

    const bindEvents = () => {
        state.links.forEach(link => link.addEventListener('mouseenter', handleHover));
    }

    const cacheDom = () => {
        state.root = document.getElementById('js-media-center-root');
        
        try {
            state.thumbnails = Array.from(state.root.querySelectorAll('.media-center__link-thumbnail'));
            state.links = Array.from(state.root.querySelectorAll('.media-center__portal-item'));
        } catch(err) {
            console.error('MEDIA_CENTER: Unable to query nodes!', err);
            return false;
        }

        return true;
    }

    const main = () => {
        if (cacheDom()) {
            bindEvents();
        }
    }

    return {
        init() {
            docReady(main);
        }
    }

})();

export default mediaCenter;