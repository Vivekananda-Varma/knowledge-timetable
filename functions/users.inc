<?php

    function ValidateLogin($username, $password) {
    global $admin_username;
    global $admin_password;
        
        return ($username == $admin_username && $password == $admin_password);
    }
    
    function RequiresLogin() {
        if (!isset($_SESSION['login_user'])) {
            Redirect('/login/');
            exit;
        }
        
        return $_SESSION['login_user'];
    }

    function RequiresAdminLogin() {
        if (!isset($_SESSION['login_user'])) {
            Redirect('/login/');
            exit;
        }
        
        if (!$_SESSION['login_user']['is_admin']) {
            Redirect('/login/');
            exit;
        }
        
        return $_SESSION['login_user'];
    }
?>
