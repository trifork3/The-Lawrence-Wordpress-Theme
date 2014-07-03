function toggleMenu() {
   if( document.getElementById("category-menu").style.display != "block"){
    document.getElementById("category-menu").style.display = "block";
    document.getElementById("menu").style.borderBottom =("thick double #368f86");
	document.getElementById("overlay").style.opacity =("0.6");
	document.getElementById("overlay").style.zIndex =("150");
	document.getElementById("overlay").style.display =("block");
	document.getElementById("overlay").style.backgroundColor =("black");
	document.getElementById("overlay").style.position =("fixed");
	}
	else{
	document.getElementById("category-menu").style.display = "none";
    document.getElementById("menu").style.borderBottom =("");
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