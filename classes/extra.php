<?php

class Extra
{
    public $name;

    public function showAnswer()
    {
        return rand(01, 99);
    }

    public function credibility_count($name)
    {
        $credibility = 0;
            foreach ($_SESSION['rez' . $name] as $items) {
                if ($items == 0) {
                    $credibility --;
                }
                else {
                    $credibility ++;
                }
            }
            return $credibility;
    }
}
