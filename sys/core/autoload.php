<?php

# loading for libs
if(isset($config['libs']['autoload'])){


	foreach($config['libs']['autoload'] as $lib){


		# first, make sure the library exists
		if(file_exists('../sys/libraries/'.$lib.'.php')){


			# then include it
			include_once('../sys/libraries/'.$lib.'.php');
		}
	}
}


# loading for models
if(isset($config['models']['autoload'])){


	foreach($config['models']['autoload'] as $model){


		# first, make sure the model exists
		if(file_exists('../app/models/'.$model.'.php')){


			# then include it
			include_once('../app/models/'.$model.'.php');

			$registry->$model = new $model($registry);
		}
	}
}


# loading for system classes that definitely need to be loaded into the registry
require_once('../sys/libraries/loader.php');

$registry->load = new Loader($registry);