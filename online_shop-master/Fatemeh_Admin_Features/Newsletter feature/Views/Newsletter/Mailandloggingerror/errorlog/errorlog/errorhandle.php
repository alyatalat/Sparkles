<?php
ini_set('display_errors',0);
error_reporting(0);

function nerrorhandler($errno,$errmsg,$filename,$linenum,$vars){
  $errortype = array(
      E_ERROR => "Error",
      E_WARNING => "warning",
      'E_PARSE' => "parse error",
      "E_NOTICE" => "Notice",
      E_USER_ERROR => " user Error",
      E_USER_WARNING => "user warning",
      E_USER_NOTICE => "user Notice"
      
      
  );
  
  
  $dt = date('Y-m-d H:i:s');
  $err = "Error reporting\n";
  $err .= "\t Date Time: " . $dt . "\n";
  $err .= "\t Error Number: " . $errno . "\n";
  $err .= "\t Error Type: " . "[$errno]" . "\n";
  $err .= "\t Error Message: " . $errmsg . "\n";
  $err .= "\t file name: " . $filename . "\n";
  $err .= "\t Error line number: " . $linenum . "\n";
  $err .= "End reporting\n";
  
  
  error_log($err,3, dirname(__FILE__). '\logerrors\error_log.log');
  
  //error_log("sometext", 1, "zigzag@my.domain",   "Subject: Foo\nFrom: Rizzlas@my.domain\n");
  header("Location: customerror.php");
  
  
  
    
}


set_error_handler("nerrorhandler");


?>
