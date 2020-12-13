let headerBlock = document.querySelector('header.header');

window.addEventListener('scroll', function () {
	if(pageYOffset >= 100){
		console.log(pageYOffset);
		headerBlock.style.background = "rgba(0,0,0, .8)";
	} else {
		headerBlock.style.background = "none";
	}
});

let fActive = '';
let btnAll = document.getElementById('all');
let btn1 = document.getElementById('1');
let btn2 = document.getElementById('2');
let btn3 = document.getElementById('3');
let btn4 = document.getElementById('4');
let btn5 = document.getElementById('5');
let btn6 = document.getElementById('6');
let btn7 = document.getElementById('7');

function filterButton(cat) {
	if (fActive !== cat) {
		$('.event').filter('.' + cat).slideDown(500, "linear");
		$('.event').filter(':not(.' + cat + ')').slideUp(500, "linear");
	}
}

btn1.onclick = function () {
	filterButton('1');
}
btn2.onclick = function () {
	filterButton('2');
}
btn3.onclick = function () {
	filterButton('3');
}
btn4.onclick = function () {
	filterButton('4');
}
btn5.onclick = function () {
	filterButton('5');
}
btn6.onclick = function () {
	filterButton('6');
}
btn7.onclick = function () {
	filterButton('7');
}
btnAll.onclick = function () {
	$('.event').slideDown();
 	fActive = 'all';
}