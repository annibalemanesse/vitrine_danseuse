'use strict';

$(document).ready(function() {

    /***Affichage responsive en JS */
    if (window.matchMedia("(min-width: 768px)").matches) {
        $(".menu").show();
        $( ".cross" ).hide();
        $( ".hamburger" ).hide();
      } else {

        /***Menu hamburger en version mobile */
            $( ".cross" ).hide();
            $( ".menu" ).hide();
            $( ".hamburger" ).click(function() {
                $( ".menu" ).slideToggle( "slow", function() {
                    $( ".hamburger" ).hide();
                    $( ".cross" ).show();
                });
            });
            
            $( ".cross" ).click(function()
            {
                $( ".menu" ).slideToggle( "slow", function()
                {
                    $( ".cross" ).hide();
                    $( ".hamburger" ).show();
                });
            });

        /***Déroulement du sous-menu en version mobile */
         $(".drop-down").click(function()
         {
                $(".drop-down>.sous-menu").not($(this).children('.sous-menu').toggle()).hide();
            })
    }
})


