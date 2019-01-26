const contactFormHelper = (function() {

  let form,
      inputs;

  function init() {
    cacheDom();
    observe();
  }

  function cacheDom() {
    form = document.querySelector('form.wpcf7-form');
    inputs = form.querySelectorAll('input:not([type="submit"])');
  }

  function observe() {
    // cant do setTimeout inline b/c MutationObserver expects a callback
    const observer = new MutationObserver(wait);

    const observerConfig = {
      attributes: true,
      childList: false
    }

    observer.observe(form, observerConfig);
  }

  // it takes a sec for wpcf7 to change its classes
  function wait() {
    setTimeout(appendNotice, 100, inputs);
  }

  function appendNotice(inputs) {
    inputs.forEach((input) => {
      if (input.classList.contains('wpcf7-not-valid')) {
        input.value = `${input.getAttribute('name').replace('-', ' ')} is invalid`;
      }
    });
  }

  return {
    init: init
  }

})();

export default contactFormHelper;
