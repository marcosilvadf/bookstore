function showMenu(){
    var hide = document.querySelectorAll(".shMenu")
    var btnMenu = document.querySelector("#btnMenu")
    btnMenu.classList.toggle("hide")
    hide[0].classList.toggle("hide")
    var i = 1
    const timer = setInterval(function() {
        if (i >= hide.length) {
          clearInterval(timer)
        }
        hide[i].classList.toggle("hide")
        i++
      }, 100)
}

function showMenuProf(){
  var hide = document.querySelector("#optmenu");
  hide.classList.toggle("hide")
}