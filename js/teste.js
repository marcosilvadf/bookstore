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

var i = 0

var a = 2
var b = 3
var c = 4
var d = 0
var e = 1

const item = document.querySelectorAll('.carItem')
item[0].classList.remove('ar'+ e)
  item[1].classList.remove('ar'+ d)
  item[2].classList.remove('ar'+ c)
  item[3].classList.remove('ar'+ b)
  item[4].classList.remove('ar'+ a)
  a++
  b++
  c++
  d++
  e++
  if(a > 4){
    a = 0
  }
  if(b > 4){
    b = 0
  }
  if(c > 4){
    c = 0
  }
  if(d > 4){
    d = 0
  }
  if(e > 4){
    e = 0
  }
  item[a].style.transform = 'perspective(500px) translate3d(-8px, 0px, 50px) rotate3d(0, -1, 0, 40deg)'
  item[b].style.transform = 'perspective(500px) translate3d(-15px, 0px, 100px) rotate3d(0, -1, 0, 20deg)'
  item[c].style.transform = 'perspective(500px) translate3d(0px, 0px, 150px) rotate3d(0, 0, 0, 40deg)'
  item[d].style.transform = 'perspective(500px) translate3d(15px, 0px, 100px) rotate3d(0, 1, 0, 20deg)'
  item[e].style.transform = 'perspective(500px) translate3d(8px, 0px, 50px) rotate3d(0, 1, 0, 40deg)'
  item[0].classList.add('ar'+ e)
  item[1].classList.add('ar'+ d)
  item[2].classList.add('ar'+ c)
  item[3].classList.add('ar'+ b)
  item[4].classList.add('ar'+ a)

  setInterval(function (){
    item[0].classList.remove('ar'+ e)
    item[1].classList.remove('ar'+ d)
    item[2].classList.remove('ar'+ c)
    item[3].classList.remove('ar'+ b)
    item[4].classList.remove('ar'+ a)
    a++
    b++
    c++
    d++
    e++
    if(a > 4){
      a = 0
    }
    if(b > 4){
      b = 0
    }
    if(c > 4){
      c = 0
    }
    if(d > 4){
      d = 0
    }
    if(e > 4){
      e = 0
    }
    item[a].style.transform = 'perspective(500px) translate3d(-8px, 0px, 50px) rotate3d(0, -1, 0, 40deg)'
    item[b].style.transform = 'perspective(500px) translate3d(-15px, 0px, 100px) rotate3d(0, -1, 0, 20deg)'
    item[c].style.transform = 'perspective(500px) translate3d(0px, 0px, 150px) rotate3d(0, 0, 0, 40deg)'
    item[d].style.transform = 'perspective(500px) translate3d(15px, 0px, 100px) rotate3d(0, 1, 0, 20deg)'
    item[e].style.transform = 'perspective(500px) translate3d(8px, 0px, 50px) rotate3d(0, 1, 0, 40deg)'
    item[0].classList.add('ar'+ e)
    item[1].classList.add('ar'+ d)
    item[2].classList.add('ar'+ c)
    item[3].classList.add('ar'+ b)
    item[4].classList.add('ar'+ a)
  }, 2000)