const dpiSwatcher = (function() {

  let buttons,
      covers

  function swatch() {
    covers.forEach(cover => cover.classList.remove('active'));
    covers[this.dataset.cover].classList.add('active');
  }

  function bindEvents() {
    try {
      buttons.forEach(btn => btn.addEventListener('mouseenter', swatch));
    } catch(err) {
      console.error('DPI Swatcher: Unable to bind events!');
    }
  }

  function cacheDom() {
    buttons = Array.from(document.querySelectorAll('.home-media .button'));
    covers = Array.from(document.querySelectorAll('.home-media figure'));
  }

  function init() {
    cacheDom();
    bindEvents();
  }

  return {
    init() {
      if (document.readyState != 'loading') {
        init();
      } else {
        document.addEventListener('DOMContentLoaded', init);
      }
    }
  }
})();

export default dpiSwatcher;
