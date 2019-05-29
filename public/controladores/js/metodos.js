function cargarProducto(pre) {
    var rows = document.getElementById('tbl').getElementsByTagName('tbody')[0].getElementsByTagName('tr')
    for (i = 0; i < rows.length; i++) {
        rows[i].onclick = function () {
            var fila = this.rowIndex
            var td = document.getElementById("tbl").rows[fila].cells[2]
            var cantidad = Number(td.getElementsByTagName('input')[0].value)
            document.getElementById("tbl").rows[fila].cells[4].innerHTML = cantidad
        }
    }
}

function mas() {
    var cant = Number(document.getElementById("cant").value)
    var ncant = cant + 1
    document.getElementById("cant").value = ncant
    document.getElementById("cant").focus == true
}

function menos() {
    var cant = Number(document.getElementById("cant").value)
    var ncant = cant - 1
    if (ncant > 1) {
        document.getElementById("cant").value = ncant
    } else {
        document.getElementById("cant").value = 1
    }
    document.getElementById("cant").focus == true
}