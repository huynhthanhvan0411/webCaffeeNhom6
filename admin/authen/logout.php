<?php
session_start();

require_once('../../utils/utility.php');
require_once('../../db/dbhelper.php');
$token = getCookie('token');
setCookie('token','',time()-100,'/');

session_destroy();
header('location:../../admin/authen/login.php');
?>
<!-- echo "<script>
                alert('Đăng xuất thành công!');
                window.location = '../../admin/authen/login.php';
            </script>"; -->