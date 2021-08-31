<?php
require_once("classes/session.php");
require_once("classes/extra.php");
require_once("classes/user.php");

if (empty(session_id())) {
    session_start();
    $a = session_id();
    $mUser = new User;
    $mUser->name = $a;
}


if (empty($_SESSION['extra_count'])) {
    $_SESSION['extra_count'] = $_POST['extra_count'];
}

if ($_SESSION['extra_count'] > 0) {
    $temlp = '<form method="post" id="ajax_form">
                Введите 2-х значное число: <input type="number" name="data" required min="10" max="99"><br>
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
    $SD = new Session($mUser->name);
    $user_answer_old = $mUser->showAnswer_in_session($mUser->name, 'user');
    $mUser->saveUserAnswer_to_session($mUser->name, $user_answer);
    $temlp2 = '<p>Число, загаданное пользователем: <span style="font-size: 24px;">' . $user_answer . '</span>(' . $user_answer_old . ')</p>';
    $extra_answer = '';
    for ($i = 1; $i <= $_SESSION['extra_count']; $i++) {
        $extra = new Extra;
        $extra->name = 'extra' . $i;
        $answer_extra = $extra->showAnswer();
        if ($user_answer == $answer_extra) {
            $style = 'color: #1cb220';} else {$style = 'color: red';}

        $answer = '<span style="'.$style.'">' . $answer_extra . '</span>';
        $history = $extra->showAnswer_in_session($extra->name);
        $extra->saveAnswer_to_session($extra->name, $answer_extra, $user_answer);
        $extra_answer .= '<div class="row">' . '<p style="text-align: left;">Ответ экстрасенса ' . $extra->name . ' Достоверность (' . $extra->credibility_count($extra->name) . ') : ' . $answer . '</p>';
        $extra_answer .= '<p style="text-align: left;">История: <br>' . $history . '</p></div>';

    }

}