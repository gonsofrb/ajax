<?php


if($_POST){
    require_once 'conexion.php';
    //validar el action
    if($_POST['action']=="searchContact"){
        //validamos si se envia un id
        if(!empty($_POST['id'])){
            $arrContact = array();
                    //intval convierte a entero la variable id
            $intId=intval($_POST['id']);
            $query_select=mysqli_query($conection,"SELECT * FROM ag_contacto WHERE id_contacto = $intId");
            $num_row =mysqli_num_rows($query_select);
            if($num_row > 0){
               $arrContact = mysqli_fetch_assoc($query_select);

              // print_r($arrContact);

                echo json_encode($arrContact,JSON_UNESCAPED_UNICODE);
            }else{
                echo "notData";
            }
            exit;
        }
    }

    //Buscar por input
    if($_POST['action']=='searchContactKey'){
       
        
        $searchData = $_POST['dataSearch'];
       $query_select = mysqli_query($conection,"SELECT * FROM ag_contacto WHERE  nombres LIKE '%$searchData%' OR apellidos LIKE '%$searchData%' OR telefono LIKE '%$searchData%' OR email LIKE '%$searchData%'");

       $num_rows = mysqli_num_rows($query_select);
            if($num_rows > 0){

                $htmlTable = '';
                    while ($row = mysqli_fetch_assoc($query_select)) {
                        $htmlTable .='<tr>
                                    <th scope="row">'.$row['id_contacto'].'</th>
                                    <td>'.$row['nombres'].'</td>
                                    <td>'.$row['apellidos'].'</td>
                                    <td>'.$row['telefono'].'</td>
                                    <td>'.$row['email'].'</td>
                                    </tr>';
                                  
                    }
                   // echo $htmlTable;
                  
                    echo json_encode($htmlTable,JSON_UNESCAPED_UNICODE);
            }else{
                    echo "notData";
            }
            exit;
    }
}


?>