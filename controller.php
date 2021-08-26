<?php
require_once("classes/extra.php");
require_once("classes/session.php");

if (empty(session_id())) {
    session_start();
    $a = session_id();
    $mUser = new Extra;
    $mUser->name = $a;
}


if (empty($_SESSION['extra_count'])) {
    $_SESSION['extra_count'] = $_POST['extra_count'];
}

if ($_SESSION['extra_count'] > 0) {
    $temlp = '<form method="post" id="ajax_form">
                Введите 2-х значное число: <input type="number" name="data" required min="01" max="99"><br>
                <input type="submit" value="Отправить">
            </form>';
} else {
    $temlp = '<form method="post" id="ajax_form">
                Укажите количество экстрасенсов (от 1 до 20): <input type="number" name="extra_count" required min="1" max="20"><br>
                <input type="submit" value="Отправить">
            </form>';
}
if (!empty($_POST['data'])) {
    $user_answer = $_POST['data'];
    $temlp2 = '<p>Число, загаданное пользователем: <span style="font-size: 24px;">'.$user_answer.'</span></p>';

    for ($i = 1; $i <= $_SESSION['extra_count']; $i++) {
        $extra = new Extra;
        $extra->name = 'extra' . $i;
        $SS = new Session($extra->name);
        $answer_extra = $extra->showAnswer();
        $SS->saveAnswer_to_session($answer_extra, $extra->name, $user_answer);

        if ($user_answer == $answer_extra) {
            $answer = '<span style="color: #1cb220;">' . $answer_extra . '</span>';
        } else {
            $answer = '<span style="color: red;">' . $answer_extra . '</span>';
        }
        $extra_answer .= '<div class="row">' . '<p style="text-align: left;">Ответ экстрасенса ' . $extra->name . ' Достоверность (' . $extra->credibility_count($extra->name) . ') : ' . $answer . '</p>';
        $extra_answer .= '<p style="text-align: left;">История: <br>' . $SS->showAnswer_in_session($extra->name) . '</p></div>';
    }
}


