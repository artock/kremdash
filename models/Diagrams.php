<?php

class DiagramCRUD {

#   Обьявляем поля класса
  private $diagTitle;
  private $lineDiagDat;
  private $linePeriod;
  private $diagDat;
  private $diagQty;
  private $diagCtg;
  private $diagVer;

#   Конструктор класса
  public function __construct($title, $dataDiag, $qty, $ctg, $lineDat, $period, $version){
      $this->diagTitle = $title;
      $this->diagDat = $dataDiag;
      $this->diagQty = $qty;
      $this->diagCtg = $ctg;
      $this->lineDiagDat = $lineDat;
      $this->linePeriod = $period;
      $this->diagVer = $version;
  }

#   Методы класса
#         Кодировка полученых данных для сохранения в базу [json]
  public function list_props($dat ,$is_json = false){
     if(!$is_json)
       return $dat;
     else
       return json_encode($dat);
  }
#         Получение из базы по id
  public static function get($id){
      $diagDat = R::load('diagrams', $id);
      $diagItem = array();

      $diagItem['title'] = $diagDat->diagTitle;
      $diagItem['diagCircleDat'] = $diagDat->diagDat;
      $diagItem['diagCircleQty'] = $diagDat->diagQty;
      $diagItem['diagCtg'] = $diagDat->diagCtg;
      $diagItem['diagVer'] = $diagDat->diagVer;
      $diagItem['lineDiagDat'] = json_decode($diagDat->lineDiagDat, true);
      $diagItem['linePeriod'] = json_decode($diagDat->linePeriod, true);

      return $diagItem;
  }
#         Сохранение в базе
  public function store(){
      $diagram = R::dispense('diagrams');

      $diagram->diagTitle = $this->diagTitle;
      $diagram->diagDat = $this->diagDat;
      $diagram->diagQty = $this->diagQty;
      $diagram->diagCtg = $this->diagCtg;
      $diagram->lineDiagDat = $this->list_props($this->lineDiagDat, true);
      $diagram->linePeriod = $this->list_props($this->linePeriod, true);
      $diagram->diagVer = $this->diagVer;

      R::store($diagram);
  }

}

?>
