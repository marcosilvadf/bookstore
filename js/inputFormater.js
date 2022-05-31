function telFormatChange() {
    var tel = document.getElementById('tel');
    var tel1 = tel.value.replace(/[^0-9]/g, '')
    if (tel1.length == 11) {
        tel.value = tel1.replace(/^(\d{2})(\d{5})(\d{4})$/, "($1) $2-$3")
    }
}

function telFormato(event) {
    var tel = document.getElementById('tel');
    var telValor = document.getElementById('tel').value;
    switch (telValor.length) {
        case 0:
            tel.value += "("

            break;

        case 3:
            tel.value += ") "
            break;

        case 10:
            tel.value += "-"
            break;
    }
    return (event.charCode >= 48 && event.charCode <= 57);
}

function cpfFormato(event) {
    var cpf = document.getElementById('cpf');
    var cpfValor = document.getElementById('cpf').value;
    if (cpfValor.length == 3 || cpfValor.length == 7) {
        cpf.value += ".";
    }

    if (cpfValor.length == 11) {
        cpf.value += "-";
    }

    return (event.charCode >= 48 && event.charCode <= 57);
}

function cpfFormatChange() {
    var cpf = document.getElementById('cpf');
    var cpf1 = cpf.value.replace(/[^0-9]/g, '')
    if (cpf1.length == 11) {
        cpf.value = cpf1.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})$/, "$1.$2.$3-$4")
    }

}