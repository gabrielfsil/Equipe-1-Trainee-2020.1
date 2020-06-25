
window.onscroll = function() {myFunction()};

window.onresize = function(){opaco()};


function myFunction() 
{
    var navbar = document.getElementById("navbar");

    if(window.innerWidth  >767 || !(navbar.classList.contains('nav-admin')))//se for tela grande ou se não for navbar admin
    {
      console.log('tela grande ou não é navbar admin');
      var sy = window.pageYOffset;  //se tirar algumas dessas 2 variaves de dentro da função vai bugar, é bug da propria função offset
      var bgNavbar = navbar.style.backgroundColor;
      var navbarOpacity = 0.2 + sy/200;
      navbar.style.backgroundColor = "rgba(25, 67, 160, " + navbarOpacity + ")";

      var s = $("nav");
        if(sy > 0)
        {
          s.addClass("teste");
        }
        else
        {
          s.removeClass("teste");
        }
      }

}


function opaco() {
 // console.log(screen.width);
  var navbar = document.getElementById("navbar");
    if(window.innerWidth <767 && (navbar.classList.contains('nav-admin')))
   {

    navbar.style.backgroundColor = "rgb(25, 67, 160)";
   }
   else{
    navbar.style.backgroundColor = "rgba(25, 67, 160,0.2)";

   }
 
 
}