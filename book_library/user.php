<?php
    function checkuser($username, $password,$conn) {
        // $conn = condb();
        // $sql = $conn->prepare("SELECT * FROM user WHERE username='".$username."' AND pass='" .$password."'");
        // $sql->execute();
        // $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
        // $kq = $sql->fetchAll();
        // if(count($kq) > 0) return $kq[0]['roles'];
        // else return 0;
        $sql= "SELECT * FROM user WHERE username='".$username."' AND pass='" .$password."'";
        $query = mysqli_query($conn, $sql);
		
        $count=mysqli_num_rows($query);
        if($count>0){
            $user= mysqli_fetch_array($query);
            $role=$user['Roles'];
            return $role;
        }
       else return 0;

    }
?>