var btnBuscar = document.getElementById('buscarPaciente');

function cargarContenido() {
  var xhr = new XMLHttpRequest();

   xhr.open("GET", "buscarPaciente.php", true);
   xhr.onreadystatechange = function() {
    
      if(xhr.readyState == 4 && xhr.status == 200) {
          console.log("Se cargo correctamente");
          var json = JSON.parse(xhr.responseText);
          var nombreP = document.getElementById('nombre');
          var apellidoP = document.getElementById('apellido');
          var cedulaP = document.getElementById('cedula');
          nombreP.innerHTML = json.nombre;
          apellidoP.innerHTML = json.apellido;
          cedulaP.innerHTML = json.cedula;
      } 
   };
   xhr.send(); 
}
btnBuscar.addEventListener('click', cargarContenido() );