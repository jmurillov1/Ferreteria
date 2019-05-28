function previewImage(nb) {
  var reader = new FileReader()
  reader.readAsDataURL(document.getElementById('uploadImage' + nb).files[0])
  reader.onload = function (e) {
    document.getElementById('uploadPreview' + nb).src = e.target.result
  }
}

function mas() {
  var cant = Number(document.getElementById("ctd").value)
  var ncant = cant + 1
  document.getElementById("ctd").value = ncant
}

function menos() {
  var cant = Number(document.getElementById("ctd").value)
  var ncant = cant - 1
  if (ncant > 1) {
    document.getElementById("ctd").value = ncant
  } else {
    document.getElementById("ctd").value = 1
  }
}