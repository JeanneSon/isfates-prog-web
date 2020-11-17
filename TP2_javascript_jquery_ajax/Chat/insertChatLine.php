<?php
if( (isset($_POST['pseudo'])) && (isset($_POST['message'])) )
  { $pseudo=trim($_POST['pseudo']);
    $message=trim($_POST['message']);
    if(($pseudo!='')&&($message!=''))
	  { file_put_contents(	'chatData.txt',
							$pseudo.' > '.$message."<br />\n", 
							FILE_APPEND | LOCK_EX);
	  }
  }
?>
