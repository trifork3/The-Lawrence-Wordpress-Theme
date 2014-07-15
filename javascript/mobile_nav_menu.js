function toggleMenu() {
   if( document.getElementById("menu-sections").style.display != "block"){
    document.getElementById("menu-sections").style.display = ("block");
    document.getElementById("category-menu").style.borderBottom =("thin solid #e2e2e2");
	document.getElementById("menu-pages-container-mobile").style.display =("block");
	document.getElementById("header").style["box-shadow"]=( "0px 4px 10px 0px rgba(50, 50, 50, 0.75)");
	}
	else{
	document.getElementById("menu-sections").style.display = "none";
    document.getElementById("category-menu").style.borderBottom =("");
    document.getElementById("header").style["box-shadow"]=("");
    document.getElementById("menu-pages-container-mobile").style.display =("none");
	}
}

/*
Use: display:block; and display:none;
var $logo = $('#logo-scroll');
$(document).scroll(function() {
    $logo.css({display: $(this).scrollTop()>100 ? "block":"none"});
});

var shadow = false;
function moveUp() {
    if(element.scrollTop == 0)
    {
        hideShadow();
    }
    else
    {
        showShadow()
    }
    visible = !visible;
}


function showShadow() {
    $("#header").css({'box-shadow: 0px 5px 10px #888888');
}
*/