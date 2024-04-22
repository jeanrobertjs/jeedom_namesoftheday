<?php
/* This file is part of Jeedom.
*
* Jeedom is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* Jeedom is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
*/

/* * ***************************Includes********************************* */
require_once __DIR__  . '/../../../../core/php/core.inc.php';

class namesoftheday extends eqLogic {
  /*     * *************************Attributs****************************** */

  /*
  * Permet de définir les possibilités de personnalisation du widget (en cas d'utilisation de la fonction 'toHtml' par exemple)
  * Tableau multidimensionnel - exemple: array('custom' => true, 'custom::layout' => false)
  public static $_widgetPossibility = array();
  */

  /*
  * Permet de crypter/décrypter automatiquement des champs de configuration du plugin
  * Exemple : "param1" & "param2" seront cryptés mais pas "param3"
  public static $_encryptConfigKey = array('param1', 'param2');
  */

  /*     * ***********************Methode static*************************** */

// public static function start() {
//   foreach (eqLogic::byType('dayinfo', true) as $dayinfo) {
//     $dayinfo->getInformations();
//   }
// }
  
  /*
  * Fonction exécutée automatiquement toutes les minutes par Jeedom
  public static function cron() {}
  */

  /*
  * Fonction exécutée automatiquement toutes les 5 minutes par Jeedom
  public static function cron5() {}
  */

  /*
  * Fonction exécutée automatiquement toutes les 10 minutes par Jeedom
  public static function cron10() {}
  */

  /*
  * Fonction exécutée automatiquement toutes les 15 minutes par Jeedom
  public static function cron15() {}
  */

  /*
  * Fonction exécutée automatiquement toutes les 30 minutes par Jeedom
  public static function cron30() {}
  */

  /*
  * Fonction exécutée automatiquement toutes les heures par Jeedom
  public static function cronHourly() {}
  */

  
  // Fonction exécutée automatiquement tous les jours par Jeedom
  public static function cronDaily($_eqLogic_id = null) {
    if ($_eqLogic_id == null) { //La fonction n’a pas d’argument donc on recherche tous les équipements du plugin
      $eqLogics = self::byType('namesoftheday', true);
    } else { //La fonction a l’argument id(unique) d’un équipement(eqLogic)
      $eqLogics = array(self::byId($_eqLogic_id));
    }
  
    foreach ($eqLogics as $namesoftheday) {
      $cmd = $namesoftheday->getCmd(null, 'refresh'); //retourne la commande "refresh si elle existe
      if (!is_object($cmd)) { //Si la commande n'existe pas
        continue; //continue la boucle
      }
      $cmd->execCmd(); //la commande existe on la lance
    }
  }
  

  /*     * *********************Méthodes d'instance************************* */

  // Fonction exécutée automatiquement avant la création de l'équipement
  public function preInsert() {
  }

  // Fonction exécutée automatiquement après la création de l'équipement
  public function postInsert() {
  }

  // Fonction exécutée automatiquement avant la mise à jour de l'équipement
  public function preUpdate() {
  }

  // Fonction exécutée automatiquement après la mise à jour de l'équipement
  public function postUpdate() {
    self::cronDaily($this->getId()); //lance la fonction cronDaily avec l’id de l’eqLogic
  }

  // Fonction exécutée automatiquement avant la sauvegarde (création ou mise à jour) de l'équipement
  public function preSave() {
  }

  // Fonction exécutée automatiquement après la sauvegarde (création ou mise à jour) de l'équipement
  public function postSave() {
    $namesoftoday = $this->getCmd(null, 'namesoftoday');
    if (!is_object($namesoftoday)) {
      $namesoftoday = new namesofthedayCmd();
      $namesoftoday->setName(__('Prénoms du jour', __FILE__));
    }
    $namesoftoday->setLogicalId('namesoftoday');
    $namesoftoday->setEqLogic_id($this->getId());
    $namesoftoday->setUnite('');
    $namesoftoday->setType('info');
    $namesoftoday->setSubType('string');
    $namesoftoday->setIsHistorized(0);
    $namesoftoday->save();

    $namesoftomorrow = $this->getCmd(null, 'namesoftomorrow');
    if (!is_object($namesoftomorrow)) {
      $namesoftomorrow = new namesofthedayCmd();
      $namesoftomorrow->setName(__('Prénoms de demain', __FILE__));
    }
    $namesoftomorrow->setLogicalId('namesoftomorrow');
    $namesoftomorrow->setEqLogic_id($this->getId());
    $namesoftomorrow->setUnite('');
    $namesoftomorrow->setType('info');
    $namesoftomorrow->setSubType('string');
    $namesoftomorrow->setIsHistorized(0);
    $namesoftomorrow->save();

    $namesofyesterday = $this->getCmd(null, 'namesofyesterday');
    if (!is_object($namesofyesterday)) {
      $namesofyesterday = new namesofthedayCmd();
      $namesofyesterday->setName(__('Prénoms de la veille', __FILE__));
    }
    $namesofyesterday->setLogicalId('namesofyesterday');
    $namesofyesterday->setEqLogic_id($this->getId());
    $namesofyesterday->setUnite('');
    $namesofyesterday->setType('info');
    $namesofyesterday->setSubType('string');
    $namesofyesterday->setIsHistorized(0);
    $namesofyesterday->save();
  
    $refresh = $this->getCmd(null, 'refresh');
    if (!is_object($refresh)) {
      $refresh = new namesofthedayCmd();
      $refresh->setName(__('Rafraichir', __FILE__));
    }
    $refresh->setEqLogic_id($this->getId());
    $refresh->setLogicalId('refresh');
    $refresh->setType('action');
    $refresh->setSubType('other');
    $refresh->save();
  }

  // Fonction exécutée automatiquement avant la suppression de l'équipement
  public function preRemove() {
  }

  // Fonction exécutée automatiquement après la suppression de l'équipement
  public function postRemove() {
  }

  /*
  * Permet de crypter/décrypter automatiquement des champs de configuration des équipements
  * Exemple avec le champ "Mot de passe" (password)
  public function decrypt() {
    $this->setConfiguration('password', utils::decrypt($this->getConfiguration('password')));
  }
  public function encrypt() {
    $this->setConfiguration('password', utils::encrypt($this->getConfiguration('password')));
  }
  */

  /*
  * Permet de modifier l'affichage du widget (également utilisable par les commandes)
  public function toHtml($_version = 'dashboard') {}
  */

  /*
  * Permet de déclencher une action avant modification d'une variable de configuration du plugin
  * Exemple avec la variable "param3"
  public static function preConfig_param3( $value ) {
    // do some checks or modify on $value
    return $value;
  }
  */

  /*
  * Permet de déclencher une action après modification d'une variable de configuration du plugin
  * Exemple avec la variable "param3"
  public static function postConfig_param3($value) {
    // no return value
  }
  */

  /*     * **********************Getteur Setteur*************************** */

  public function getNames($countryfile = 'namesoftheday_fr', $month = null, $day = null) {
    $names = ""; $first = TRUE;
    if ($month == null || $day == null) {
      $month = date('n');
      $day = date('j');
    }
    $devAddr = dirname(__FILE__) . '/../../resources/data/'.$countryfile.'.csv';
    $devResult = fopen($devAddr, "r");
    while ( ($data = fgetcsv($devResult,1000,",") ) !== FALSE ) {
      //$num = count($data);
      if ($data[2] == $month) {
        if ($data[1] == $day) {
          if ($first) { $names = $data[0]; $first = FALSE; }
          else { $names = $names . ", " . $data[0]; }
        }
      }
    }
    fclose($devResult);
    return $names;
  }

  public function getNamesOfYesterday($countryfile = 'namesoftheday_fr') {
    $month = date('n', time() - 60 * 60 * 24);
    $day = date('j', time() - 60 * 60 * 24);
    return self::getNames($countryfile,$month,$day);
  }

  public function getNamesOfTomorrow($countryfile = 'namesoftheday_fr') {
    $month = date('n', time() + 60 * 60 * 24);
    $day = date('j', time() + 60 * 60 * 24);
    return self::getNames($countryfile,$month,$day);
  }
}

class namesofthedayCmd extends cmd {
  /*     * *************************Attributs****************************** */

  /*
  public static $_widgetPossibility = array();
  */

  /*     * ***********************Methode static*************************** */


  /*     * *********************Methode d'instance************************* */

  /*
  * Permet d'empêcher la suppression des commandes même si elles ne sont pas dans la nouvelle configuration de l'équipement envoyé en JS
  public function dontRemoveCmd() {
    return true;
  }
  */

  // Exécution d'une commande
  public function execute($_options = array()) {
    $eqlogic = $this->getEqLogic(); //récupère l'éqlogic de la commande $this
    $countryfile = $eqlogic->getConfiguration('countryfile', 'namesoftheday_fr'); // récupère la config de la langue avec "namesoftheday_fr" en fichier par défaut si rien n'est renseigné.
    switch ($this->getLogicalId()) { //vérifie le logicalid de la commande
      case 'refresh': // LogicalId de la commande rafraîchir que l’on a créé dans la méthode Postsave de la classe namesoftheday.
        $info1 = $eqlogic->getNames($countryfile); //On lance la fonction getNames() pour récupérer un namesoftheday et on la stocke dans la variable $info
        $eqlogic->checkAndUpdateCmd('namesoftoday', $info1); //on met à jour la commande avec le LogicalId "namesoftoday"  de l'eqlogic
        
        $info2 = $eqlogic->getNamesOfTomorrow($countryfile); //On lance la fonction getNamesOfTomorrow() pour récupérer un namesoftheday et on la stocke dans la variable $info
        $eqlogic->checkAndUpdateCmd('namesoftomorrow', $info2); //on met à jour la commande avec le LogicalId "namesoftomorrow"  de l'eqlogic
        
        $info3 = $eqlogic->getNamesOfYesterday($countryfile); //On lance la fonction getNamesOfYesterday() pour récupérer un namesoftheday et on la stocke dans la variable $info
        $eqlogic->checkAndUpdateCmd('namesofyesterday', $info3); //on met à jour la commande avec le LogicalId "namesofyesterday"  de l'eqlogic
        
        break;
    }
  }

  /*     * **********************Getteur Setteur*************************** */

}
