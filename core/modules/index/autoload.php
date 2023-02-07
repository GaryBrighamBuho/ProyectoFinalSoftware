<?php
// autoload.php
// esta funcion elimina el hecho de estar agregando los modelos manualmente


function spl__autoload($modelname){
	if(Model::exists($modelname)){
		include Model::getFullPath($modelname);
	} 

	if(Form::exists($modelname)){
		include Form::getFullPath($modelname);
	}
}



?>