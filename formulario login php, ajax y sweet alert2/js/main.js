$('#formLogin').submit(function(e){
    e.preventDefault();
    var usuario =$.trim($('#usuario').val());
    var password =$.trim($('#password').val());

   // console.log(usuario.length);
    console.log(usuario);
    console.log(password);
    if(usuario.length == "" || password.length == ""){
       Swal.fire({
        icon:'warning',
        title:'Debe ingresar un usuario y/o password.'
       });
       return false;
    }else{
        //Envio de los datos por ajax
        $.ajax({
            url:"bd/login.php",
            type:"POST",
            datatype:"json",
            data:{usuario:usuario,password:password},
            success:function(data){
                if(data == "null"){
                    Swal.fire({
                        icon:'error',
                        title:'Usuario y/o password incorrecta',
                    });
                }else{
                    Swal.fire({
                        icon:'success',
                        title:'¡Conexión exitosa!',
                        confirmButtonColor:'#3985d6',
                        confirmButtonText:'Ingresar'
                    }).then((result) => {
                        if(result.value){
                            window.location.href = "vistas/pagina_inicio.php";
                        }
                    })
                }
            }
        });
    }
});