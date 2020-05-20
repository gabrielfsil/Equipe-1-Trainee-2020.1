
window.onscroll = function() {myFunction()};

function myFunction() {
    var navbar = document.getElementById("navbar");
    var sy = window.pageYOffset;  //se tirar algumas dessas 2 variaves de dentro da função vai bugar, é bug da propria função offset
  if (sy  >= 4000) {
    navbar.style.opacity = "1";
  } else {
      if(sy >= 3000){
        navbar.style.opacity = "0.9";
      }
      else{
          if(sy >= 2000){
            navbar.style.opacity = "0.8";
          }
          else{
              if(sy >= 1000){
                navbar.style.opacity = "0.7";
              }
              else{
                navbar.style.opacity = "0.6";
              }
          }
      }
    
  }
}