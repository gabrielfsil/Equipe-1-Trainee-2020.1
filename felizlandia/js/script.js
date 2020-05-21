
window.onscroll = function() {myFunction()};

function myFunction() {
    var navbar = document.getElementById("navbar");
    var sy = window.pageYOffset;  //se tirar algumas dessas 2 variaves de dentro da função vai bugar, é bug da propria função offset
    var bgNavbar = navbar.style.backgroundColor;
    var navbarOpacity = 0.2 + sy/1100;
    console.log(sy);
    console.log(navbarOpacity);
    navbar.style.backgroundColor = "rgba(25, 67, 160, " + navbarOpacity + ")";
    //bgNavbar = 
  /*if (sy  >= 4000) {
    //navbar.style.opacity = "1";
    navbar.style.backgroundColor = "rgba(12, 93, 166, 1.0)";
    navbar.style.opacity = "0.9";
    console.log("entrou");
  } else 
      if(sy >= 3000){
        //navbar.style.opacity = "0.9";
        navbar.style.backgroundColor = "rgba(12, 93, 166, 0.9)";
      }
      else{
          if(sy >= 2000){
            //navbar.style.opacity = "0.8";
            navbar.style.backgroundColor = "rgba(12, 93, 166, 0.8)";
          }
          else{
              if(sy >= 1000){
                //navbar.style.opacity = "0.7";
                navbar.style.backgroundColor = "rgba(12, 93, 166, 0.7)";
              }
              else{
                //navbar.style.opacity = "0.6";
                navbar.style.backgroundColor = "rgba(12, 93, 166, 0.2)";
              }
          }
      }
    
  }*/
}