// change css zoom on body, 1, 1.1, and 1.2
const zoom = (function() {

  let body,
      fontSizer;

  function init() {
    cacheDom();
    bindEvents();
  }

  function cacheDom() {
    body = document.querySelector('body');
    fontSizer = document.getElementById('zoom');
  }

  function bindEvents() {
    try {
      fontSizer.addEventListener('click', zoom);
    } catch(err) {
      if (err instanceof TypeError) {
        return;
      }
    }
  }

  function zoom(e) {
    if (e.target.dataset.zoom) {
      // body.style.zoom = `${e.target.dataset.zoom}`; - can't use zoom  b/c of firefox, safari, and opera
      body.style.transform = `scale(${e.target.dataset.zoom})`;
    }
  }

  function ready(fn) {
    if (document.readyState != 'loading') {
      fn();
    } else {
      document.addEventListener('DOMContentLoaded', fn);
    }
  }

  return {
    init() {
      ready(init);
    }
  }

})();

export default zoom;
