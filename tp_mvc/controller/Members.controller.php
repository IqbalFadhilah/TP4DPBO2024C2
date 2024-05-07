<?php
include_once("conf.php");
include_once("model/Members.class.php");
include_once("model/Fanbase.class.php");
include_once("view/Members.view.php");
include_once("view/AddMembers.view.php");
include_once("view/EditMembers.view.php");

class MembersController {
  private $members;
  private $fanbase;

  function __construct(){
    $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->fanbase = new Fanbase(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->members->open();
    $this->members->getMembersJoin();
    $data = array();
    while($row = $this->members->getResult()){
      array_push($data, $row);
    }

    $this->members->close();

    $view = new MembersView();
    $view->render($data);
  }

  function addForm() {
    $this->fanbase->open();
    $this->fanbase->getFanbase();

    $data = array();
    while($row = $this->fanbase->getResult()) {
      array_push($data, $row);
    }

    $this->fanbase->close();

    $view = new AddMembersView();
    $view->render($data);
  }

  function editForm($id) {
    $this->members->open();
    $this->members->getMembersById($id);

    $this->fanbase->open();
    $this->fanbase->getFanbase();
    
    $data = array(
      'members' => array(),
      'fanbase' => array()  
    );

    while($row = $this->members->getResult()) {
      array_push($data['members'], $row);
    }

    while($row = $this->fanbase->getResult()) {
      array_push($data['fanbase'], $row);
    }

    $this->members->close();

    $this->fanbase->close();

    $view = new EditMembersView();
    $view->render($data);
  }

  function add($data){
    $this->members->open();
    $this->members->addMembers($data);
    $this->members->close();
    
    header("location:members.php");
  }

  function edit($id, $data){
    $this->members->open();
    $this->members->updateMembers($id, $data);
    $this->members->close();
    
    header("Location: members.php");
  }

  function delete($id){
    $this->members->open();
    $this->members->deleteMembers($id);
    $this->members->close();
    
    header("location:members.php");
  }
}