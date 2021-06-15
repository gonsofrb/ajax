<?php 
    include_once 'database.php';

    if(isset($_POST['id'])){
        $id = $_POST['id'];
         $query = "SELECT * FROM tasks WHERE id='$id'";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die('Query Failed');
        }

        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] = array(
                'name'=>$row['name'],
                'description'=>$row['description'],
                'id'=>$row['id']
            );
        }

        //se pone [0] para que devuelva el primer resultado
       $jsonString=json_encode($json[0]);
       echo $jsonString;
     }
 
?>