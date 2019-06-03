function cargarProducto(val) {
    var rows = document.getElementById('tbl').getElementsByTagName('tbody')[0].getElementsByTagName('tr')
    for (i = 0; i < rows.length; i++) {
        rows[i].onclick = function () {
            var fila = this.rowIndex
            var td = document.getElementById("tbl").rows[fila].cells[2]
            var cantidad = Number(td.getElementsByTagName('input')[0].value)
            var precio = document.getElementById("tdp"+val).innerText
            console.log(precio)
            document.getElementById("tbl").rows[fila].cells[4].innerHTML = cantidad*precio
        }
    }
}

function mas(val) {
    var cant = Number(document.getElementById("cant"+val).value)
    var ncant = cant + 1
    document.getElementById("cant"+val).value = ncant
    document.getElementById("cant"+val).focus == true
}

function menos(val) {
    var cant = Number(document.getElementById("cant"+val).value)
    var ncant = cant - 1
    if (ncant > 1) {
        document.getElementById("cant"+val).value = ncant
    } else {
        document.getElementById("cant"+val).value = 1
    }
    document.getElementById("cant"+val).focus == true
}