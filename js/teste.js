function showMenu(){
var hide = document.querySelectorAll(".shMenu")
var btnMenu = document.querySelector("#btnMenu")
btnMenu.classList.toggle("hide")
hide[0].classList.toggle("hide")
var i = 1
const timer = setInterval(function() {
    if (i >= hide.length - 1) {
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
      if (i >= hide.length - 1) {
      clearInterval(timer)
      }
    hide[i].classList.toggle("hide")
    i++
  }, 100)
}

var escuro = document.querySelector('#escuro')
var body = document.querySelector('body')
var li = document.querySelectorAll('a')
var span = document.querySelectorAll('span')  

var btnModal = document.querySelectorAll('.btnModal')

for (let i = 0; i < btnModal.length; i++) {
  btnModal[i].addEventListener('click', function(){
      modal[i].classList.remove('show')
      
  })
}

var foto = document.querySelectorAll('.foto')
var modal = document.querySelectorAll('.modal')
  for (let i = 0; i < foto.length; i++) {
    foto[i].addEventListener('click', function(){
      modal[i].classList.add('show')
    }) 
  }