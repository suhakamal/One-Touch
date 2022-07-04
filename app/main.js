
/*window.onscroll = function(){
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
/*
const counters = document.querySelectorAll('.counter');

counters.forEach((counter) => {
    counter.innerText = '0';

    const updateCounter = () =>{
        const target = +counter .getAttribute
        ('data-target');
        const c = +counter.innerText;

        const increment = target / 300;
         
        if (c < target) {
            counter.innerText = `${Math.ceil( c + increment)}`;
            setTimeout(updateCounter, 1);
        } else {
            counter.innerText = target;
        }
    };
    updateCounter();
});

*/
$(document).ready(function(){
    $(".counter").counterUp({
        delay: 10,
        time: 1200
    });
});