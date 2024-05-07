<?php

class EditMembersView{
    public function render($data){
        foreach($data['members'] as $val){
            list($id, $nama, $email, $phone, $join_date, $fanbase) = $val;

            // Default value for fanbase
            $selectedFanbaseId = $fanbase;

            // Generate options for fanbase select
            $dataFanbase = "";
            foreach($data['fanbase'] as $fanbaseVal) {
                list($fanbaseId, $nama_fanbase) = $fanbaseVal;
                $selected = ($fanbaseId == $selectedFanbaseId) ? "selected" : ""; // Check if fanbase is selected
                $dataFanbase .= "<option value='".$fanbaseId."' $selected>". $nama_fanbase ."</option>";
            }

            // Build member edit form
            $dataMembers = "
                <form method='post' action='index.php?id=" . $id . "' enctype='multipart/form-data'><br><br>
                <input type='hidden' name='id' value='" . $id . "'>
                    <div class='card'>
                        <div class='card-header bg-primary'>
                            <h1 class='text-white text-center'> Edit Member </h1>
                        </div><br>
                        <label> NAME: </label>
                        <input type='text' name='nama' class='form-control' value='" . $nama . "' required> <br>
                        <label> EMAIL: </label>
                        <input type='text' name='email' class='form-control' value='" . $email . "' required> <br>
                        <label> PHONE: </label>
                        <input type='text' name='phone' class='form-control' value='" . $phone . "' required> <br>
                        <label> Join Date: </label>
                        <input type='date' name='joining_date' class='form-control' value='" . $join_date . "' required> <br>
                        <label for='fanbase'>FANBASE: </label><br>
                        <select name='fanbase' class='form-select' required> 
                            <option disabled>Pilih Fanbase</option>
                            " . $dataFanbase . "
                        </select> <br>
                
                        <button class='btn btn-success' type='submit' name='submit'> Submit </button><br>
                        <a class='btn btn-info' type='submit' name='cancel' href='members.php'> Cancel </a><br>
                    </div>
                </form>";

            // Render the template
            $title = 'Members';
            $members = new Template("template/skinform.html");
            $members->replace("TITLE", $title);
            $members->replace("FORM", $dataMembers);
            $members->write();
        }
    }
}
