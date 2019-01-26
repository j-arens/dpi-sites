// import translator from '../translator';
import mobileSidebar from '../mobile-sidebar';
import debouncer from '../debouncer';
import dpiVideoPlayer from '../video-player';
// import zoom from '../zoom';

export default {
  init() {
    // JavaScript to be fired on all pages
    // translator.init();
    debouncer.init();
    // zoom.init();
    mobileSidebar.init();
    dpiVideoPlayer.init();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
