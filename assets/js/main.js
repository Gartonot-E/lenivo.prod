let headerBlock = document.querySelector('header.header');

window.addEventListener('scroll', function () {
	if(pageYOffset >= 100){
		console.log(pageYOffset);
		headerBlock.style.background = "rgba(0,0,0, .5)";
	} else {
		headerBlock.style.background = "none";
	}
});


