<?php

include_once("model/Template.class.php");
include_once("model/DB.class.php");
include_once("controller/Fanbase.controller.php");

$fanbase = new FanbaseController();

if(isset($_POST['submit']) ) {
    if(isset($_POST['id'])){ 
        $id = $_POST['id']; 
        $fanbase->edit($id, $_POST);
    } else {
        $fanbase->add($_POST);
    }
} else if(isset($_GET['action'])){
    if($_GET['action'] == 'delete'){
        $id = $_GET['id'];
        $fanbase->delete($id);
    } else if($_GET['action'] == 'addform'){
        $fanbase->addForm();
    } else if($_GET['action'] == 'editform'){
        $id = $_GET['id'];
        $fanbase->editForm($id);
    }
} else {
    $fanbase->index();
}