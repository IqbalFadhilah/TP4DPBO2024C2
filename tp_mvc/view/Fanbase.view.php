<?php

class FanbaseView{
    public function render($data){
        $no = 1;
        $dataFanbase = null;
        $header = null;
        $header .="
        <tr>
            <th>ID</th>
            <th>NAMA</th>
            <th>ACTION</th>
        </tr>";
        foreach($data as $val){
            list($id, $nama_fanbase) = $val;
            $dataFanbase .="
            <tr>
                <th>" . $no++ .  "</th>
              <td>$val[nama_fanbase]</td>
              <td>
                        <a class='btn btn-success' href='fanbase.php?action=editform&id=" . $id .  "'>Edit</a>
                        <a class='btn btn-danger' href='fanbase.php?action=delete&id=" . $id . "'>Delete</a>
                      </td>
            </tr>";
        }

        $title = 'Fanbase';
        $link = 'fanbase.php?action=addform';
        $fanbase = new Template("template/skintabel.html");

        $fanbase->replace("TITLE", $title);
        $fanbase->replace("HEADER", $header);
        $fanbase->replace("DATA_TABLE", $dataFanbase);
        $fanbase->replace("LINK", $link);

        $fanbase->write();
    }
}