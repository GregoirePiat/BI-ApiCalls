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
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $useCredentials;

    /**
     * ApiCall constructor.
     * @param string        $apiUrl
     * @param string        $serviceName
     * @param boolean       $useCredentials
     */
    public function __construct($apiUrl, $serviceName, $useCredentials = false)
    {
        $this->useCredentials = $useCredentials;

        if (isset($this->useCredentials))
            $this->extractCredentials();

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

        if ($this->useCredentials)
            curl_setopt($session, CURLOPT_USERPWD, $this->username . ":" . $this->password);

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

    private function extractCredentials(){

        $credentialsPath = dirname(__FILE__) . "/../Credentials/Credentials.json";

        if (file_exists($credentialsPath)) {
            $jsonContent = json_decode(file_get_contents($credentialsPath));
            if (isset($jsonContent->username))
                $this->username = $jsonContent->username;
            if (isset($jsonContent->password))
                $this->password = $jsonContent->password;
        }
    }
}