(function($) {

  var $menuItemList;

  function observe() {
    if ($menuItemList.get(0)) {
      var observer = new MutationObserver(changeMeta);

      var observerConfig = {
        attributes: true,
        childList: true,
        characterData: true
      }

      observer.observe($menuItemList.get(0), observerConfig);
    }
  }

  function changeMeta() {
    $('.menu-item-').each(function() {
      $(this).find('.item-type').text('Custom Title');
      $(this).find('.field-link-target').css({display: 'none'});
    });
  }

  function cacheDom() {
    $menuItemList = $('#menu-to-edit');
  }

  function init() {
    cacheDom();
    changeMeta();
    observe();
  }

  init();

})(jQuery)
