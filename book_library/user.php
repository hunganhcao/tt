<?php
    function checkuser($username, $password,$conn) {
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