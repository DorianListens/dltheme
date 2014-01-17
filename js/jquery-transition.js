jQuery(function($){
$(document).ready(function() {
    $("#content").css("display", "none");
 
    $("#content").fadeIn(900);
 
    $("ul.vertical-nav > li > a").click(function(event){
        event.preventDefault();
        linkLocation = this.href;
        function redirectPage() {
        window.location = linkLocation;
    }
        $("#content").fadeOut(500, redirectPage);      
    });
         
    
});
});