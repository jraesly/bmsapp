<?php
require 'boot.php';
class Process 
     { 
     private $descriptorspec; 
     private $process; 
     private $pipes; 
   
     public function __construct() 
         { 
         $this->descriptorspec = array( 
                    0 => array("pipe", "r"),  
                    1 => array("pipe", "w"),  
                    2 => array("file", "/tmp/error-output.txt", "a") 
             ); 
         } 
     public function connect($command) 
         { 
         $this->process = proc_open($command, 
                                    $this->descriptorspec, 
                                    $this->pipes); 
         if (!is_resource($this->process)) 
             return false; 
         } 
     
     public function send($message) 
         { 
         fwrite($this->pipes[0], $message); 
         fflush($this->pipes[0]); 
         } 
   
     public function read() 
         {    
            while (!feof($this->pipes[1])) 
                $response .= fgets($this->pipes[1], 1024); 
         
         fflush($this->pipes[1]); 
   
         return $response; 
         } 
   
     public function close() 
         { 
         fclose($this->pipes[0]); 
         fclose($this->pipes[1]); 
            return proc_close($this->process); 
         } 
     public function __destruct() 
         { 
         unset($this->descriptorspec); 
         } 
 } 

 $process =& new Process; 
 $process->connect($db_host); 
 $process->write(''); 
 $response = $process->read(); 
 $process->close(); 
   
// echo nl2br($response); 