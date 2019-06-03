var datos = []
function previewImage(nb) {
  var reader = new FileReader()
  reader.readAsDataURL(document.getElementById('uploadImage' + nb).files[0])
  reader.onload = function (e) {
    document.getElementById('uploadPreview' + nb).src = e.target.result
  }
}

function mas(cod, stock) {
  var cant = Number(document.getElementById("ctd" + cod).value)
  var ncant = cant + 1
  if (ncant <= stock) {
    document.getElementById("ctd" + cod).value = ncant
  } else {
    document.getElementById("ctd" + cod).value = stock
  }
}

function menos(cod) {
  var cant = Number(document.getElementById("ctd" + cod).value)
  var ncant = cant - 1
  if (ncant > 1) {
    document.getElementById("ctd" + cod).value = ncant
  } else {
    document.getElementById("ctd" + cod).value = 1
  }
}

function agregar(cod) {
  var cant = Number(document.getElementById("sel").value)
  console.log(cod)
  if (cant == 0 || cant != 0) {
    var ncant = Number(document.getElementById("ctd" + cod).value)
    console.log(ncant)
    var cab = Number(document.getElementById("cab").value)
    console.log(cab)
    var suc = Number(document.getElementById("sucursal").value)
    console.log(suc)
    tot = cant + ncant
    document.getElementById("sel").value = cant + ncant
    location.href = "../controladores/anadir_carrito.php?codigo=" + cod + "&cantidad=" + ncant + "&cab=" + cab + "&suc=" + suc
    /*if (ncant == "") {
    } else {
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest()
      } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
      }
      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 & this.status == 200) {
          alert("llegue")
          console.log("Realizado")
        };
        xmlhttp.open("GET", "../controladores/anadir_carrito.php?codigo=" + cod + "&cantidad=" + ncant + "&cab=" + cab + "&suc=" + suc, true)
        xmlhttp.send()
      }
      return false*/
  }
}

function cargar(cod) {
  var se = document.getElementById("item" + cod).value
  console.log(se)
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
  }
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 & this.status == 200) {
      alert("llegue")
    }
  };
  xmlhttp.open("GET", "../controladores/listar_productos_sucursal.php?codigo=" + cod, true)
  xmlhttp.send()
  return false
}

function val() {
  var cant = Number(document.getElementById("sel").value)
  console.log(cant)
}

function cargarProducto(pre) {
  var rows = document.getElementById('tbl').getElementsByTagName('tbody')[0].getElementsByTagName('tr')
  for (i = 0; i < rows.length; i++) {
    rows[i].onclick = function () {
      var fila = this.rowIndex
      var td = document.getElementById("tbl").rows[fila].cells[3]
      var cantidad = Number(td.getElementsByTagName('input')[0].value)
      document.getElementById("tbl").rows[fila].cells[5].innerHTML = cantidad
    }
  }
}

function mas1() {
  var cant = Number(document.getElementById("cant1").value)
  var ncant = cant + 1
  document.getElementById("cant1").value = ncant
  document.getElementById("cant1").focus == true
}

function menos2() {
  var cant = Number(document.getElementById("cant1").value)
  var ncant = cant - 1
  if (cant > 1) {
    document.getElementById("cant1").value = ncant
  } else {
    document.getElementById("cant1").value = 1
  }
  document.getElementById("cant1").focus == true
}