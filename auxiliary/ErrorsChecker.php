<?php

session_start();

/**
 * Description of ErrorsChecker
 *
 * @author User
 */
class ErrorsChecker {
    
    public static function CheckErrors(): array {
        $errors = [];
        if (isset($_SESSION['sn_errors'])) {
            $errors = $_SESSION['sn_errors'];                
        } elseif (isset($_SESSION['db_conn_error'])) {
            $errors[] = $_SESSION['db_conn_error'];
        }
        return $errors;
    }
}
