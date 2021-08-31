<?php

class User extends Session
{
    public $name;
    public function __construct()
    {
    }

    public function showAnswer_in_session($name) {
        $result = parent::getAnswer_in_session($name);
        $answer = '';
        foreach ($result as $value) {
            $answer .= $value . ',';
        }
        return $answer;
    }
}