function cargarProducto(e) {
    var rows = document.getElementById('tbl').getElementsByTagName('tbody')[0].getElementsByTagName('tr')
    console.log(rows)
    for (i = 0; i < rows.length; i++) {
        console.log(e.which + "==" + e.keyCode)
        if (e.which == 13) {
            rows[i].onkeyup = function () {
                var fila = this.rowIndex
                var td = document.getElementById("tbl").rows[fila].cells[2]
                var cantidad = Number(td.getElementsByTagName('input')[0].value)
                document.getElementById("tbl").rows[fila].cells[4].innerHTML = cantidad * 2.50
            }
        }
    }
}