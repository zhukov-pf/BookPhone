<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/classes/phones.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/classes/formgen.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/classes/formFunction.php');

?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Bookphone - Добавить новый контакт</title>

    <link href="/lib/css/style.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="/lib/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/lib/css/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Bookphone - Телефонный справочник</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="/">Главная</a></li>
            <li class="active"><?php Phones::addMenu(); ?></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="starter-template">

        <form role="form" method="post">
            <input type="text" class="form-control" name="surname" placeholder="Фамилия">
            <input type="text" class="form-control" name="name" placeholder="Имя" required>
            <input type="text" class="form-control" name="patronymic" placeholder="Отчество">
            <select class="form-control" name="company" required>
                <option disabled selected>Выберите компанию</option>
                <?php formGen::genCompany(); ?>
            </select>
            <select class="form-control" name="deportamnt" required>
                <option disabled selected>Выберите отдел</option>
                <?php formGen::genDeportament(); ?>
            </select>
            <select class="form-control" name="position" required>
                <option disabled selected>Выберите должность</option>
                <?php formGen::genPosition(); ?>
            </select>
            <input type="text" class="form-control" name="number" placeholder="Телефон" required><br>
            <input type="submit" class="btn btn-success" name="add" value="Добавить">
            <input type="reset" class="btn btn-danger" value="Удалить">
        </form>
        <?php formFunction::addPhone(); ?>

      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>