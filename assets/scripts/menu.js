jQuery(document).ready(function($) {


$(document).ready(function () {
    var $menu = $('#menu'),
      $menulink = $('.menu-link'),
      $wrap = $('#page-wrap');

    $menulink.click(function () {
        $menulink.toggleClass('active');
        $wrap.toggleClass('active');
        $('.bar').toggleClass('animate');
        return false;
    });

});

});