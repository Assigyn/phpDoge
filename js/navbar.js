function checkScroll() {
    var startY = $('.navbar').height() * 1; //The point where the navbar changes in px

    if ($(window).scrollTop() > startY) {
        $('.navbar').addClass("scrolled");
        $('.navbar-default .navbar-nav>li>a').css('color','#333');
        $('.navbar-default .navbar-nav > .active > a').css('color','#fff');
    }
    else {
        $('.navbar').removeClass("scrolled");
        $('.navbar-default .navbar-nav>li>a').css('color','#fff');
    }
}