
     <form action="utilidades/registrarPaciente.php" method="POST">
        <h1>Registrar Pacente</h1>
        <input type="text"      placeholder="Nombre"    name="nombre"    id="nombre" required>
        <input type="text"      placeholder="Apellido"  name="apellido"  id="apellido" required><br>
        <input type="number" placeholder="Cedula"    name="cedula"    id="cedula" required>
        <input type="number" placeholder="Telefono"  name="telefono"  id="telefono" required>
        <input type="text"      placeholder="Direccion" name="direccion" id="direccion" required>
        <br>
        <button type="submit" class="savebtn" ><b> Guardar</b></button>
        <button type="reset" onclick="hide()" class="savebtn cancelbtn"  ><b>Cancelar</b></button>
     </form>
<script src="js/jquery.js"></script>

<script>

function hide(){
;
    $(".registro").hide();
}

</script>
