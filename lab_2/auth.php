<?php
session_start();
include 'C:\Users\Admin\Downloads\Open Server 5.3.5\OSPanel\domains\final-2lb-test\users.php';
$login = $_POST["login"];
$password = $_POST["password"];
$NumOfUsers = count($users);


for ($i = 0; $i < $NumOfUsers; $i++)
{	
	
    if (($login == $users[$i]['login']) && ($password == $users[$i]['password']))
    {
	    
	        $_SESSION['login'] = $users[$i]['login'];
	        $_SESSION['password'] = $users[$i]['password'];
	       
	        if ($users[$i]['role'] == 'admin'){
	            $_SESSION['role'] = $users[$i]['role'];
	            $_SESSION['name'] = $users[$i]['name'];
	            $_SESSION['surname'] = $users[$i]['surname'];
	            $_SESSION['lang'] = $users[$i]['lang'];	        
	            header('Location: users\admin.php');

	        }
	        
	        if ($users[$i]['role'] == 'manager'){
	            $_SESSION['role'] = $users[$i]['role'];
	            $_SESSION['name'] = $users[$i]['name'];
	            $_SESSION['surname'] = $users[$i]['surname'];
	            $_SESSION['lang'] = $users[$i]['lang'];	   
	            header('Location: users\manager.php'); 
	        }
	        
	        if ($users[$i]['role'] == 'client'){
	            $_SESSION['role'] = $users[$i]['role'];
	            $_SESSION['name'] = $users[$i]['name'];
	            $_SESSION['surname'] = $users[$i]['surname'];
	            $_SESSION['lang'] = $users[$i]['lang'];
	            header('Location: users\client.php'); 
	        }

    }
}

