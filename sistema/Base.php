<?php
# Autocomplete for NetBeans 7.* with Codeigniter and HMVC by Yavor Kirov ( yavor99@gmail.com )
#
#
# Put this file in the root directory of your project
# To enable auto-complete for your own Controller or Model just add it under "/**"
# for example add a line  "* @property Users $users" (without the quotes)
# to include your Users module controller. Or "* @property Mdl_users $mdl_users"
# for your model
#
# for autocomplete when typing $this->users-> use  ↑ (up arrow) to select from the
# methods of Users


#make sure none of this gets executed anyway
die();

#autocomplete in your controllers

/**
 * @property Users $users
 * @property Users_model $users_model
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 * @property CI_Benchmark $benchmark
 * @property CI_Calendar $calendar
 * @property CI_Cart $cart
 * @property CI_Config $config
 * @property CI_Controller $controller
 * @property CI_Email $email
 * @property CI_Encrypt $encrypt
 * @property CI_Exceptions $exceptions
 * @property CI_Form_validation $form_validation
 * @property CI_Ftp $ftp
 * @property CI_Hooks $hooks
 * @property CI_Image_lib $image_lib
 * @property CI_Input $input
 * @property CI_Language $language
 * @property CI_Loader $load
 * @property CI_Log $log
 * @property CI_Model $model
 * @property CI_Output $output
 * @property CI_Pagination $pagination
 * @property CI_Parser $parser
 * @property CI_Profiler $profiler
 * @property CI_Router $router
 * @property CI_Session $session
 * @property CI_Sha1 $sha1
 * @property CI_Table $table
 * @property CI_Trackback $trackback
 * @property CI_Typography $typography
 * @property CI_Unit_test $unit_test
 * @property CI_Upload $upload
 * @property CI_URI $uri
 * @property CI_User_agent $user_agent
 * @property CI_Validation $validation
 * @property CI_Xmlrpc $xmlrpc
 * @property CI_Xmlrpcs $xmlrpcs
 * @property CI_Zip $zip
 * @property CI_DB_mysql_utility $dbutil
 * @property Curl $curl
 * @property CI_Dbcupload $dbcupload
 * @property pdf $pdf

 */
class CI_Controller {

}

;

#autocomplete in your models

/**
 * @property Users_model $users_model
 * @property CI_DB_mysqli_driver $dbc
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 * @property CI_Config $config
 * @property CI_Loader $load
 * @property CI_Session $session
 */
class CI_Model {

}

;
?>