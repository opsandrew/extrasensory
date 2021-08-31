<?php

class Extra extends Session
{
    public $name;

    public function __construct()
    {
    }

    public function showAnswer()
    {
        return rand(01, 99);
    }

    public function showAnswer_in_session($name)
    {
        $result = parent::getAnswer_in_session($name);
        $answer = '';
        foreach ($result as $value) {
            $answer .= $value . '<br>';
        }
        return $answer;
    }

    public function credibility_count($name)
    {
        $result = parent::getCredibility_count($name);
        $credibility = 0;
        foreach ($result as $items) {
            if ($items == 0) {
                $credibility--;
            } else {
                $credibility++;
            }
        }
        return $credibility;
    }


}
