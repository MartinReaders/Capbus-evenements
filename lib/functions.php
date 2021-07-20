<?php



function getmounth($_mountnmbr)
{
switch ($_mountnmbr) {
    case '01':
        return 'Janvier';
        break;
    case '02':
        return 'Février';
        break;
    case '03':  
        return 'Mars';
        break;
    case '04':  
        return 'Avril';
        break;
    case '05':
        return 'Mai';
        break;
    case '06':  
        return 'Juin';
        break;
    case '07':  
        return 'Juillet';
        break;
    case '08':
        return 'Août';
        break;
    case '09':  
        return 'Sept.';
        break;
    case '10':  
        return 'Oct.';
        break;
    case '11':
        return 'Nov.';
        break;
    case '12':  
        return 'Déc.';
        break;
  }
}




function clean($string) {
  
    return preg_replace("/&#?[a-z0-9]{2,8}«;/i","", $string); // Replaces multiple hyphens with single one.
 }