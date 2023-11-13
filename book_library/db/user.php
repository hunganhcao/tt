<?php
    function checkuser($username, $password) {
        $conn = condb();
        $sql = $conn->prepare("SELECT * FROM user WHERE username='".$username."' AND pass='" .$password."'");
        $sql->execute();
        $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $sql->fetchAll();
        if(count($kq) > 0) return $kq[0]['roles'];
        else return 0;
    }
    function getuser($username, $password) {
        $conn = condb();
        $sql = $conn->prepare("SELECT * FROM user WHERE username='".$username."' AND pass='" .$password."'");
        $sql->execute();
        $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $sql->fetchAll();
        return $kq;
    }
?>