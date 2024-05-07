<?php

class Members extends DB
{
    function getMembersJoin()
    {
        $query = "SELECT * FROM members JOIN fanbase ON members.fanbase=fanbase.id_fanbase ORDER BY members.id_member";
        return $this->execute($query);
    }

    function getMembers()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function getMembersById($id)
    {
        $query = "SELECT * FROM members JOIN fanbase ON members.fanbase=fanbase.id_fanbase WHERE id_member = $id";
        return $this->execute($query);
    }

    function addMembers($data)
    {
        $nama = $data['nama'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $fanbase = $data['fanbase'];

        $query = "INSERT INTO members VALUES ('','$nama', '$email', '$phone', '$join_date', '$fanbase')";
        return $this->execute($query);
    }

    function updateMembers($id, $data)
    {
        $nama = $data['nama'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['joining_date'];
        $fanbase = $data['fanbase'];

        $query = "UPDATE members SET nama='$nama', email='$email', phone='$phone', join_date='$join_date', fanbase='$fanbase' WHERE id_member=$id";
        return $this->execute($query);
    }


    function deleteMembers($id)
    {
        $query = "DELETE FROM members WHERE id_member = '$id'";
        return $this->execute($query);
    }
}


?>