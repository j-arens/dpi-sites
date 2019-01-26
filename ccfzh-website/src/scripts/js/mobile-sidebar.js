const mobileSidebar = (function() {

  let toggleBtn,
      sidebar;

  let toggled = false;

  function init() {
    cacheDom();
    bindEvents();
  }

  function cacheDom() {
    toggleBtn = document.querySelector('.sidebar-toggle');
    sidebar = document.querySelector('.primary-sidebar');
  }

  function bindEvents() {
    try {
      toggleBtn.addEventListener('click', toggleSidebar);
    } catch(err) {
      if (err instanceof TypeError) {
        return;
      }
    }
  }

  function toggleSidebar() {
    if (!toggled) {
      toggleBtn.classList.add('active');
      sidebar.classList.add('sidebar-active');
      toggled = !toggled;
    } else {
      toggleBtn.classList.remove('active');
      sidebar.classList.remove('sidebar-active');
      toggled = !toggled;
    }
  }

  return {
    init: init
  }

})();

export default mobileSidebar;
