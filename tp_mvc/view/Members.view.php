<?php

class MembersView{
    public function render($data){
        $no = 1;
        $dataMembers = null;
        $header = null;
        $header .="
        <tr>
            <th>NO</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>PHONE</th>
            <th>JOINING DATE</th>
            <th>FANBASE</yh>
            <th>ACTIONS</th>
        </tr>";
        foreach($data as $val){
            list($id, $nama, $email, $phone, $join_date, $fanbase) = $val;
            $dataMembers .="
            <tr>
              <th>" . $no++ .  "</th>
              <td>$val[nama]</td>
              <td>$val[email]</td>
              <td>$val[phone]</td>
              <td>$val[join_date]</td>
              <td>$val[nama_fanbase]</td>
              <td>
                        <a class='btn btn-success' href='index.php?action=editform&id=" . $id .  "'>Edit</a>
                        <a class='btn btn-danger' href='index.php?action=delete&id=" . $id . "'>Delete</a>
                      </td>
            </tr>";
        }

        $title = 'Members';
        $link = 'index.php?action=addform';
        $members = new Template("template/skintabel.html");

        $members->replace("TITLE", $title);
        $members->replace("HEADER", $header);
        $members->replace("DATA_TABLE", $dataMembers);
        $members->replace("LINK", $link);

        $members->write();
    }
}