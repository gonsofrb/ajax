$(document).ready(function(){
   if($('#btnSearch').length){
        $('#btnSearch').click(function(){
            const id=$('#txtSearch').val();
            //console.log(id);
            const action= 'searchContact';
            var dataContact = "";
            //Estructura de ajax
            $.ajax({
                //donde va a ir a la información
                url: 'ajaxData.php',
                type:"POST",
                async: true,
                data:{
                    action:action,
                    id:id
                },

                //Ejecutarse al momento de enviar la información
                beforeSend: function(){

                },

                success: function(response) {
                  //  console.log(response);
                    if(response=='notData'){
                         dataContact = "No hay registro para mostrar";
                    }else{
                        var info = JSON.parse(response);
                       //functions.js$('#rowsContact').html(info.nombres);
                        dataContact = `<tr>
                                        <th scope="row">${info.id_contacto}</th>
                                        <td>${info.nombres}</td>
                                        <td>${info.apellidos}</td>
                                        <td>${info.telefono}</td>
                                        <td>${info.email}</td>
                                    </tr>`;
                    }
                    $('#rowsContact').html(dataContact);
                },
                error: function(error) {
                console.log(error);
                }
            });
            
        });
   }

   if($('#txtSearch').length){
        $('#txtSearch').keyup(function(){
            const dataSearch = $('#txtSearch').val();
           // console.log(dataSearch);
            const action = 'searchContactKey';
            var dataContact = '';
            //Estructura de ajax
            $.ajax({
                //donde va a ir a la información
                url: 'ajaxData.php',
                type:"POST",
                async: true,
                data:{
                    action:action,
                    dataSearch:dataSearch
                },
                //Ejecutarse al momento de enviar la información
                beforeSend: function(){
                },
                success: function(response) {
                    //console.log(response);
                    if(response == 'notData'){
                         dataContact = "No hay registro para mostrar";
                    }else{
                       // console.log(response);
                        var info = JSON.parse(response);
                        dataContact = info;
                    }
                    $('#rowsContact').html(dataContact);
                },
                error: function(error) {
               
                }
            }); 
        });
    }


});//End Ready