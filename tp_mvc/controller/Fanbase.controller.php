<?php
include_once("conf.php");
include_once("model/fanbase.class.php");
include_once("view/Fanbase.view.php");
include_once("view/AddFanbase.view.php");
include_once("view/EditFanbase.view.php");

class FanbaseController {
  private $fanbase;

  function __construct(){
    $this->fanbase = new Fanbase(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->fanbase->open();
    $this->fanbase->getFanbase();
    $data = array();
    while($row = $this->fanbase->getResult()){
      array_push($data, $row);
    }

    $this->fanbase->close();

    $view = new FanbaseView();
    $view->render($data);
  }

  function addForm() {
    $view = new AddFanbaseView();
    $view->render();
  }

  function editForm($id) {
    $this->fanbase->open();
    $this->fanbase->getFanbaseById($id);
    
    $data = array();
    while($row = $this->fanbase->getResult()) {
      array_push($data, $row);
    }

    $this->fanbase->close();

    $view = new EditFanbaseView();
    $view->render($data);
  }

  function add($data){
    $this->fanbase->open();
    $this->fanbase->addFanbase($data);
    $this->fanbase->close();
    
    header("location:fanbase.php");
  }

  function edit($id, $data){
    $this->fanbase->open();
    $this->fanbase->updateFanbase($id, $data);
    $this->fanbase->close();
    
    header("Location: fanbase.php");
  }

  function delete($id){
    $this->fanbase->open();
    $this->fanbase->deleteFanbase($id);
    $this->fanbase->close();
    
    header("location:fanbase.php");
  }
}