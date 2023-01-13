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
              Doctor
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
         <!--------------------------------COMIENZA FORM----------------------------->
          <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
              Editar pacientes
          </h4>
          <?php         
function connect(){
return new mysqli("localhost","root","","proyecto_final");
}
$con = connect();
$id = $_GET['id'];
$sql = "SELECT doctor.coddoc, doctor.dnidoc, doctor.nomdoc, doctor.apedoc, specialty.codespe, specialty.nombrees,doctor.sexo, doctor.telefo, doctor.fechanaci, doctor.correo, doctor.naciona, doctor.estado, doctor.fecha_create FROM doctor INNER JOIN specialty ON doctor.codespe = specialty.codespe  WHERE coddoc= '$id'";
$query  =$con->query($sql);
$data =  array();
if($query){
  while($r = $query->fetch_object()){
    $data[] = $r;
  }
}

?> 
<?php if(count($data)>0):?>
    <?php foreach($data as $d):?>
          <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form method="POST"  autocomplete="off" action="../../folder/doctor.php?id=<?php echo $d->coddoc; ?>"  role="form">
             
             <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">DNI</span>
                <input name="dnidoc" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="8" value="<?php echo $d->dnidoc; ?>" type="text"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Jane Doe"
                />
              </label>

              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nombres</span>
                <input name="nomdoc" value="<?php echo $d->nomdoc; ?>" type="text"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Cardiologia"
                />
              </label>

              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Apellidos</span>
                <input name="apedoc" value="<?php echo $d->apedoc; ?>" type="text"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Cardiologia"
                />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Especialidad
                </span>
                <select  name="codespe"  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                 <option value="<?php echo $d->codespe; ?>"><?php echo $d->nombrees; ?></option>

                 <?php 
 $dbhost = 'localhost';
 $dbname = 'proyecto_final';  
 $dbuser = 'root';                  
 $dbpass = '';                  
 
 try{
  
  $dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
  $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
 }catch(PDOException $ex){
  
  die($ex->getMessage());
 }
 $stmt = $dbcon->prepare('SELECT * FROM specialty');
        $stmt->execute();
        
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
            <option value="<?php echo $codespe; ?>"><?php echo $nombrees; ?></option>
            <?php
        }
        ?>
            ?>
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
                
                <input class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="sexo" type="radio" id="sexo" value="<?php echo $d->sexo; ?>" <?php echo ($d->sexo== 'Masculino') ?  "checked" : "" ;  ?>/>

                    <span class="ml-2">Masculino</span>
                  </label>

                  <label
                    class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400"
                  >
                  
                  <input class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="sexo" type="radio" id="sexo" value="<?php echo $d->sexo; ?>" <?php echo ($d->sexo== 'Femenino') ?  "checked" : "" ;  ?>/> 

                    <span class="ml-2">Femenino</span>
                  </label>
                </div>
              </div>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Teléfono</span>
                <input name="telefo" maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $d->telefo; ?>" type="text"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Jane Doe"
                />
              </label>

              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nacimiento</span>
                <input type="date" name="fechanaci" value="<?php echo $d->fechanaci; ?>" 
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  
                />
              </label>

              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Correo</span>
                <input name="correo" value="<?php echo $d->correo; ?>" type="email"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Jane Doe"
                />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Nacionalidad
                </span>
                <select  name="naciona"  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                 <option value="<?php echo $d->naciona; ?>"><?php echo $d->naciona; ?></option>
                  <option value="Peruana">Peruana</option>
                  <option value="Venezonlana">Venezonlana</option>

                 
                </select>
              </label>


               <footer
          class="flex flex-col items-center justify-end px-3 py-2 -mx-3 -mb-6 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
          <button
            @click="closeModal"
            class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
            Cancel
          </button>
          <button name="update2"
            class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Actualizar
          </button>
        </footer>

        </form>

          </div>
 <?php endforeach; ?>
  
    <?php else:?>
    <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
          No hay datos
        </span>
    <?php endif; ?>          
          </div>
<?php require '../template/footer.php';  ?>