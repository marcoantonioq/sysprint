<?php
namespace Sys\Model\Entity;

use Sys\Model\Entity\Server;

use Cake\ORM\Entity;

class Cups extends Entity
{
    private $cupsd_conf = "";
    private $cups_log = "/var/log/cups/page_log";
    private $printer_conf = "/etc/cups/printers.conf";
    private static $Server;


    public function getPrinters()
    {
    	return (object)Server::shell('getPrinters', $this->printer_conf);

    }

    public function readLogs()
    {
    	return (object)Server::shell('readLogs', $this->cups_log);
    }

    public function readLogsToJobs($value='')
    {
    	$jobs = null;
        $logs = $this->readLogs();

    	foreach ($logs as $key => $job_json) {
    		$job = json_decode($job_json, true);
            $time = str_replace(array("[", "]"), "",$job['time']);
            $time = preg_replace("/:/"," ",$time,1);
            $time = preg_replace("/\//","-",$time);
            $time = date("Y-m-d H:m:s", strtotime($time));
            $job['time'] = $time;	        
    		$jobs[] = $job;
    	}
    	return $jobs;
    }

    public static function setQuota($settings){
            $return = Server::shell("setLpadmin","Quota","-p '${settings['name']}' -o job-quota-period=${settings['quota_period']} -o job-page-limit=${settings['page_limite']} -o job-k-limit=${settings['k_limit']}");
    }



}
