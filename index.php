<?php
require_once("controller.php");
?>

<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<head>
    <title>Тестирование экстрасенсов</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-3">
        </div>
        <div class="col-md-3">
        </div>
        <div class="col-md-3">
            <a href="https://github.com/opsandrew/extrasensory">Ссылка на репозиторий</a>
        </div>
    </div>
    <div style="height: 25%;" class="row">
        <div class="col-md-4">
        </div>
        <div style="margin: auto;" class="col-md-4">
            <?php echo $temlp ?>
        </div>
        <div class="col-md-4">

        </div>
    </div>
    <div style="height: 15%;" class="row">
        <div class="col-md-4">
        </div>
        <div style="margin: auto;" class="col-md-4">
            <?php echo $temlp2 ?>
        </div>
        <div class="col-md-4">

        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div style="text-align: center;" class="col-md-6">
            <?php echo $extra_answer; ?>
        </div>
        <div style="text-align: center;" class="col-md-2">

        </div>
    </div>
</div>
</body>
</html>


