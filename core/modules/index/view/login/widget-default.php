<?php
//Inicio de Sesion
if (Session::getUID() != "") {
    print "<script>window.location='index.php?view=home';</script>";
}

?>
<br><br><br><br><br>
<div style="background-color: #7b1523; margin-right: 300px; padding: 50px; border-radius: 20px">
    	<div style="display: flex; justify-content: center">
    	<?php if (isset($_COOKIE['password_updated'])): ?>
    		<div class="alert alert-success">
    		<p><i class='glyphicon glyphicon-off'></i> Se ha cambiado la contraseña exitosamente !!</p>
    		<p>Pruebe iniciar sesion con su nueva contraseña.</p>

    		</div>
    	<?php setcookie("password_updated", "", time() - 18600);
endif;?>
//cargamos imagen
<img
          width="300"
          height="450"
          src="http://www.unsaac.edu.pe/images/imagenes/escudo.png"
          style="border-radius: 20px 0px 0px 20px"
        />
        //diseño del recuadro
    		<div  style="
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            flex-direction: column;
            border-radius: 0px 20px 20px 0px;
            width: 400px;
            padding-left: 20px;
          ">
			  	<div>
			    	<h3 style="
                font-family: inherit;
                text-transform: uppercase;
                text-decoration: underline;
                font-weight: bold;
              ">Iniciar Sesión</h3>
			 	</div>
			  	<div>
            //formulario para ingresar datos de inicio de sesion
			    	<form accept-charset="UTF-8" role="form" method="post" action="index.php?view=processlogin" style="border: none">
                    <fieldset style="
                  border: none;
                  padding: 20px;
                  display: flex;
                  justify-content: center;
                  flex-direction: column;
                ">
			    	  	<div style="
                    position: relative;
                    padding: 15px 0 0;
                    margin-top: 10px;
                    width: 50%;
                  ">
			    		    <input style="
                      font-family: inherit;
                      width: 100%;
                      border: 0;
                      border-bottom: 2px solid #9b9b9b;
                      outline: 0;
                      font-size: 1.3rem;
                      color: black;
                      padding: 7px 0;
                      background: transparent;
                      transition: border-color 0.2s;
                    " placeholder="Usuario" name="mail" type="text"/>
							//ingresa el usuario
              <label
                    for="email"
                    style="
                      position: absolute;
                      top: 0;
                      display: block;
                      transition: 0.2s;
                      font-size: 1rem;
                      color: #9b9b9b;
                    "
                    >Usuario:</label>
			    		</div>
			    		<div  style="
                    position: relative;
                    padding: 15px 0 0;
                    margin-top: 10px;
                    width: 50%;
                    margin-bottom: 15px;
                  ">
			    			<input  style="
                      font-family: inherit;
                      width: 100%;
                      border: 0;
                      border-bottom: 2px solid #9b9b9b;
                      outline: 0;
                      font-size: 1.3rem;
                      color: black;
                      padding: 7px 0;
                      background: transparent;
                      transition: border-color 0.2s;
                    "
                    placeholder="*"
                    name="password"
                    type="password"
                    value=""
                    id="pass" />
          //Ingresa la contraseña          
					<label
                    for="pass"
                    style="
                      position: absolute;
                      top: 0;
                      display: block;
                      transition: 0.2s;
                      font-size: 1rem;
                      color: #9b9b9b;
                    "
                    >Contraseña:</label
                  >
			    		</div>
              //Boton de acceder
			    		<input  style="
                    border: none;
                    padding: 10px;
                    margin-right: 10px;
                    background-color: #f8f77b;
                    border-radius: 10px;
                    cursor: pointer;
                  "
                  type="submit"
                  value="Acceder" />
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
<br><br><br><br><br><br><br><br><br><br><br><br>