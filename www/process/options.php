<?php

require 'base.inc';
require BASE . '/../config.inc';

require BASE . '/../includes/header.inc';

$smarty = new MySmarty();

if(!$user->checkDroit('parameters_all')) {
	$_SESSION['message'] = 'droitsInsuffisants';
	header('Location: ../index.php');
	exit;
}


if(isset($_POST['SOPLANNING_TITLE'])) {
	$config = new Config();
	$config->db_load(array('cle', '=', 'SOPLANNING_TITLE'));
	$config->valeur = ($_POST['SOPLANNING_TITLE'] != '' ? $_POST['SOPLANNING_TITLE'] : NULL);
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
	$config = new Config();
	$config->db_load(array('cle', '=', 'SOPLANNING_URL'));
	$config->valeur = ($_POST['SOPLANNING_URL'] != '' ? $_POST['SOPLANNING_URL'] : NULL);
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if((isset($_FILES['SOPLANNING_LOGO']) && !empty($_FILES['SOPLANNING_LOGO']['name'])) || isset($_POST['SOPLANNING_LOGO_SUPPRESSION'])) {	
	$config = new Config();
	$config->db_load(array('cle', '=', 'SOPLANNING_LOGO'));
	if (isset($_POST['SOPLANNING_LOGO_SUPPRESSION']))
	{
		$config->valeur = NULL;
		if(!$config->db_save()) {
			$_SESSION['message'] = 'changeNotOK';
			header('Location: ../options.php');
			exit;
		}
		# Effacement de l'ancien logo
		if (file_exists(BASE.'/upload/logo/'.$_POST['old_logo'])) unlink(BASE.'/upload/logo/'.$_POST['old_logo']);
	}else
	{
		$res=upload_image(BASE.'/upload/logo',$_FILES['SOPLANNING_LOGO']);
		if ($res != "")
		{
			switch ($res)
			{
			case 1 : $_SESSION['message'] = 'changeNotOKImageSize';break;
			case 2 : $_SESSION['message'] = 'changeNotOKImageRepertoire';break;
			default : $_SESSION['message'] = 'changeNotOKImageErreur';break;
			}
			$_SESSION['message'] = 'changeNotOK';
			header('Location: ../options.php');
			exit;
		}
		$config->valeur = $_FILES['SOPLANNING_LOGO']['name'];
		if(!$config->db_save()) {
			$_SESSION['message'] = 'changeNotOK';
			header('Location: ../options.php');
			exit;
		}
		# Effacement de l'ancien logo
		if ($_POST['old_logo'] <> $_FILES['SOPLANNING_LOGO']['name'])
		{
		 if (file_exists(BASE.'/upload/logo/'.$_POST['old_logo'])) unlink(BASE.'/upload/logo/'.$_POST['old_logo']);
		}
	}
}

if(isset($_POST['SOPLANNING_THEME'])) {
	$config = new Config();
	$config->db_load(array('cle', '=', 'SOPLANNING_THEME'));
	$config->valeur=$_POST['SOPLANNING_THEME'];
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['SOPLANNING_OPTION_ACCES'])) {
	$config = new Config();
	$config->db_load(array('cle', '=', 'SOPLANNING_OPTION_ACCES'));
	$config->valeur=$_POST['SOPLANNING_OPTION_ACCES'];
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['CONFIG_SECURE_KEY'])) {
	$config = new Config();
	$config->db_load(array('cle', '=', 'SECURE_KEY'));
	$config->valeur=$_POST['CONFIG_SECURE_KEY'];
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['SOPLANNING_OPTION_LIEUX'])) {
	$config = new Config();
	$config->db_load(array('cle', '=', 'SOPLANNING_OPTION_LIEUX'));
	if ($_POST['SOPLANNING_OPTION_LIEUX']=='on')
	{
		$config->valeur=1;
	}else $config->valeur=0;
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
} elseif (isset($_POST['configLieuxRessources'])) {
	// if checkbox not checked
	$config = new Config();
	$config->db_load(array('cle', '=', 'SOPLANNING_OPTION_LIEUX'));
	$config->valeur=0;
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['SOPLANNING_OPTION_RESSOURCES'])) {
	$config = new Config();
	$config->db_load(array('cle', '=', 'SOPLANNING_OPTION_RESSOURCES'));
	if ($_POST['SOPLANNING_OPTION_RESSOURCES']=='on')
	{
		$config->valeur=1;
	}else $config->valeur=0;
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
} elseif (isset($_POST['configLieuxRessources'])) {
	// if checkbox not checked
	$config = new Config();
	$config->db_load(array('cle', '=', 'SOPLANNING_OPTION_RESSOURCES'));
	$config->valeur=0;
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}


if(isset($_POST['DAYS_INCLUDED'])) {
	$config = new Config();
	$config->db_load(array('cle', '=', 'DAYS_INCLUDED'));
	$config->valeur = implode(',', $_POST['DAYS_INCLUDED']);
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

//if(isset($_POST['PLANNING_DATE_FORMAT'])) {
//	$config = new Config();
//	$config->db_load(array('cle', '=', 'PLANNING_DATE_FORMAT'));
//	$config->valeur = $_POST['PLANNING_DATE_FORMAT'];
//	echo $_POST['PLANNING_DATE_FORMAT'];exit;
//	if(!$config->db_save()) {
//		$_SESSION['message'] = 'changeNotOK';
//		header('Location: ../options.php');
//		exit;
//	}
//}

if(isset($_POST['HOURS_DISPLAYED'])) {
	$config = new Config();
	$config->db_load(array('cle', '=', 'HOURS_DISPLAYED'));
	$config->valeur = implode(',', $_POST['HOURS_DISPLAYED']);
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['DEFAULT_NB_MONTHS_DISPLAYED'])) {
	if(is_numeric($_POST['DEFAULT_NB_MONTHS_DISPLAYED']) && round($_POST['DEFAULT_NB_MONTHS_DISPLAYED']) > 0) {
		$config = new Config();
		$config->db_load(array('cle', '=', 'DEFAULT_NB_MONTHS_DISPLAYED'));
		$config->valeur = $_POST['DEFAULT_NB_MONTHS_DISPLAYED'];
		if(!$config->db_save()) {
			$_SESSION['message'] = 'changeNotOK';
			header('Location: ../options.php');
			exit;
		}
		// on change aussi la valeur en session
		$_SESSION['nb_mois'] = $config->valeur;
	} else {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['DEFAULT_NB_DAYS_DISPLAYED'])) {
	if(is_numeric($_POST['DEFAULT_NB_DAYS_DISPLAYED']) && round($_POST['DEFAULT_NB_DAYS_DISPLAYED']) > 0) {
		$config = new Config();
		$config->db_load(array('cle', '=', 'DEFAULT_NB_DAYS_DISPLAYED'));
		$config->valeur = $_POST['DEFAULT_NB_DAYS_DISPLAYED'];
		if(!$config->db_save()) {
			$_SESSION['message'] = 'changeNotOK';
			header('Location: ../options.php');
			exit;
		}
		// on change aussi la valeur en session
		$_SESSION['nb_jours'] = $config->valeur;
	} else {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['DEFAULT_NB_ROWS_DISPLAYED'])) {
	if(is_numeric($_POST['DEFAULT_NB_ROWS_DISPLAYED']) && round($_POST['DEFAULT_NB_ROWS_DISPLAYED']) > 0) {
		$config = new Config();
		$config->db_load(array('cle', '=', 'DEFAULT_NB_ROWS_DISPLAYED'));
		$config->valeur = $_POST['DEFAULT_NB_ROWS_DISPLAYED'];
		if(!$config->db_save()) {
			$_SESSION['message'] = 'changeNotOK';
			header('Location: ../options.php');
			exit;
		}
		// on change aussi la valeur en session
		$_SESSION['nb_lignes'] = $config->valeur;
	} else {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['DEFAULT_NB_PAST_DAYS'])) {
	if(is_numeric($_POST['DEFAULT_NB_PAST_DAYS']) && round($_POST['DEFAULT_NB_PAST_DAYS']) >= 0) {
		$config = new Config();
		$config->db_load(array('cle', '=', 'DEFAULT_NB_PAST_DAYS'));
		$config->valeur = $_POST['DEFAULT_NB_PAST_DAYS'];
		if(!$config->db_save()) {
			$_SESSION['message'] = 'changeNotOK';
			header('Location: ../options.php');
			exit;
		}
	} else {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['PLANNING_LINE_HEIGHT'])) {
	$config = new Config();
	$config->db_load(array('cle', '=', 'PLANNING_LINE_HEIGHT'));
	if(is_numeric($_POST['PLANNING_LINE_HEIGHT']) && round($_POST['PLANNING_LINE_HEIGHT']) > 0) {
		$config->valeur = $_POST['PLANNING_LINE_HEIGHT'];
	} else {
		$config->valeur = null;
	}
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['PLANNING_ONE_ASSIGNMENT_MAX_PER_DAY'])) {
	$config = new Config();
	$config->db_load(array('cle', '=', 'PLANNING_ONE_ASSIGNMENT_MAX_PER_DAY'));
	if($_POST['PLANNING_ONE_ASSIGNMENT_MAX_PER_DAY'] == 0 || $_POST['PLANNING_ONE_ASSIGNMENT_MAX_PER_DAY'] == 1) {
		$config->valeur = $_POST['PLANNING_ONE_ASSIGNMENT_MAX_PER_DAY'];
	} else {
		$config->valeur = 0;
	}
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['REFRESH_TIMER'])) {
	if(is_numeric($_POST['REFRESH_TIMER']) && round($_POST['REFRESH_TIMER']) > 0) {
		$config = new Config();
		$config->db_load(array('cle', '=', 'REFRESH_TIMER'));
		$config->valeur = $_POST['REFRESH_TIMER'];
		if(!$config->db_save()) {
			$_SESSION['message'] = 'changeNotOK';
			header('Location: ../options.php');
			exit;
		}
	} else {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['PROJECT_COLORS_POSSIBLE'])) {
	if(strlen($_POST['PROJECT_COLORS_POSSIBLE']) == 0 || strlen($_POST['PROJECT_COLORS_POSSIBLE']) > 6) {
		$config = new Config();
		$config->db_load(array('cle', '=', 'PROJECT_COLORS_POSSIBLE'));
		if(strlen($_POST['PROJECT_COLORS_POSSIBLE']) == 0) {
			$config->valeur = null;
		} else {
			$config->valeur = $_POST['PROJECT_COLORS_POSSIBLE'];
		}
		if(!$config->db_save()) {
			$_SESSION['message'] = 'changeNotOK';
			header('Location: ../options.php');
			exit;
		}
	} else {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['DEFAULT_PERIOD_LINK'])) {
	$config = new Config();
	$config->db_load(array('cle', '=', 'DEFAULT_PERIOD_LINK'));
	if(strlen($_POST['DEFAULT_PERIOD_LINK']) == 0) {
		$config->valeur = null;
	} else {
		$config->valeur = $_POST['DEFAULT_PERIOD_LINK'];
	}
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['LOGOUT_REDIRECT'])) {
	$config = new Config();
	$config->db_load(array('cle', '=', 'LOGOUT_REDIRECT'));
	if(strlen($_POST['LOGOUT_REDIRECT']) == 0) {
		$config->valeur = null;
	} else {
		$config->valeur = $_POST['LOGOUT_REDIRECT'];
	}
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['DURATION_DAY'])) {
	if(is_numeric($_POST['DURATION_DAY']) && round($_POST['DURATION_DAY']) > 0) {
		$config = new Config();
		$config->db_load(array('cle', '=', 'DURATION_DAY'));
		$config->valeur = $_POST['DURATION_DAY'];
		if(!$config->db_save()) {
			$_SESSION['message'] = 'changeNotOK';
			header('Location: ../options.php');
			exit;
		}
	} else {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['DURATION_AM'])) {
	if(is_numeric($_POST['DURATION_AM']) && round($_POST['DURATION_AM']) > 0) {
		$config = new Config();
		$config->db_load(array('cle', '=', 'DURATION_AM'));
		$config->valeur = $_POST['DURATION_AM'];
		if(!$config->db_save()) {
			$_SESSION['message'] = 'changeNotOK';
			header('Location: ../options.php');
			exit;
		}
	} else {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['DURATION_PM'])) {
	if(is_numeric($_POST['DURATION_PM']) && round($_POST['DURATION_PM']) > 0) {
		$config = new Config();
		$config->db_load(array('cle', '=', 'DURATION_PM'));
		$config->valeur = $_POST['DURATION_PM'];
		if(!$config->db_save()) {
			$_SESSION['message'] = 'changeNotOK';
			header('Location: ../options.php');
			exit;
		}
	} else {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['SMTP_HOST'])) {
	$config = new Config();
	$config->db_load(array('cle', '=', 'SMTP_HOST'));
	$config->valeur = ($_POST['SMTP_HOST'] != '' ? $_POST['SMTP_HOST'] : NULL);
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
	$config = new Config();
	$config->db_load(array('cle', '=', 'SMTP_PORT'));
	$config->valeur = ($_POST['SMTP_PORT'] != '' ? $_POST['SMTP_PORT'] : NULL);
	if(!$config->db_save()) {
		die;
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
	$config = new Config();
	$config->db_load(array('cle', '=', 'SMTP_SECURE'));
	$config->valeur = ($_POST['SMTP_SECURE'] != '' ? $_POST['SMTP_SECURE'] : NULL);
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
	$config = new Config();
	$config->db_load(array('cle', '=', 'SMTP_FROM'));
	$config->valeur = ($_POST['SMTP_FROM'] != '' ? $_POST['SMTP_FROM'] : NULL);
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
	$config = new Config();
	$config->db_load(array('cle', '=', 'SMTP_LOGIN'));
	$config->valeur = ($_POST['SMTP_LOGIN'] != '' ? $_POST['SMTP_LOGIN'] : NULL);
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
	if($_POST['SMTP_PASSWORD'] != 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX') {
		// hack pour ne pas écraser le password si submit tel quel
		$config = new Config();
		$config->db_load(array('cle', '=', 'SMTP_PASSWORD'));
		$config->valeur = ($_POST['SMTP_PASSWORD'] != '' ? $_POST['SMTP_PASSWORD'] : NULL);
		if(!$config->db_save()) {
			$_SESSION['message'] = 'changeNotOK';
			header('Location: ../options.php');
			exit;
		}
	}
}

if(isset($_POST['PLANNING_REPEAT_HEADER'])) {
	$config = new Config();
	$config->db_load(array('cle', '=', 'PLANNING_REPEAT_HEADER'));
	if(is_numeric($_POST['PLANNING_REPEAT_HEADER']) && round($_POST['PLANNING_REPEAT_HEADER']) > 0) {
		$config->valeur = $_POST['PLANNING_REPEAT_HEADER'];
	} else {
		$config->valeur = null;
	}
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['mailTestDestinataire'])) {
	$mail = new Mailer($_POST['mailTestDestinataire'], 'SOPLANNING - test email', 'OK');
	if(isset($_POST['smtp_traces'])) {
		$mail->SMTPDebug = true;
	}
	try {
		$result = $mail->send();
	} catch (phpmailerException $e) {
		echo 'error while sending the email :';
		print_r($e);
		die;
	}
	if(isset($_POST['smtp_traces'])) {
		echo '<br><br>' . $smarty->get_config_vars('options_envoyerMailTest_envoye');
		echo '<br><br><a href="../options.php">' . $smarty->get_config_vars('back_to_soplanning') . '<a>';
		exit;
	}

	$_SESSION['message'] = 'options_envoyerMailTest_envoye';
	header('Location: ../options.php');
	exit;
}

if(isset($_POST['walldisplayrefreshrate'])) {

	$config = new Config();
	$config->db_load(array('cle', '=', 'WALL_DISPLAY_REFRESH'));
	if(is_numeric($_POST['walldisplayrefreshrate']) && round($_POST['walldisplayrefreshrate']) > 0) {
		$config->valeur = $_POST['walldisplayrefreshrate'];
	} else {
		$config->valeur = 0;
	}
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['walldisplaynbweeks'])) {

	$config = new Config();
	$config->db_load(array('cle', '=', 'WALL_DISPLAY_WEEKS'));
	if(is_numeric($_POST['walldisplaynbweeks']) && round($_POST['walldisplaynbweeks']) > 0) {
		$config->valeur = $_POST['walldisplaynbweeks'];
	} else {
		$config->valeur = 0;
	}
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['synchronize_server'])) {

	$config = new Config();
	$config->db_load(array('cle', '=', 'SYNCHRONIZE_SERVER'));
	$config->valeur = $_POST['synchronize_server'];
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['synchronize_file'])) {

	$config = new Config();
	$config->db_load(array('cle', '=', 'SYNCHRONIZE_FILE'));
	$config->valeur = $_POST['synchronize_file'];
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['synchronize_user'])) {

	$config = new Config();
	$config->db_load(array('cle', '=', 'SYNCHRONIZE_USER'));
	$config->valeur = $_POST['synchronize_user'];
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['synchronize_pass'])) {

	$config = new Config();
	$config->db_load(array('cle', '=', 'SYNCHRONIZE_PASS'));
	$config->valeur = $_POST['synchronize_pass'];
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['synchronize_rate'])) {

	$config = new Config();
	$config->db_load(array('cle', '=', 'SYNCHRONIZE_RATE'));
	$config->valeur = $_POST['synchronize_rate'];
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['synchronize_groups'])) {

	$config = new Config();
	$config->db_load(array('cle', '=', 'SYNCHRONIZE_GROUPS'));
	$config->valeur = $_POST['synchronize_groups'];
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

if(isset($_POST['libreplan_server'])) {

	$config = new Config();
	$config->db_load(array('cle', '=', 'LIBREPLAN_SERVER'));
	$config->valeur = $_POST['libreplan_server'];
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}
if(isset($_POST['libreplan_file'])) {

	$config = new Config();
	$config->db_load(array('cle', '=', 'LIBREPLAN_FILE'));
	$config->valeur = $_POST['libreplan_file'];
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}
if(isset($_POST['libreplan_user'])) {

	$config = new Config();
	$config->db_load(array('cle', '=', 'LIBREPLAN_USER'));
	$config->valeur = $_POST['libreplan_user'];
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}
if(isset($_POST['libreplan_pass'])) {

	$config = new Config();
	$config->db_load(array('cle', '=', 'LIBREPLAN_PASS'));
	$config->valeur = $_POST['libreplan_pass'];
	if(!$config->db_save()) {
		$_SESSION['message'] = 'changeNotOK';
		header('Location: ../options.php');
		exit;
	}
}

$_SESSION['message'] = 'changeOK';
header('Location: ../options.php');
