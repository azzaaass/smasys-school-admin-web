<?php

class Flasher
{
    public static function setFlasher($status, $message)
    {
        $_SESSION['flash'] = [
            'status' => $status,
            'message' => $message
        ];
    }
    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            if ($_SESSION['flash']['status'] == 'success') {
                echo "<div id='alert-panel' class='alert alert-primary alert-dismissible fade show' role='alert'>" .
                    $_SESSION['flash']['message'] .
                    "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'" .
                    "onclick='alertHandle()'></button>" .
                    "</div>";
            } else if ($_SESSION['flash']['status'] == 'error') {
                echo "<div id='alert-panel' class='alert alert-danger alert-dismissible fade show' role='alert'>" .
                    $_SESSION['flash']['message'] .
                    "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'" .
                    "onclick='alertHandle()'></button>" .
                    "</div>";
            }
        }
        unset($_SESSION['flash']);
    }
}