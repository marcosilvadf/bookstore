function showMenu(){
    var hide = document.querySelectorAll(".shMenu")
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