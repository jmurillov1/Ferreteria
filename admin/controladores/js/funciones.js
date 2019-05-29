var datos = []
function previewImage(nb) {
  var reader = new FileReader()
  reader.readAsDataURL(document.getElementById('uploadImage' + nb).files[0])
  reader.onload = function (e) {
    document.getElementById('uploadPreview' + nb).src = e.target.result
  }
}

function mas(cod) {
  var cant = Number(document.getElementById("ctd" + cod).value)
  var ncant = cant + 1
  document.getElementById("ctd" + cod).value = ncant
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

  if (cant != 0) {
    var ncant = Number(document.getElementById("ctd" + cod).value)
    tot = cant + ncant
    document.getElementById("sel").value = cant + ncant
    if (ncant == "") {
    } else {
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 & this.status == 200) {
          alert("llegue");
        }
      };
      xmlhttp.open("GET", "../controladores/añadir_carrito.php?codigo=" + cod + "&cantidad=" + ncant, true);
      xmlhttp.send();
    }
    return false;
  }
}
function cargar(){
  var se= document.getElementById("item").value
  console.log(se)
}

function val() {
  var cant = Number(document.getElementById("sel").value)
  console.log(cant)
}