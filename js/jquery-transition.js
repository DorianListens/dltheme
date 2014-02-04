jQuery(function($){
$(document).ready(function() {
    $("#whole-right-side").css("display", "none");
    
    $("#whole-right-side").fadeIn(900);

    $("ul.vertical-nav > li > a").click(function(event){
        event.preventDefault();
        linkLocation = this.href;
        function redirectPage() {
        window.location = linkLocation;
    }
        $("#whole-right-side").fadeOut(500, redirectPage);      
    });
    $("a.fancylink").fancybox({
        maxWidth    : 400,
        maxHeight   : 900,
        minWidth    : 300,
        fitToView   : true,
        width       : '40%',
        height      : '85%',
        autoSize    : false,
        closeClick  : false,
        openEffect  : 'fade',
        closeEffect : 'fade'
    });
    
});
$('#contact-button').on("click", function() {
    ga('send', 'event', 'button', 'click', 'contact-button');
});


});

