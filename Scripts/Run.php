<?php
/**
 * @author Gregoire Piat <gregoire.piat@outlook.fr>
 */

require_once(dirname(__FILE__) . "/../Entity/ApiCall.php");

/** Call Velov API */
$velovApi = new \ApiCalls\ApiCall("https://download.data.grandlyon.com/ws/rdata/jcd_jcdecaux.jcdvelov/all.json", "VELOV");

?>