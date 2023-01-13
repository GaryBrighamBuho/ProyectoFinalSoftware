<?php
$opcion = "5";
$_GET["opcion"] = $opcion;
require '../template/header.php';
?>
       <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Profile
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

            <?php         
function connect(){
return new mysqli("localhost","root","","proyecto_final");
}
$con = connect();
$sql = "SELECT * FROM profile";
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
           
            <form method="POST"  autocomplete="off" enctype="multipart/form-data"  role="form">

              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nombres</span>       
                <input disabled type="text" name="nombr" value="<?php echo $d->nombr; ?>"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                />
              </label>

              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">RUC</span>       
                <input disabled type="text" name="ruc" value="<?php echo $d->ruc; ?>"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                />
              </label>

              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Telefono</span>       
                <input disabled type="text" name="telef" value="<?php echo $d->telef; ?>"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                />
              </label>

              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Correo</span>       
                <input disabled type="text" name="corr" value="<?php echo $d->corr; ?>"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                />
              </label>
             
               <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Direccion</span>
               <textarea disabled name="asunto" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" placeholder="Enter some long form content."><?php echo $d->direcc; ?></textarea>
              </label>


              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Descripcion</span>
               <textarea disabled name="descrip" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" placeholder="Enter some long form content."><?php echo $d->descrip; ?></textarea>
              </label>

             


        </form>

          </div>
            
           
          </div>
<!--------------------------------COMIENZA NEW MODAL----------------------------->

   <?php endforeach; ?>
  
    <?php else:?>
    <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
          No hay datos
        </span>
    <?php endif; ?>    
        
</main>
      </div>
    </div>
  </body>
</html>