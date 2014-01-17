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
});