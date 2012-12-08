<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
//define('BASE_APP', 'http://localhost/admincms/');
//define('BASE_URL', 'http://localhost/cmcb/');
//define('DEFAULT_CONTROLLER', 'inicio');
//define('DEFAULT_LAYOUT', 'amdcaseros');
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);
define('URL_CSS', 'http://localhost/ealiceistas/frontend/css/');
define('URL_JS', 'http://localhost/ealiceistas/frontend/js/');
define('URL_IMG', 'http://localhost/ealiceistas/frontend/images/'); 
define('URL_DOWN_CV', 'http://localhost/ealiceistas/cv/'); 
define('URL_DOWN_FILES', 'http://localhost/ealiceistas/files/'); 
define('URL_MAIN', 'http://localhost/ealiceistas/frontend'); 
define('KEY_ENCRIPT', 'sdy38s829Mpt2012osjdao9ZXD93'); 

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */