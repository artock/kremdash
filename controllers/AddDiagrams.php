<?php

    if (isset($_POST['title']) && isset($_POST['dat-diag']) && isset($_POST['quality']) && isset($_POST['dat-line-diag']) && isset($_POST['period-line-diag']) && isset($_POST['diag-ver'])) {

      $diagLineDat = trim($_POST['dat-line-diag']);
      $diagDatPeriod = trim($_POST['period-line-diag']);
      $diagLineDat = explode(" ", $diagLineDat);
      $diagDatPeriod = explode(" ", $diagDatPeriod);
      if(sizeof($diagLineDat) == sizeof($diagDatPeriod)){
          $diagram = new DiagramCRUD($_POST['title'], $_POST['dat-diag'], $_POST['quality'], $_POST['diag-ctg'], $diagLineDat, $diagDatPeriod, $_POST['diag-ver']);
          $diagram->store();
      }else{
          echo "Неправильно введені дані для лінійної діаграми";
      }
  }else{
      echo "Дані введені в повному обсязі!";
  }


 ?>
