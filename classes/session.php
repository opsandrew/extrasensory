<?php

class Session
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
        if (!$_SESSION[$id]) {
            $_SESSION[$id] = [];
        }

    }

    public function saveAnswer_to_session($name, $answer, $user_answer)
    {
        if (!$_SESSION[$name]) {
            $_SESSION[$name] = [];
        }
        array_push($_SESSION[$name], $answer);

        if (!$_SESSION['rez' . $name]) {
            $_SESSION['rez' . $name] = [];
        }

        if ($answer == $user_answer) {
            array_push($_SESSION['rez' . $name], '1');
        } else {
            array_push($_SESSION['rez' . $name], '0');
        }
    }

    public function getAnswer_in_session($name)
    {
        return $_SESSION[$name];
    }

    public function saveUserAnswer_to_session($username, $user_answer)
    {
        array_push($_SESSION[$username], $user_answer);
    }


    public function getCredibility_count($name)
    {
        return $_SESSION['rez' . $name];
    }

}