<?php

class EditFanbaseView{
    public function render($data){
        $dataFanbase = "";
        foreach($data as $val){
            list($id, $nama_fanbase) = $val;
                $dataFanbase .="
                <form method='post' action='fanbase.php?id=" . $id . "' enctype='multipart/form-data'><br><br>
                <input type='hidden' name='id' value='" . $id . "'>
                    <div class='card'>
                        <div class='card-header bg-primary'>
                            <h1 class='text-white text-center'> Edit fanbase </h1>
                        </div><br>
                        <label> NAME: </label>
                        <input type='text' name='nama_fanbase' class='form-control' value='" . $nama_fanbase . "' required> <br>
                        
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
}
