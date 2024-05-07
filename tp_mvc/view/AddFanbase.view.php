<?php

class AddFanbaseView{
    public function render($data = null){
        $dataFanbase = null;
            $dataFanbase .="
            <form method='post' action='fanbase.php'><br><br>
                <div class='card'>
                    <div class='card-header bg-primary'>
                        <h1 class='text-white text-center'>  Create New fanbase </h1>
                    </div><br>
                    <label> NAME: </label>
                    <input type='text' name='nama_fanbase' class='form-control' required> <br>
            
                    <button class='btn btn-success' type='submit' name='submit'> Submit </button><br>
                    <a class='btn btn-info' type='submit' name='cancel' href='fanbase.php'> Cancel </a><br>
                </div>
            </form>";
    
        $title = 'fanbase';
        $fanbase = new Template("template/skinform.html");

        $fanbase->replace("TITLE", $title);
        $fanbase->replace("FORM", $dataFanbase);

        $fanbase->write();
    }
}