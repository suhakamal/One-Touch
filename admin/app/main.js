/*
window.onscroll = function(){
    myfunction()
};
var NAV =document.getElementById("navbar");
var sticky = navbar.offsetTop;
function myfunction(){
    if(window.pageYOffset >= sticky){
        NAV.classList.add("sticky")
    } else {
        NAV.classList.remove("sticky")
    }
}
*/
function OpenMenu() {
    document.getElementById("navbar").style.display = "block";
    }

function CloseMenu() {
    document.getElementById("navbar").style.display = "none";
    }

    
$(document).ready(function(){
       $(".counter").counterUp({
           delay: 10,
           time: 1200
       });
   });