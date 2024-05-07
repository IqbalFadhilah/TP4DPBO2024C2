<?php

class AddMembersView{
    public function render($data = null){
        $dataFanbase = null;
        foreach($data as $val) {
            list($id, $nama_fanbase) = $val;
            $dataFanbase .= "<option value='".$id."'>". $nama_fanbase ."</option>";
        }

        $dataMembers = null;
            $dataMembers .="
            <form method='post' action='index.php'><br><br>
                <div class='card'>
                    <div class='card-header bg-primary'>
                        <h1 class='text-white text-center'>  Create New Member </h1>
                    </div><br>
                    <label> NAME: </label>
                    <input type='text' name='nama' class='form-control' required> <br>
                    <label> EMAIL: </label>
                    <input type='text' name='email' class='form-control' required> <br>
                    <label> PHONE: </label>
                    <input type='text' name='phone' class='form-control' required> <br>
                    <label> Join Date: </label>
                    <input type='date' name='join_date' class='form-control' requierd> <br>
                    <label for='fanbase'>FANBASE: </label><br>
                    <select name='fanbase' class='form-select' required> 
                        <option selected disabled>Pilih Fanbase</option>
                        ' . $dataFanbase . '
                    </select> <br>
                    <button class='btn btn-success' type='submit' name='submit'> Submit </button><br>
                    <a class='btn btn-info' type='submit' name='cancel' href='members.php'> Cancel </a><br>
                </div>
            </form>";
    
        $title = 'Members';
        $members = new Template("template/skinform.html");

        $members->replace("TITLE", $title);
        $members->replace("FORM", $dataMembers);

        $members->write();
    }
}