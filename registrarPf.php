
  
     <form action="utilidades/registrarPaciente.php" method="POST">
        <h1>Nuevo Pacente</h1>
        <input type="text"      placeholder="Nombre"    name="nombre"    id="nombre" required>
        <input type="text"      placeholder="Apellido"  name="apellido"  id="apellido" required><br>
        <input type="text" placeholder="Cedula"    name="cedula"    id="cedula" required>
        <input type="text" placeholder="Telefono"  name="telefono"  id="telefono" required>
        <input type="text"      placeholder="Direccion" name="direccion" id="direccion" required>
        <br>
        <button type="submit" class="savebtn" ><b> Guardar</b></button>
        <button type="reset" class="savebtn cancelbtn"  ><b>Limpiar</b></button>
     </form>

