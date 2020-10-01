
$(function() {

    var set = function() {
        var width = (window.innerWidth > 0) ? window.innerWidth : this.screen.width;
        if (width < 1100) {
            $("body").addClass("mini-sidebar");

        } else {
            $("body").removeClass("mini-sidebar");

        }
    };
    $(window).ready(set);
    $(window).on("resize", set);

    // listen click event when open navigation in mobile view
    $(".nav-toggler").click(function() {
        $("body").toggleClass("show-sidebar");
    });

    // listen click event when open navigation in mobile view
    $(".body").click(function() {
        $("body").removeClass("mini-sidebar");
        // $("left-sidebar").hide();
    });

    $("body").trigger("resize");
});