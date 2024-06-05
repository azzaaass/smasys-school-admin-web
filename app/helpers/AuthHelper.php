<?php

class AuthHelper {
    public static function check() {
        return isset($_SESSION['user_id']);
    }

    public static function redirectIfNotAuthenticated() {
        if (!self::check()) {
            header('Location: '. BASEURL .'/authcontroller/login');
            exit;
        }
    }
}