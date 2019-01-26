const dpiSlideOutMap = (function() {

    let slideOutToggle,
        mapContainer;

    function toggleSlideOut() {
        slideOutToggle.classList.toggle('active');
        mapContainer.classList.toggle('slideout');
        window.google.maps.event.trigger(window.map, 'resize');
    }
    
    function bindEvents() {
        try {
            slideOutToggle.addEventListener('click', toggleSlideOut);
        } catch(err) {
            console.error('DPI Map Slideout: Unable to bind events!', err);
        }
    }
    
    function cacheDom() {
        slideOutToggle = document.getElementById('slideout-toggle');
        mapContainer = document.querySelector('.site-footer-map');
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

export default dpiSlideOutMap;