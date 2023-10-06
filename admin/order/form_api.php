<?php
  session_start();
  require_once('../../utils/utility.php');
  require_once('../../db/dbhelper.php');

  $user = getUserToken();
  if($user == null) {
    die();
  }
  if (!empty($_POST)) {
    
    $action = getPost('action');

    switch($action){
      case 'update_status':
        changeStatus();
        break;
    }
  }
  function changeStatus(){
    $id=getPost('id');
    $status=getPost('status');

    // $order_date=date("Y-m-d H:i:s");
    $sql = "update orders set status = $status where id = $id";
    execute($sql);
  }