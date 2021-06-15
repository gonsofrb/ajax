$(document).ready(function(){

    let edit = false;
    //Ocultamos el elemento con # task_result.
    $('#task-result').hide();

    //ejecutamos la funcion
    fechTasks();

    //Capturar el input con el id search
    $('#search').keyup(function(e){

        //Si el usuario a tipeado algo, que haga la búsqueda...sino, que no envie nada al servidor.
       if($('#search').val()){

        let search = $('#search').val();
        //console.log(search);
        //Enviamos los datos el servidor con jquery con su metodo ajax
        $.ajax({
            url:'task-search.php',
            type:'POST',
            data: {search:search},
            success:function(response){
                 //console.log(response);
                 //convertimos un objeto json d string y convertir en json
                 let tasks = JSON.parse(response);
                 let template = '';
                 //console.log(tasks);
                 //Recorrer todas las tareas
                 tasks.forEach(task => {
                     //con estos tildes se coloca dentro un valor string
                     template += `<li>
                         ${task.name}
                     </li>`
                 });
                     //Indicamos que en ul , almacene todas las tareas de la busqueda
                 $('#container').html(template);

                 //Mostramos el div cuando hay resultados.
                 $('#task-result').show();
                }
            })
       }
    })


    //Seleccionamos el formulario para enviar datos, enviar una nueva tarea
    $('#task-form').submit(function (e){
    
        const postData = {
            name:$('#name').val(),
            description: $('#description').val(),
            id: $('#taskId').val()
        };

        let url = edit === false ? 'task-add.php' : 'task-edit.php';
        
        console.log(url);
        //Donde vamos a enviar los datos task-add.php, los datos a enviar, que vamos hacer cuando reciba una respuesta.
        $.post(url, postData, function (response){
            console.log(response);
                fechTasks();

                //Reseteamos el formulario
                $('#task-form').trigger('reset');
        });
        e.preventDefault();
            
        
       
        
    });

    //Pedir datos lista, se ejecuta al iniciar la aplicacion
    function fechTasks(){
    $.ajax({
        url: 'task-list.php',
        type: 'GET',
        success: function(response){
           // console.log(response);
            let tasks=JSON.parse(response);
            let template = '';
            tasks.forEach(task =>{
                template += `
                    <tr taskId="${task.id}">
                        <td>${task.id}</td>
                        <td>
                            <a href="#" class="task-item">${task.name}</a>
                        </td>
                        <td>${task.description}</td>
                        <td>
                            <button class=" task-delete btn btn-danger">
                                Delete
                            </button>
                        </td>
                    </tr>
                `
            });

            //seleccionamos el elemento para mostrar las tareas
            $('#tasks').html(template);
        }
    });

    }
    

    //Borrar tarea
    $(document).on('click', '.task-delete', function(){

        //Confirmación, si se clicke si, se borra.
       if(confirm('Are you sure you want to delete it?')){
        // console.log('clicked');

       //Para ver el elemento que ha sido clickeado, y mandarle el id al backend para eliminarlo.
       //console.log($(this));
       //obtenemos la fila del boton que ha sido clickeado
       let element = $(this)[0].parentElement.parentElement;
       //obtenemos el id del boton clickeado
      let id =  $(element).attr('taskId');
       console.log(id);
       //enviamos el id al backend para eliminar, el id, y funcion que escucha la respuesta del backend 
       $.post('task-delete.php',{id}, function(response){

            //Recargamos la tabla y nos muestra la tabla con las tareas actualizadas.
            fechTasks();
       });
       }
    });


    //Actualizar tarea
    $(document).on('click','.task-item',function(){
       //console.log('editing');
       let element = $(this)[0].parentElement.parentElement;
       let id = $(element).attr('taskId');
       console.log(id);

       //Enviamos los datos sl servidor
       $.post('task-single.php', {id}, function(response){

        console.log(response);
        const task = JSON.parse(response);
        $('#name').val(task.name);
        $('#description').val(task.description);
        $('#taskId').val(task.id);
        edit = true;

       })
    });
});