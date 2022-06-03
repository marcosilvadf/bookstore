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
  var hide = document.querySelectorAll(".hPerfil")
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

var body = document.querySelector("body")
body.addEventListener('click', function(){
  var item = document.querySelectorAll('.carItem img')
    if(item[1].style.width == '150px'){
      item[1].style.width = '100px'
      item[1].style.transition = 'all 0.5s'
    }else{
      item[1].style.width = '150px'
      item[1].style.transition = 'all 0.5s'
    }
  
})