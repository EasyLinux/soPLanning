<?php

require 'base.inc';
require BASE . '/../config.inc';

// http://ltb-project.org/wiki/documentation/self-service-password
function retrieve_ldap_password($login, $password){

    global $ldapUrl, $ldapBase, $ldapFilter, $ldap_use_tls;

    # Connect to LDAP
    $ldap = @ldap_connect($ldapUrl);
    @ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    @ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

	if ($ldap_use_tls) {
		if(!@ldap_start_tls($ldap)){
			$result = "ldaperror";
			$err = "LDAP - failed to start tls";
			die("LDAP - failed to start tls");
		}    
	}

    # Bind
    $bind = @ldap_bind($ldap);
    
    $errno = @ldap_errno($ldap);
    if ( $errno ) {
        $result = "ldaperror";
        $err = "LDAP - Bind error $errno  (".@ldap_error($ldap).")";
        die("LDAP - Bind error $errno  (".@ldap_error($ldap).")");
    }
    else {
		# Search for user
		$ldapFilter = str_replace("{login}", $login, $ldapFilter);
		$search = @ldap_search($ldap, $ldapBase, $ldapFilter);

		$errno = @ldap_errno($ldap);
		if ( $errno ) {
			$result = "ldaperror";
			$err = "LDAP - Search error $errno  (".@ldap_error($ldap).")";
		}
		else {
			# Get user DN
			$entry = @ldap_first_entry($ldap, $search);
			$userdn = @ldap_get_dn($ldap, $entry);

			if( !$userdn ) {
				$result = "badcredentials";
				$err = "LDAP - User $login not found";
			}
			else {    
				# Bind with password
				$bind = @ldap_bind($ldap, $userdn, $password);
				$errno = @ldap_errno($ldap);
				if ( $errno ) {
					$result = "badcredentials";
					$err = "LDAP - Bind user error $errno  (".@ldap_error($ldap).")";
				} else {
					// Everything is OK ;)
					$result = "OK";
					$err = "";
				}
			}
		}
	}
	@ldap_close($ldap);
	if ($result == "OK") {
		return True;
	}
	else {
		return False;
	}		
}

// deconnexion
if(isset($_GET['action']) && $_GET['action'] == 'logout') {
	unset($_SESSION['user_id']);
	session_regenerate_id();
	@session_destroy();
	if(CONFIG_LOGOUT_REDIRECT != '') {
		header('Location: ' . CONFIG_LOGOUT_REDIRECT);
		exit;
	} else {
		header('Location: ../index.php' . (isset($_GET['language']) ? '?language=' . $_GET['language'] : ''));
		exit;
	}
}

function active_directory_login($username, $password){
	global $ADServer, $ADDomain;
	$ldap = ldap_connect($ADServer);
	if($ldap === false) {
		die('LDAP connexion failed');
	}
	ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
	ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

	$ldaprdn = $username . "@" . $ADDomain;
	$bind = @ldap_bind($ldap, $ldaprdn, $password);
	
	if(!$bind) {
		$ldaprdn = $ADDomain . "\\" . $username;
		$bind = @ldap_bind($ldap, $ldaprdn, $password);
	}

	if ($bind) {
		return true;
	} else {
		return false;
	}
}

//login 
if(!isset($_POST['login']) || !isset($_POST['password']) || $_POST['login'] == '' || $_POST['password'] == '') {
	$_SESSION['message'] = 'erreur_bad_login';
	header('Location: ../index.php');
	exit;
}

// ldap password
if($ldapLogin) {
    if(!isset($_POST['password']) || !retrieve_ldap_password($_POST['login'], $_POST['password'])) {
        $_SESSION['message'] = 'erreur_bad_login';
        header('Location: ../index.php');
        exit;
    }
}

$user = New User();
 // AD account
if($ADLogin && ($_POST['login'] != 'admin')) {
	if(!active_directory_login($_POST['login'], $_POST['password'])){
		$_SESSION['message'] = 'erreur_bad_login';
		header('Location: ../index.php');
		exit;
	}
    if(!$user->db_load(array('login', '=', $_POST['login']))) {
        $_SESSION['message'] = 'erreur_bad_login';
        header('Location: ../index.php');
        exit;
    }
} elseif($ldapLogin && ($_POST['login'] != 'admin')) {
    if(!$user->db_load(array('login', '=', $_POST['login']))) {
        $_SESSION['message'] = 'erreur_bad_login';
        header('Location: ../index.php');
        exit;
    }
} else {
	$pwd = sha1("�" . $_POST['password'] . "�");
	if(!$user->db_load(array('login', '=', $_POST['login'], 'password', '=', $pwd))) {
        $_SESSION['message'] = 'erreur_bad_login';
        header('Location: ../index.php');
        exit;
    }
}

$_SESSION['user_id'] = $user->user_id;
$user->date_dernier_login = date('Y-m-d H:i:s');
$user->db_save();

// Recherche des pr�f�rences utilisateurs pour affichage du planning par d�faut
$userdata=$user->getSmartyData();
$_SESSION['preferences']=$userdata['tabPreferences'];
// Pr�f�rence de vue par d�faut
if ($_SESSION['preferences']['vueDefaut']=='vueProjet') {
  $_SESSION['inverserUsersProjets'] = true;
} else {
	$_SESSION['inverserUsersProjets'] = false;
}
setcookie('inverserUsersProjets', $_SESSION['inverserUsersProjets'], time()+60*60*24*500, '/');

// Pr�f�rence de vue large/r�duit
if ($_SESSION['preferences']['vueLargeReduit']=='vueLarge') {
	$_SESSION['affichageLarge'] = true;
} else {
	$_SESSION['affichageLarge'] = false;
}

// Pr�f�rence de vue planning
if (!isset($_SESSION['preferences']['vueJourMois']) ||($_SESSION['preferences']['vueJourMois']=='vueMois')) {
	header('Location: ../planning.php');
} else {
	header('Location: ../planning_per_day.php');
}

exit;

?>