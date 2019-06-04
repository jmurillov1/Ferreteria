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
  console.log("codigo: " + cod)
  if (cant == 0 || cant != 0) {
    var ncant = Number(document.getElementById("ctd" + cod).value)
    console.log("cantidad: " + ncant)
    document.getElementById("sel").value = cant + ncant
    if (ncant == "") {
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
        }
      }
      xmlhttp.open("GET", "../controladores/add_carrito.php?codigo=" + cod + "&cantidad=" + ncant, true)
      xmlhttp.send()
      return false
    }
  }
}

function actualizar(val) {
  var ncant = Number(document.getElementById("cant" + val).value)
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
  }
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 & this.status == 200) {
      //alert(this.responseText)
      var total = 0
      for (var i = 1; document.getElementById('tbl').rows[i]; i++) {
        total += Number(document.getElementById('tbl').rows[i].cells[5].innerHTML);
      }
      document.getElementById('tot').value = total.toFixed(2)
    }
  }
  xmlhttp.open("GET", "../controladores/actualizar_carrito.php?codigo=" + val + "&cantidad=" + ncant, true)
  xmlhttp.send()
  return false
}

function cargar(cod) {
  var se = document.getElementById("item" + cod).value
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
  }
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 & this.status == 200) {
      //alert("llegue")
    }
  };
  xmlhttp.open("GET", "../controladores/listar_productos_sucursal.php?codigo=" + cod, true)
  xmlhttp.send()
  return false
}

function val() {
  var cant = Number(document.getElementById("sel").value).toFixed(2)
  console.log(cant)
}

function cargarProducto(val) {
  var rows = document.getElementById('tbl').getElementsByTagName('tbody')[0].getElementsByTagName('tr')
  var precio = 1.00
  var cantidad = 0
  var sum = 0
  for (i = 0; i < rows.length; i++) {
    rows[i].onclick = function () {
      var fila = this.rowIndex
      var td = document.getElementById("tbl").rows[fila].cells[3]
      cantidad = Number(td.getElementsByTagName('input')[0].value).toFixed(2)
      precio = document.getElementById("tdp" + val).innerText
      document.getElementById("tbl").rows[fila].cells[5].innerHTML = Number(cantidad * precio).toFixed(2)
    }
  }
}

function mas1(val, stock) {
  var cant = Number(document.getElementById("cant" + val).value)
  var ncant = cant + 1
  if (ncant <= stock) {
    document.getElementById("cant" + val).value = ncant
  } else {
    document.getElementById("cant" + val).value = stock
  }
}

function menos1(val) {
  var cant = Number(document.getElementById("cant" + val).value)
  var ncant = cant - 1
  if (ncant > 1) {
    document.getElementById("cant" + val).value = ncant
  } else {
    document.getElementById("cant" + val).value = 1
  }
<<<<<<< HEAD
}

function eliminar(cod) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
  }
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 & this.status == 200) {
      //alert("llegue")
      document.getElementById('res').innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "../controladores/eliminar_item.php?codigo=" + cod, true)
  xmlhttp.send()
  return false
}

function listarps(cod) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
  }
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 & this.status == 200) {
      //alert("llegue")
      document.getElementById('info').innerHTML = this.responseText
    }
  }
  xmlhttp.open("GET", "../controladores/listar_producto_sucursal.php?codigo=" + cod, true)
  xmlhttp.send()
  return false
=======
}  

function buscarUsuario(){ 
  var nombre = document.getElementById("nombre").value;
  //location.href=  "../../controladores/user/buscar.php?correo="+correo
  if(nombre==""){ 
    /*document.getElementById("informacion").innerHTML=""; */
    location.href = "usuarios.php"
  }else{ 
      if(window.XMLHttpRequest) { 
          xmlhttp= new XMLHttpRequest(); 
      }else{ 
          xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
      } 
     xmlhttp.onreadystatechange= function(){ 
          if(this.readyState == 4 && this.status == 200){ 
              document.getElementById("informacion").innerHTML=this.responseText;
          }
      }; 
      xmlhttp.open("GET","../../controladores/admin/buscarUsuarios.php?nombre="+nombre,true); 
      xmlhttp.send();
  } 
  return false;
>>>>>>> 980e3771039b6515b4f308247d89cf1789bd4bb4
}