<?php

/** O nome do banco de dados*/
define("DB_NAME", "databanco");

/** Usuário do banco de dados MySQL */
define("DB_USER", "root");

/** Senha do banco de dados MySQL */
define("DB_PASSWORD", "");

/** nome do host do MySQL */
define("DB_HOST", "localhost");


if ( !defined("ABSPATH") ) 
	define("ABSPATH", dirname(__FILE__) . "/");


if ( !defined("BASEURL") ) 
	define("BASEURL", "/projeto_pw3bim/");


if ( !defined("DBAPI") )
	define("DBAPI", ABSPATH . "inc/database.php");

define("HEADER_TEMPLATE", ABSPATH . "inc/header.php");
define("FOOTER_TEMPLATE", ABSPATH . "inc/footer.php");


if ( !defined("UPLOAD_PATH") )
	define("UPLOAD_PATH", ABSPATH . "img/");

if ( !defined("UPLOAD_URL") )
	define("UPLOAD_URL", BASEURL . "img/");

?>