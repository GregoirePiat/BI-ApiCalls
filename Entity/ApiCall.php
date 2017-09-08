<?php

namespace ApiCalls;
/**
 * Class ApiCall
 *
 * This class is used to call GrandLyon APIs
 *
 * @author Gregoire Piat <gregoire.piat@outlook.fr>
 */
class ApiCall
{

    /**
     * @var string
     */
    protected $apiUrl;

    /**
     * @var string
     */
    protected $directoryPath;

    /**
     * @var string
     */
    protected $serviceName;

    /**
     * @var string
     */
    protected $fileName;

    /**
     * ApiCall constructor.
     * @param string    $apiUrl
     * @param string    $serviceName
     */
    public function __construct($apiUrl, $serviceName)
    {
        $this->apiUrl = $apiUrl;
        $this->serviceName = $serviceName;
        $this->setTimezone();
        $result = $this->curlCall();
        $this->storeOnFile($result);
    }

    /**
     * Call API
     * @return  string    $result
     */
    private function curlCall()
    {
        $session = curl_init();
        curl_setopt($session,CURLOPT_URL, $this->apiUrl);
        curl_setopt($session,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($session,CURLOPT_HEADER, false);
        $result = curl_exec($session);

        return $result;
    }


    /**
     * Store content on file
     * @param string    $content
     */
    private function storeOnFile($content)
    {
        $this->computeFileName();
        $this->computeDirectoryPath();
        if (!file_exists($this->directoryPath)) {
            mkdir($this->directoryPath, 0777, true);
        }
        file_put_contents($this->directoryPath . "/" .  $this->fileName, $content);
    }

    /** Set timezone to Europe/Paris**/
    private function setTimezone(){
        date_default_timezone_set ("Europe/Paris");
    }

    private function computeFileName(){
        /** Date **/
        $today = date("Y-m-d");
        $hms = date("H:i:s");

        $this->fileName = $today . "--" . $hms . ".json";
    }


    private function computeDirectoryPath(){
        $this->directoryPath = dirname(__FILE__) . "/../data/" . $this->serviceName;
    }
}