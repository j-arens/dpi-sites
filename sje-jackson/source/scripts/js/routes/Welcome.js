import DpiMaps from '../gmaps';
import locationTabs from '../locations';

export default {
  init() {
    // JavaScript to be fired on all pages
    window.DpiMaps = new DpiMaps();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    locationTabs.init();
  },
};