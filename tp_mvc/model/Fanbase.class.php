<?php

class Fanbase extends DB
{
    function getFanbase()
    {
        $query = "SELECT * FROM fanbase";
        return $this->execute($query);
    }

    function getFanbaseById($id)
    {
        $query = "SELECT * FROM fanbase WHERE id_fanbase = $id";
        return $this->execute($query);
    }

    function addFanbase($data)
    {
        $nama_fanbase = $data['nama_fanbase'];

        $query = "INSERT INTO fanbase VALUES ('','$nama_fanbase')";
        return $this->execute($query);
    }

    function updateFanbase($id, $data)
    {
        $nama_fanbase = $data['nama_fanbase'];

        $query = "UPDATE fanbase SET nama_fanbase='$nama_fanbase' WHERE id_fanbase=$id";
        return $this->execute($query);
    }


    function deleteFanbase($id)
    {
        $query = "DELETE FROM fanbase WHERE id_fanbase = '$id'";
        return $this->execute($query);
    }
}


?>