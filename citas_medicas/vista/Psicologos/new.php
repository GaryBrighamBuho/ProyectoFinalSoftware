<?php
$opcion = "3";
$_GET["opcion"] = $opcion;
require '../vista/template/header.php';
?>
       
       <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              New Doctor
            </h2>
            <!-- CTA -->
            <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" style="cursor: pointer;">
              <div class="flex items-center">
                <svg
                  class="w-5 h-5 mr-2"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path>
                </svg>
                <span>Bienvenido a nuestro sistema  <?php echo ucfirst($_SESSION['nombre']); ?></span>
              </div>
             
            </a>
           <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form method="POST"  autocomplete="off" enctype="multipart/form-data"  role="form">
             
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">DNI</span>
                <input maxlength="8" name="dnidoc" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required="" type="text"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                />
              </label>

               <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nombres</span>
                <input name="nomdoc" type="text"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                 
                />
              </label>

               <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Apellidos</span>
                <input name="apedoc" type="text"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Especialidad
                </span>
                <select  name="codespe" id="espe" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                  <option>Selecione especialdiad</option>
                 
                </select>
              </label>

              <div class="mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Género
                </span>
                <div class="mt-2">
                  <label
                    class="inline-flex items-center text-gray-600 dark:text-gray-400"
                  >
                    <input name="sexo"
                      type="radio"
                      class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      name="sexo"
                      value="Masculino"
                    />
                    <span class="ml-2">Masculino</span>
                  </label>
                  <label
                    class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400"
                  >
                    <input name="sexo"
                      type="radio"
                      class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      name="sexo"
                      value="Femenino"
                    />
                    <span class="ml-2">Femenino</span>
                  </label>
                </div>
              </div>

              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Teléfono</span>
                <input name="telefo" maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required="" type="text"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                 
                />
              </label>

              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nacimiento</span>
                <input type="date" name="fechanaci"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  
                />
              </label>

              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Correo</span>
                <input name="correo" type="email"  required=""
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                 
                />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Nacionalidad
                </span>
                <select  name="naciona"  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                  <option>Selecione una nacionalidad</option>
                  <option value="Peruana">Peruana</option>
                  <option value="Venezolana">Venezolana</option>
                 
                </select>
              </label>

              <label class="block text-sm" style="display:none;">
                <span class="text-gray-700 dark:text-gray-400">Estado</span>
                <input name="estado" type="text"  value="1"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                 
                />
              </label>

               <footer
          class="flex flex-col items-center justify-end px-3 py-2 -mx-3 -mb-6 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
          <button
            onclick="window.location.href='../../folder/doctor.php'"
            class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
            Cancel
          </button>
          <button name="add"
            class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Agregar
          </button>
        </footer>

        </form>

          </div>
            
           
          </div>
<!--------------------------------COMIENZA NEW MODAL----------------------------->

   
        
</main>
      </div>
    </div>
    <script src="../../assets/js/funciones/espe.js"></script>
    <script src="../../assets/js/funciones/horario.js"></script>
    <?php
if(isset($_POST["add"])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto_final";

// Creamos la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Revisamos la conexión
if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   } 
$dnidoc=$_POST['dnidoc'];
$nomdoc=$_POST['nomdoc'];
$apedoc=$_POST['apedoc'];
$codespe=$_POST['codespe'];

$sexo=$_POST['sexo'];
$telefo=$_POST['telefo'];

$fechanaci=$_POST['fechanaci'];
$correo=$_POST['correo'];
$naciona=$_POST['naciona'];
$estado=$_POST['estado'];


// Realizamos la consulta para saber si coincide con uno de esos criterios
$sql = "select * from doctor where dnidoc='$dnidoc' or correo='$correo' or telefo='$telefo'";
$result = mysqli_query($conn, $sql);
?>


<?php
 // Validamos si hay resultados
 if(mysqli_num_rows($result)>0)
 {
        // Si es mayor a cero imprimimos que ya existe el usuario
      
        if($result){
   ?>

        <script type="text/javascript">

Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Ya existe el registro a agregar!'
 
})

</script>
    <?php
    }
 }
 else
 {
// Si no hay resultados, ingresamos el registro a la base de datos
$sql2 = "INSERT INTO doctor(dnidoc,nomdoc,apedoc,codespe,sexo,telefo,fechanaci,correo,naciona,estado)VALUES ('$dnidoc','$nomdoc','$apedoc','$codespe','$sexo','$telefo','$fechanaci','$correo','$naciona','$estado')";


if (mysqli_query($conn, $sql2)) {
      
       if($sql2){
   ?>

        <script type="text/javascript">
             
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Agregado correctamente',
  showConfirmButton: false,
  timer: 1500
}).then(function() {
            window.location = "../../folder/doctor.php";
        });
        </script>

    <?php
    }
    else{
       ?>
       <script type="text/javascript">
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'No se pudo guardar!'
 
})
       </script>
       <?php

    }
    
} else {
      
       echo "Error: " . $sql2 . "" . mysqli_error($conn);
}

}
// Cerramos la conexión
$conn->close();

}
?>
  </body>
</html>