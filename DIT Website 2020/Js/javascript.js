// The dissolving animations
myID = document.getElementById("myID");
x = 0
var myScrollFunc = function () {
    var y = window.scrollY;
    var height = screen.height*0.3;
    if (y >= height && x == 0) {
        myID.className = "bottomMenu show"
        x = 1
    } else if (x == 0) {
        myID.className = "bottomMenu hide"
    }
};

myID1 = document.getElementById("myID1");
x1 = 0
var myScrollFunc1 = function () {
    var y1 = window.scrollY;
    var height1 = screen.height*0.61;
    if (y1 >= height1 && x1 == 0) {
        myID1.className = "bottomMenu show"
        x1 = 1
    } else if (x1 == 0) {
        myID1.className = "bottomMenu hide"
    }
};

myID2 = document.getElementById("myID2");
x2 = 0
var myScrollFunc2 = function () {
    var y2 = window.scrollY;
    var height2 = screen.height*0.93;
    if (y2 >= height2 && x2 == 0) {
        myID2.className = "bottomMenu show"
        x2 = 1
    } else if (x2 == 0) {
        myID2.className = "bottomMenu hide"
    }
};

// Page scrolling Event Listners for animation
window.addEventListener("scroll", myScrollFunc);
window.addEventListener("scroll", myScrollFunc1);
window.addEventListener("scroll", myScrollFunc2);

// Signup/Login opening and closing
// var t = "<?php print($HasErrors); ?>";

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

function openForm1() {
  document.getElementById("myForm1").style.display = "block";
}

function closeForm1() {
  document.getElementById("myForm1").style.display = "none";
}

// Javascript preventing form resubmit on refresh
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}

let dropdownBtn = document.querySelector('.dropbtn');
let menuContent = document.querySelector('#myDropdown');
dropdownBtn.addEventListener('click',()=>{
   if(menuContent.style.display===""){
      menuContent.style.display="block";
      dropdownBtn.style.background="#111";
   } else {
   	  dropdownBtn.style.background="";
      menuContent.style.display="";
   }
})

// Get the modal
var modalSignin = document.getElementById('id01');
var modalSignup = document.getElementById('id02');
var modalForgot = document.getElementById('id03');
var modalEdit = document.getElementById('editID');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modalSignin) {
    modalSignin.style.display = "none";
  }
  else if (event.target == modalSignup) {
    modalSignup.style.display = "none";
  }
  else if (event.target == modalForgot) {
    modalForgot.style.display = "none";
  }
  else if (event.target == modalEdit) {
    // modalEdit.style.display = "none";
    window.location.replace("store.php?ready=1");
  }
}

function signupFunction() {
	document.getElementById('id01').style.display='none';
	document.getElementById('id02').style.display='block';
  document.getElementById('id03').style.display='none';
}

function forgotPasswordFunction() {
  document.getElementById('id01').style.display='none';
  document.getElementById('id02').style.display='none';
  document.getElementById('id03').style.display='block';
}

function signinFunction() {
	document.getElementById('id01').style.display='block';
	document.getElementById('id02').style.display='none';
  document.getElementById('id03').style.display='none';
}