let headerBlock = document.querySelector('header.header');

window.addEventListener('scroll', function () {
	if(pageYOffset >= 100){
		headerBlock.style.background = "rgba(0,0,0, .5)";
	} else {
		headerBlock.style.background = "none";
	}
});