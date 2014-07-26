function toggleMenu() {
   if( document.getElementById("category-menu").style.display != "block"){
    document.getElementById("category-menu").style.display = ("block");
    document.getElementById("category-menu").style.borderBottom =("thin solid #e2e2e2");
	document.getElementById("menu-pages-container-mobile").style.display =("block");
	document.getElementById("header").style["box-shadow"]=( "0px 4px 10px 0px rgba(50, 50, 50, 0.75)");
	}
	else{
	document.getElementById("category-menu").style.display = "none";
    document.getElementById("category-menu").style.borderBottom =("");
    document.getElementById("header").style["box-shadow"]=("");
    document.getElementById("menu-pages-container-mobile").style.display =("none");
	}
}

function toggleSearch() {
   if( document.getElementById("mobile-search-box").style.display != "block"){
    document.getElementById("mobile-search-box").style.display = ("block");
    }
    else{
    document.getElementById("mobile-search-box").style.display = "none";
    }
}
