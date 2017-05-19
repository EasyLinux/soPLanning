<?php

class Ferie extends GObject
{

	public function __construct()
	{
		$this->table = 'planning_ferie';
		
		$this->fields['date_ferie'] = new GDate('planning_ferie', 'date_ferie', 10, FALSE, date('Y-m-d'));
		$this->fields['libelle'] = new GString('planning_ferie', 'libelle', 50, TRUE, NULL);

		$this->primaryKeys = array('date_ferie');

		parent::__construct();
	}

	
// Fonction permettant de compter le nombre de jours ouvrés entre deux dates
public function get_nb_open_days($date_start, $date_stop) {	
	$arr_bank_holidays = array(); // Tableau des jours feriés	
	
	// On boucle dans le cas où l'année de départ serait différente de l'année d'arrivée
	$diff_year = date('Y', $date_stop) - date('Y', $date_start);
	for ($i = 0; $i <= $diff_year; $i++) {			
		$year = (int)date('Y', $date_start) + $i;
		// Liste des jours feriés
		$arr_bank_holidays[] = '1_1_'.$year; // Jour de l'an
		$arr_bank_holidays[] = '1_5_'.$year; // Fete du travail
		$arr_bank_holidays[] = '8_5_'.$year; // Victoire 1945
		$arr_bank_holidays[] = '14_7_'.$year; // Fete nationale
		$arr_bank_holidays[] = '15_8_'.$year; // Assomption
		$arr_bank_holidays[] = '1_11_'.$year; // Toussaint
		$arr_bank_holidays[] = '11_11_'.$year; // Armistice 1918
		$arr_bank_holidays[] = '25_12_'.$year; // Noel
				
		// Récupération de paques. Permet ensuite d'obtenir le jour de l'ascension et celui de la pentecote	
		$easter = easter_date($year);
		$arr_bank_holidays[] = date('j_n_'.$year, $easter + 86400); // Paques
		$arr_bank_holidays[] = date('j_n_'.$year, $easter + (86400*39)); // Ascension
		$arr_bank_holidays[] = date('j_n_'.$year, $easter + (86400*50)); // Pentecote	
	}
	//print_r($arr_bank_holidays);
	$nb_days_open = 0;
	// Mettre <= si on souhaite prendre en compte le dernier jour dans le décompte	
	while ($date_start < $date_stop) {
		// Si le jour suivant n'est ni un dimanche (0) ou un samedi (6), ni un jour férié, on incrémente les jours ouvrés	
		if (!in_array(date('w', $date_start), array(0, 6)) 
		&& !in_array(date('j_n_'.date('Y', $date_start), $date_start), $arr_bank_holidays)) {
			$nb_days_open++;		
		}
		$date_start = mktime(date('H', $date_start), date('i', $date_start), date('s', $date_start), date('m', $date_start), date('d', $date_start) + 1, date('Y', $date_start));			
	}		
	return $nb_days_open;
}


public static function getHolidays($year = null)
{
        if ($year === null)
        {
                $year = intval(strftime('%Y'));
        }

        $easterDate = easter_date($year);
        $easterDay = date('j', $easterDate);
        $easterMonth = date('n', $easterDate);
        $easterYear = date('Y', $easterDate);

        $holidays = array(
                // Jours feries fixes
                mktime(0, 0, 0, 1, 1, $year),// 1er janvier
                mktime(0, 0, 0, 5, 1, $year),// Fete du travail
                mktime(0, 0, 0, 5, 8, $year),// Victoire des allies
                mktime(0, 0, 0, 7, 14, $year),// Fete nationale
                mktime(0, 0, 0, 8, 15, $year),// Assomption
                mktime(0, 0, 0, 11, 1, $year),// Toussaint
                mktime(0, 0, 0, 11, 11, $year),// Armistice
                mktime(0, 0, 0, 12, 25, $year),// Noel

                // Jour feries qui dependent de paques
                mktime(0, 0, 0, $easterMonth, $easterDay + 1, $easterYear),// Lundi de paques
                mktime(0, 0, 0, $easterMonth, $easterDay + 39, $easterYear),// Ascension
                mktime(0, 0, 0, $easterMonth, $easterDay + 50, $easterYear), // Pentecote
        );

        sort($holidays);

        return $holidays;
}

// Nombre calendaire entre 2 dates
public static function diffCalendar($firstDate, $secondDate)
{
        $oFirstDate = new DateTime($firstDate);
        $oSecondDate = new DateTime($secondDate);

        return (integer) ($oSecondDate->getTimestamp() - $oFirstDate->getTimestamp());
}

// Nombre jourOuvres entre 2 dates
public static function diffWorkDay($firstDate, $secondDate)
{
        /*
         * Pour calculer le nombre de jours ouvres,
         * on calcule le nombre total de jours et
         * on soustrait les jours fériés et les week end.
         */
        $iDiffCalendar = self::diffCalendar($firstDate, $secondDate);

        $oFirstDate = new DateTime($firstDate);
        $oSecondDate = new DateTime($secondDate);

        $iFirstYear = $oFirstDate->format('Y');
        $iSecondYear = $oSecondDate->format('Y');

        $aHolidays = array();

        /*
         * Si l'interval demande chevauche plusieurs annees
         * on doit avoir les jours feries de toutes ces annees
         */
        for ($iYear = $iFirstYear; $iYear <= $iSecondYear; $iYear++)
        {
                $aHolidays = array_merge(self::getHolidays($iYear), $aHolidays);
        }

        /*
         * On est oblige de convertir les timestamps en string a cause des decalages horaires.
         */
        $aHolidaysString = array_map(function ($value)
        {
                return strftime('%Y-%m-%d', $value);
        }, $aHolidays);

        for ($i = $oFirstDate->getTimestamp(); $i < $oSecondDate->getTimestamp(); $i += 86400)
        {
                /* Numero du jour de la semaine, de 1 pour lundi a 7 pour dimanche */
                $iDayNum = strftime('%u', $i);

                if (in_array(strftime('%Y-%m-%d', $i), $aHolidaysString) OR $iDayNum == 6 OR $iDayNum == 7)
                {
                        /* Si c'est ferie ou samedi ou dimanche, on soustrait le nombre de secondes dans une journee. */
                        $iDiffCalendar -= 86400;
                }
        }

        return (integer) $iDiffCalendar;
}


public static function isHoliday($timestamp)
{
        $iDayNum = strftime('%u', $timestamp);
        $iYear = strftime('%Y', $timestamp);

        $aHolidays = self::getHolidays($iYear);

        /*
        * On est oblige de convertir les timestamps en string a cause des decalages horaires.
        */
        $aHolidaysString = array_map(function ($value)
        {
                return strftime('%Y-%m-%d', $value);
        }, $aHolidays);

        if (in_array(strftime('%Y-%m-%d', $timestamp), $aHolidaysString) OR $iDayNum == 6 OR $iDayNum == 7)
        {
                return true;
        }

        return false;
}

public static function isWorkingDay($timestamp)
{
        return (!self::isHoliday($timestamp));
}
/* Exemple : Du 11 au 15 juillet il n'y a qu'un jour ouvré (week-end + 1 jours férié)
$date_depart = strtotime('2008-07-11');
$date_fin = strtotime('2008-07-15');
$nb_jours_ouvres = get_nb_open_days($date_depart, $date_fin);
echo 'Il y a '.$nb_jours_ouvres.' jours ouvrés entre le '.date('d/m/Y', $date_depart).' et le '.date('d/m/Y', $date_fin);
*/
}
