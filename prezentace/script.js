//Views counter
const countEl = document.getElementById('counter');

updateVisitCount();

function updateVisitCount() {
	fetch('https://api.countapi.xyz/update/prezentace/counter?amount=1')
	.then(res => res.json())
	.then(res => {
		countEl.innerHTML = res.value;
	})
}

//Popup menu

item1 = document.getElementById("popup__item1");
item1.addEventListener("click", schovejmenu);
item2 = document.getElementById("popup__item2");
item2.addEventListener("click", schovejmenu);
item3 = document.getElementById("popup__item3");
item3.addEventListener("click", schovejmenu);
item4 = document.getElementById("popup__item4");
item4.addEventListener("click", schovejmenu);
item5 = document.getElementById("popup__item5");
item5.addEventListener("click", schovejmenu);
item6 = document.getElementById("popup__item6");
item6.addEventListener("click", schovejmenu);
item7 = document.getElementById("popup__item7");
item7.addEventListener("click", schovejmenu);
item8 = document.getElementById("popup__item8");
item8.addEventListener("click", schovejmenu);
item9 = document.getElementById("popup__item9");
item9.addEventListener("click", schovejmenu);
item10 = document.getElementById("popup__item10");
item10.addEventListener("click", schovejmenu);
item11 = document.getElementById("popup__item11");
item11.addEventListener("click", schovejmenu);
item12 = document.getElementById("popup__item12");
item12.addEventListener("click", schovejmenu);
item13 = document.getElementById("popup__item13");
item13.addEventListener("click", schovejmenu);
item14 = document.getElementById("popup__item14");
item14.addEventListener("click", schovejmenu);
item15 = document.getElementById("popup__item15");
item15.addEventListener("click", schovejmenu);
item16 = document.getElementById("popup__item16");
item16.addEventListener("click", schovejmenu);
item17 = document.getElementById("popup__item17");
item17.addEventListener("click", schovejmenu);
item18 = document.getElementById("popup__item18");
item18.addEventListener("click", schovejmenu);
item19 = document.getElementById("popup__item19");
item19.addEventListener("click", schovejmenu);
item20 = document.getElementById("popup__item20");
item20.addEventListener("click", schovejmenu);
item21 = document.getElementById("popup__item21");
item21.addEventListener("click", schovejmenu);
// item15 = document.getElementById("popup__item15");
// item15.addEventListener("click", schovejmenu);
// item16 = document.getElementById("popup__item16");
// item16.addEventListener("click", schovejmenu);
// item17 = document.getElementById("popup__item17");
// item17.addEventListener("click", schovejmenu);
// item18 = document.getElementById("popup__item18");
// item18.addEventListener("click", schovejmenu);
// item18 = document.getElementById("popup__item19");
// item18.addEventListener("click", schovejmenu);

let a = 0;
let visible = false;

tlacitko = document.getElementById("popup");
tlacitko.addEventListener("click", ukazmenu);

menu = document.getElementById("popupmenu");

mainSec = document.getElementById("main-sec");
mainSec.addEventListener("click",schovejmenu2);

function ukazmenu() {
  a++;
  if (a % 2 == 1){
    menu.style.display = "flex";
    visible = true;
  }
  else{
    menu.style.display = "none";
    visible = false;
  }
};

function schovejmenu() {
  menu.style.display = "none";
  a++;
}

function schovejmenu2() {
  if (visible == true){
    menu.style.display = "none";
    a++;
  }
}

//Get the button:
mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
