/*automatic navigation - slide*/
var counter = 1;
    setInterval(function(){
        document.getElementById('radio' + counter).checked = true;
        counter ++;
        if (counter > 4){
            counter = 1;
         }
    }, 5000);

window.addEventListener('scroll', reveal);

function reveal(){
    var reveals = document.querySelectorAll('.reveal');

    for(var i = 0; i < reveals.length; i++){

        var windowheight = window.innerHeight;
        var revealtop = reveals[i].getBoundingClientRect().top;
        var revealpoint = 150;

        if( revealtop < windowheight - revealpoint ){
            reveals[i].classList.add('active');
        }
        else{
            reveals[i].classList.remove('active');
        }
    }
}