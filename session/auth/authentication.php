<?php

namespace Education;

class Authentication
{
    public $login = 'user';
    public $pass = 'pass';
    public $error = false;

    /**
     * @return bool
     */
    public function isAuth()
    {
        return $_SESSION['is_auth'] ?? false;
    }

    /**
     * @param string $login
     * @param string $pass
     * @return bool
     */
    public function auth($login, $pass)
    {
        if ($login === $this->login && $pass === $this->pass) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['is_auth'] = true;
            $_SESSION['login'] = $login;
            return true;
        } else {
            $_SESSION['is_auth'] = false;
            $this->error = true;
            return false;
        }
    }

    /**
     * @return string|bool
     */
    public function getLogin()
    {
        if ($this->isAuth()) {
            return $_SESSION['login'];
        }
        return false;
    }

    /**
     * @return void
     */
    public function logOut()
    {
        $_SESSION[] = [];
        session_destroy();
    }
}
