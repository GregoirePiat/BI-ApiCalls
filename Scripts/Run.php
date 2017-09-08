<?php
/**
 * @author Gregoire Piat <gregoire.piat@outlook.fr>
 */

require_once(dirname(__FILE__) . "/../Entity/ApiCall.php");

/** Call Velov API */
$velovApi = new \ApiCalls\ApiCall("https://download.data.grandlyon.com/ws/rdata/jcd_jcdecaux.jcdvelov/all.json", "VELOV");

// Set credentials when available
//$trafficApi = new \ApiCalls\ApiCall("https://download.data.grandlyon.com/ws/rdata/pvo_patrimoine_voirie.pvotrafic/all.json?compact=false&start=1001&maxfeatures=2000", "TRAFFIC");

?>