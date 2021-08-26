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

    public function saveAnswer_to_session($answer, $name, $user_answer)
    {
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

    public function showAnswer_in_session($name)
    {
        foreach ($_SESSION[$name] as $value) {
            $answer_old .= $value . '<br>';
        }
        return $answer_old;
    }
}