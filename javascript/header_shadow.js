function theFunction(){
	if(jQuery(window).scrollTop() == 0){
	jQuery('.logo').css('padding-top', '100px');
	}
	else{
	jQuery('.header').css('box-shadow', '0px 0px 0px #888');
	}
}
