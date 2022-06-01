var telefone = document.querySelector("input[type='tel']")

telefone.addEventListener("change", function(){
    var telefoneTMP = telefone.value.replace(/[^0-9]/g, '')
    if (telefoneTMP.length == 11) {
        telefone.value = telefoneTMP.replace(/^(\d{2})(\d{5})(\d{4})$/, "($1) $2-$3")
    }

    if (!(telefoneTMP.length == 11)){
        telefone.classList.add('error')
    }else{
        telefone.classList.remove('error')
    }
})

telefone.addEventListener("keypress", function (event){
    var tcl = event.keyCode || event.wich
    var telefoneTMP = telefone.value.replace(/[^0-9]/g, '')
    if(!(tcl >= 48 && tcl <= 57)){
        event.preventDefault()
    }

    if (!(telefoneTMP.length == 10)){
        telefone.classList.add('error')
        telefone.classList.remove('acept')
    }else{
        telefone.classList.remove('error')
        telefone.classList.add('acept')
    }

    switch (telefone.value.length) {
        case 0:
            telefone.value += "("
            break;

        case 3:
            telefone.value += ") "
            break;

        case 10:
            telefone.value += "-"
            break;
    }
})