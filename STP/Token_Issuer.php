<?php
//Name - Malwenna T.H
//SID  -  IT15150844

session_start();

//Checking Request Type and Loging Status
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

    //Extract User Session ID from Ajax Request
  $SESSION_ID = $_POST['cookieValue'];

  if (!isset ($_SESSION['LoginState'])){
      ob_start();
      header('Location: localhost/Login.html');
      ob_end_flush();
      die();

  } else {

      //Opening Matched Token File and Retrive CSRF Token Using $SESSION_ID
      $TOKEN_FILE = fopen(getcwd().'\tokens\\'.$SESSION_ID.".txt", "r") or die ("Invalid Token !!!");
      $TOKEN = fread($TOKEN_FILE, filesize(getcwd().'\tokens\\'.$SESSION_ID.".txt"));
      fclose($TOKEN_FILE);

      //Generating Ajax Response
	    header('Content-Type: application/json');
      echo json_encode($TOKEN);
  }

} else {
  ob_start();
  header('Location: localhost/Login.html');
  ob_end_flush();
  die();
}
?>
