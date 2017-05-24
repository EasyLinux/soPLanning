<?php

//echo nl2br(print_r($_SERVER,true));
//die();


// Database Parameters => please modify the content of database.inc file, or use the installer
require $_SERVER['DOCUMENT_ROOT'].'/database.inc';

// Active Directory vars
$ADLogin = false;
$ADServer = "ldap://domaincontroller.yourcomapany.local";
$ADDomain = "YOURCOMPANY";

// LDAP vars
$ldapLogin = false;
$ldapUrl = "ldap://ldap.yourCompany.com"; // address or IP of LDAP serveur
$ldap_domain = 'DOMAINENAME'; // LDAP domain
$ldapBase = "ou=people,dc=society,dc=com";
$ldapFilter = "(&(objectClass=OpenLDAPperson)(uid={login}))";
$ldap_use_tls = false;

// custom variables
define('COMPIL_DIR', BASE . '/../smarty/templates_c/'); // templates compil directory, must have read/write access

// number of results per page
define('NB_RESULT_PER_PAGE', 30);

// define how many items to display in the filter menus in the planning
define('FILTER_NB_USERS_PER_COLUMN', '18');
define('FILTER_NB_PROJECTS_PER_COLUMN', '18');
define('FILTER_NB_AERA_PER_COLUMN', '18');
define('FILTER_NB_RESSOURCES_PER_COLUMN', '18');

define('DEBUG', true);  // put TRUE for debug
define('DEV_MAIL', 'yourmail@domain.com');


// ----------------------------------------------------------------------------
// DO NOT MODIFY ANYTHING AFTER THIS LINE
// ----------------------------------------------------------------------------

if(DEBUG) {
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
  $Debug = new Debug();
} else {
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
}

define('CRLF', "\n");

// Load DB Wrapper

// Load Classes
// Load Classes
function __autoload($nomClasse) {
	if($nomClasse == 'PHPMailer') {
		require BASE . '/../phpmailer/class.phpmailer.php';
	}elseif($nomClasse == 'HTML2PDF_locale') {
		require BASE . '/../html2pdf/_class/locale.class.php';
	}elseif($nomClasse == 'HTML2PDF_myPdf') {
		require BASE . '/../html2pdf/_class/myPdf.class.php';
	}elseif($nomClasse == 'HTML2PDF_parsingCss') {
		require BASE . '/../html2pdf/_class/parsingCss.class.php';		
	}elseif($nomClasse == 'HTML2PDF_parsingHtml') {
		require BASE . '/../html2pdf/_class/parsingHtml.class.php';		
	}elseif($nomClasse == 'TCPDF') {
		require BASE . '/../html2pdf/vendor/tecnickcom/tcpdf/tcpdf.php';
	}else {
		require BASE . '/../includes/class_' . strtolower($nomClasse) . '.inc';
	}
}

// Librairies
require BASE . '/../includes/lib.inc';
require BASE . '/../includes/xajax_common.inc';
require BASE . '/../includes/db_wrapper.inc';

date_default_timezone_set('Europe/Paris');
header('Content-Type: text/html; charset=iso-8859-1');

// redirection possible vers installer / upgrade
$version = new Version();

if($version->checkDBAccess() !== TRUE || $version->checkDatabaseVersion() !== TRUE) {
	if(strpos($_SERVER['REQUEST_URI'], '/install/') === FALSE) {
		//header('Location: ' . BASE . '/install/');
		echo "<script>top.location='" . BASE . "/install/'</script>";
		exit;
	}
} else {

	// chargement des données de config
	$configs = db_query('SELECT * FROM planning_config');
	while($configTemp = db_fetch_array($configs)) {
		define('CONFIG_' . $configTemp['cle'], $configTemp['valeur']);
	}

	// Choix du format de date
	switch(CONFIG_PLANNING_DATE_FORMAT)	{
	case 1:
		define ('CONFIG_DATE_LONG','d/m/Y');
		define ('CONFIG_DATE_SHORT','d/m/y');
		define ('CONFIG_DATE_SHORT2','d/m');
		break;
	//case 2:
	//	define ('CONFIG_DATE_LONG','m-d-Y');
	//	define ('CONFIG_DATE_SHORT','m-d-y');		
	//	define ('CONFIG_DATE_SHORT2','m-d');		
	//	break;
	//case 3:
	//	define ('CONFIG_DATE_LONG','Y-m-d');
	//	define ('CONFIG_DATE_SHORT','y-m-d');
	//	define ('CONFIG_DATE_SHORT2','m-d');
	//	break;
	}
	define ('CONFIG_DATE_MYSQL','Y-m-d');
	
	// Ouverture de la session
	session_name($cfgDatabase . $cfgPrefix);
}

session_start();

$cfgAvailableLanguages = array(
	'fr'         => array('fr([-_][[:alpha:]]{2})?|french', 'fr'),
	'it'         => array('it([-_][[:alpha:]]{2})?|italian', 'it'),
	'en'         => array('en([-_][[:alpha:]]{2})?|english', 'en'),
	'nl'         => array('nl([-_][[:alpha:]]{2})?|nederlands', 'nl'),
	'de'         => array('de([-_][[:alpha:]]{2})?|german', 'de'),
	'es'         => array('es([-_][[:alpha:]]{2})?|spanish', 'es'),
	'da'         => array('da([-_][[:alpha:]]{2})?|danish', 'da'),
	'hu'         => array('hu([-_][[:alpha:]]{2})?|hungarian', 'hu'),
	'pt'         => array('pt([-_][[:alpha:]]{2})?|portuguese', 'pt'),
	'pl'         => array('pl([-_][[:alpha:]]{2})?|polish', 'pl'),
	'hu'         => array('hu([-_][[:alpha:]]{2})?|hungarian', 'hu')
);

$langueDefaut = 'en';
$lang = $langueDefaut;
if(isset($_GET) && !empty($_GET['language']) && in_array($_GET['language'], array('fr', 'en', 'it', 'nl', 'de', 'pt', 'da', 'hu', 'es', 'pl'))){
	$_SESSION['language'] = $_GET['language'];
	$lang = $_GET['language'];
} elseif (isset($_SESSION['language']) && in_array($_SESSION['language'], array('fr', 'en', 'it', 'nl', 'de', 'pt', 'da', 'hu', 'es', 'pl'))) {
	$lang = $_SESSION['language'];
} else {
	$_SESSION['language'] = detectLanguage($langueDefaut);
	$lang = detectLanguage($langueDefaut);
}

setlocale(LC_ALL, $lang . '_' . strtoupper($lang), $lang . '_' . strtoupper($lang) . '.ISO8859-1', $lang . '_' . strtoupper($lang) . '.ISO-8859-1', $lang . '_' . strtoupper($lang) . '.UTF-8', $lang . '_' . strtoupper($lang) . '.UTF8', $lang);

?>
