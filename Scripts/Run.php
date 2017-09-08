<?php
/**
 * @author Gregoire Piat <gregoire.piat@outlook.fr>
 */

require_once(dirname(__FILE__) . "/../Entity/ApiCall.php");

/** Call Velov API */
$velovApi = new \ApiCalls\ApiCall("https://download.data.grandlyon.com/wfs/rdata?SERVICE=WFS&VERSION=2.0.0&outputformat=GEOJSON&maxfeatures=20000&request=GetFeature&typename=jcd_jcdecaux.jcdvelov&SRSNAME=urn:ogc:def:crs:EPSG::4171", "VELOV");

$trafficApi = new \ApiCalls\ApiCall("https://download.data.grandlyon.com/wfs/rdata?SERVICE=WFS&VERSION=2.0.0&outputformat=GEOJSON&maxfeatures=20000&request=GetFeature&typename=pvo_patrimoine_voirie.pvotrafic&SRSNAME=urn:ogc:def:crs:EPSG::4171", "TRAFFIC", true);

$parkingApi = new \ApiCalls\ApiCall("https://download.data.grandlyon.com/wfs/rdata?SERVICE=WFS&VERSION=2.0.0&outputformat=GEOJSON&maxfeatures=20000&request=GetFeature&typename=pvo_patrimoine_voirie.pvoparkingtr&SRSNAME=urn:ogc:def:crs:EPSG::4171", "PARKING", true);

$incidentsApi = new \ApiCalls\ApiCall("https://download.data.grandlyon.com/wfs/rdata?SERVICE=WFS&VERSION=2.0.0&outputformat=GEOJSON&maxfeatures=20000&request=GetFeature&typename=pvo_patrimoine_voirie.pvoevenement&SRSNAME=urn:ogc:def:crs:EPSG::4171", "INCIDENTS", true);

$parcRelaisApi = new \ApiCalls\ApiCall("https://download.data.grandlyon.com/wfs/rdata?SERVICE=WFS&VERSION=2.0.0&outputformat=GEOJSON&maxfeatures=30&request=GetFeature&typename=tcl_sytral.tclparcrelaistr&SRSNAME=urn:ogc:def:crs:EPSG::4171", "PARCSRELAIS", true);

?>