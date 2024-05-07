<?php

include_once("model/Template.class.php");
include_once("model/DB.class.php");
include_once("controller/Members.controller.php");

$members = new MembersController();

if(isset($_GET['action'])){
    if($_GET['action'] == 'delete'){
        $id = $_GET['id'];
        $members->delete($id);
    } else if($_GET['action'] == 'addform'){
        $members->addForm();
    } else if($_GET['action'] == 'editform'){
        $id = $_GET['id'];
        $members->editForm($id);
    }
} else if(isset($_POST['submit']) ) {
    if(isset($_POST['id'])){ 
        $id = $_POST['id']; 
        $members->edit($id, $_POST);
    } else {
        $members->add($_POST);
    }
} else {
    $members->index();
}
