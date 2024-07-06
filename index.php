<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('framework/fw.php');
require_once('conf/db.php');

$controller_guest_allowed=array(
    'login',
    'register',
    'showcase',
    'showcourses'
);
$controller='';
$function='';
if(!empty($_GET['p'])){
    $p=$_GET['p'];
    $seg=explode('/',$p);
    $controller=$seg[0];
    if(!empty($seg[1]))$function=$seg[1];
    }

    if(empty($controller)){
        $controller='showcourses';
    }
    
    if(empty($_SESSION['user'])&&!is_numeric(array_search($controller,$controller_guest_allowed))){
        //print "Restrict access.";
        print "<b>ท่านยังไม่ได้เข้าสู่ระบบ</b><br>
        ระบบกำลังพาไปหน้าเข้าสู่ระบบ โปรดรอสักครู่..";
        print redirect(site_url('login'),2);
        exit();
    }
    fw_run($controller,$function);
    define('EVERYTHING_WENT_OK', TRUE);
