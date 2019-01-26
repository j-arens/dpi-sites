//mobile menu
(function () {
    var $ = jQuery;
    $(document).ready(function () {
        //get li's that have nested menus
        var nestedMenu = $('.menu-item-has-children');
        var dropDowns;
        //animate the hamburger icon
        $('.menu-toggle').click(function () {
            $(this).find('.toggle-btn').toggleClass('close');
            $('.menu').slideToggle();
        });
        //append dropdown button to li's with nested ul's
        nestedMenu.each(function () {
            var trigger = document.createElement('DIV');
            var btn = document.createElement('BUTTON');
            trigger.className = 'trigger';
            btn.className = 'dropdown-toggle';
            trigger.appendChild(btn);
            $(this).append(trigger);
        });
        dropDowns = $('.trigger');
        //display nested menus on dropdown click
        dropDowns.click(function (e) {
            e.preventDefault();
            $(this).parent().find('> .sub-menu').slideToggle();
        });
    });
})();
