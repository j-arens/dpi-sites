const dpiReveal = (function() {

    let reveal,
        tabs,
        links,
        mobileBtns;

    function toggleDesktop(e) {
        const tabTarget = links.indexOf(e.target) % 4;

        links.forEach(link => link.classList.remove('active'));
 
        tabs.forEach(tab => {
            const tabLinks = Array.from(tab.querySelectorAll('.reveal-nav-link'));
            tabLinks[tabTarget].classList.add('active');
            tab.classList.remove('active', 'fadeIn', 'slideInLeft', 'slideInRight');
        });

        tabs[tabTarget].classList.add('active', 'fadeIn');
    }

    function toggleMobile(e) {
        const dir = e.target.dataset.direction;
        let current = tabs.indexOf(tabs.filter(tab => tab.classList.contains('active'))[0]);
        tabs.forEach(tab => tab.classList.remove('active', 'fadeIn', 'slideInLeft', 'slideInRight'));

        switch(dir) {
                case 'left':
                    tabs[current === 0 ? 3 : current - 1].classList.add('active', 'slideInLeft');
                    break;
                case 'right':
                    tabs[current === 3 ? 0 : current + 1].classList.add('active', 'slideInRight');
                    break;
            }
    }

    function handleClick(e) {
        const el = e.target.tagName;

        if (window.innerWidth > 768 && el === 'LI') {
            toggleDesktop(e);
        } else if (el === 'BUTTON') {
            toggleMobile(e);
        }
    }

    function bindEvents() {
        links.forEach(link => link.addEventListener('click', handleClick));
        mobileBtns.forEach(btn => btn.addEventListener('click', handleClick));
    }

    function cacheDom() {
        reveal = document.getElementById('parish-reveal');
        tabs = Array.from(reveal.querySelectorAll('.reveal-tab'));
        links = Array.from(reveal.querySelectorAll('.reveal-nav-link'));
        mobileBtns = Array.from(reveal.querySelectorAll('.btn-slide'));
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

export default dpiReveal;