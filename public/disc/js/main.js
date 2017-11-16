function positionFooter() {
    var StickyFooter = $("#footer");
    if ((( $(document.body).height() + StickyFooter.outerHeight()) < $ (window).height() && StickyFooter.css("position") === "fixed") || ($(document.body).height() < $(window).height() && StickyFooter.css("position") !== "fixed")) {
        StickyFooter.css({ position: "fixed", bottom: "0px" }); }
    else {
        StickyFooter.css({ position: "static" }); }
    }

jQuery(document).ready(function($){

    // Sticky Footer
    // positionFooter();
    // $(window).scroll(positionFooter);
    // $(window).resize(positionFooter);
    // $(window).load(positionFooter);

    // valid XHTML method of target_blank
        $('a[rel*=external]').click( function() {
            window.open(this.href);
            return false;
        });


	// superfish menus
	$('#mainmenu').superfish({
		autoArrows: false
	});

    // Create the dropdown base
    $("<select />").appendTo("#nav");

    // Create default option "Go to..."
    $("<option />", {
       "selected": "selected",
       "value"   : "",
       "text"    : "-- Navigation --"
    }).appendTo("#nav select");

    // Populate dropdown with menu items
    $("#nav a").each(function() {
     var el = $(this);
     var padding = "";
     for (var i = 0; i < el.parentsUntil('div > ul').length - 1; i++)
        padding += "-";
     $("<option />", {
        "value"   : el.attr("href"),
        "text"    : padding + el.text()
     })
    .appendTo("#nav select");
    });

    $("#nav select").change(function() {
      window.location = $(this).find("option:selected").val();
    });

    // prettyphoto
    // $("a[rel^='prettyPhoto']").prettyPhoto();


    // social links
    $('#social-link li a').each(function() {
        // initially set opacity to .5
        $(this).mouseenter( function() {
            $(this).stop().animate({ opacity: 1, top: "-3px" }, 'fast').css({ padding: '0px 0px 3px 0px' });
        })
        $(this).mouseleave( function() {
            $(this).stop().animate({ opacity: 0.5, top: "0px" }, 'fast').css({ padding: '0px' });
        });
    });

    // Expand Panel
    $("#open").click(function(){
        $("div#panel").slideDown("slow");
    });
    $("#altopen").click(function(){
        $("div#panel").slideDown("slow");
    });

    // Collapse Panel
    $("#close").click(function(){
        $("div#panel").slideUp("slow");
    });

    // Switch buttons from "Log In | Register" to "Close Panel" on click
    $("#toggle a").click(function () {
        $("#toggle a").toggle();
    });

// ready
});
