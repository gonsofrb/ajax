<?php
    include_once 'database.php';

    $search = $_POST['search'];
    if(!empty($search)){
        $query = "SELECT * FROM tasks WHERE name LIKE '$search%'";
       $result = mysqli_query($connection,$query);
       if(!$result){
           die('Query Error'.mysqli_error($connection));
       }

       $json = array();
       while($row = mysqli_fetch_array($result)){
           //Se recorre todo el array y se convierte un json
            $json[]= array(
                'id'=>$row['id'],
                'name'=>$row['name'],
                'description'=>$row['description']
            ); 

            
       }

       //SE parsea a string y se devuelve en formato string
       $jsonString =json_encode($json);
       echo $jsonString;
       
       
    }   
       
      


?>