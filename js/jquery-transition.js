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
         
    
});

$(".fancylink").fancybox({
        maxWidth    : 800,
        maxHeight   : 600,
        fitToView   : false,
        width       : '70%',
        height      : '70%',
        autoSize    : false,
        closeClick  : false,
        openEffect  : 'fade',
        closeEffect : 'fade'
    });

});

