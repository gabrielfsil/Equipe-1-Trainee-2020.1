
window.onscroll = function() {myFunction()};

function myFunction() {
    var navbar = document.getElementById("navbar");
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

function opaco() {
  var navbar = document.getElementById("navbar");
 if (window.pageYOffset<160)
 {
  if(navbar.style.backgroundColor !== "rgb(25, 67, 160)")
  {
   navbar.style.backgroundColor = "rgb(25, 67, 160)";
 
 
  }
  else
  {
 
   navbar.style.backgroundColor = "rgba(25, 67, 160, 0.2)";
 
  }
 }


 


}