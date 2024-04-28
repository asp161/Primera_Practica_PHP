


function validarFormulario(){
   
    

    validarUsuario();
    validarContrasena();
    validarEmail();
    validarSexo();
    


    
}



function validarUsuario(){
  
    let usu = document.getElementById('usuarioreg').value;

    if(document.getElementById("usuarioreg").value.trim() == "") {  
       alert("El usuario no puede estar vacio");
       return false; 
    }  
   
    if(usu.length < 3 || usu.length >15){
       alert("El usuario tiene que tener entre 3 y 15 caracteres");
    }

    if (document.getElementById('usuarioreg').value == "") {
        alert("Debes escribir algo en el usuario");
    } else {
        for (let i = 0; i < usu.length; i++) {
            if(usu.charCodeAt(0)>=48 && usu.charCodeAt(0)<=57){
                alert("En el usuario has empezado con un número");
                i = usu.length;
            }
            if (usu.charCodeAt(i) <= 44) {
                alert("En el usuario has puesto caracteres no válidos");
                i = usu.length;
            } else if (usu.charCodeAt(i) >= 58 && usu.charCodeAt(i) <= 64) {
                alert("En el usuario has puesto caracteres no válidos");
                i = usu.length;
            } else if ((usu.charCodeAt(i) >= 91 && usu.charCodeAt(i) <= 94)) {
                alert("En el usuario has puesto caracteres no válidos");
                i = usu.length;
            } else if (usu.charCodeAt(i) >= 123) {
                alert("En el usuario has puesto caracteres no válidos");
                i = usu.length;
            } else if (usu.charCodeAt(i) == 46 || usu.charCodeAt(i) == 47 || usu.charCodeAt(i) == 96) {
                alert("En el usuario has puesto caracteres no válidos");
                i = usu.length;
            } else {
                console.log("Usuario correcto");

            }
        }
    }
}

function validarContrasena(){
    var contrasena=document.getElementById("contrasena1").value;
    if(document.getElementById("contrasena1").value.trim() == "") {  
       alert("La contraseña no puede estar vacía");
       return false; 
    }else{
       for (let i = 0; i < contrasena.length; i++) {
           if(contrasena.charCodeAt(0)>=48 && contrasena.charCodeAt(0)<=57){
               alert("En la contraseña has empezado con un número");
               i = contrasena.length;
           }
           if (contrasena.charCodeAt(i) <= 44) {
               alert("En la contraseña has puesto caracteres no válidos");
               i = contrasena.length;
           } else if (contrasena.charCodeAt(i) >= 58 && contrasena.charCodeAt(i) <= 64) {
               alert("En la contraseña has puesto caracteres no válidos");
               i = contrasena.length;
           } else if ((contrasena.charCodeAt(i) >= 91 && contrasena.charCodeAt(i) <= 94)) {
               alert("En la contraseña has puesto caracteres no válidos");
               i = contrasena.length;
           } else if (contrasena.charCodeAt(i) >= 123) {
               alert("En la contraseña has puesto caracteres no válidos");
               i = contrasena.length;
           } else if (contrasena.charCodeAt(i) == 46 || contrasena.charCodeAt(i) == 47 || contrasena.charCodeAt(i) == 96) {
               alert("En la contraseña has puesto caracteres no válidos");
               i = contrasena.length;
           } else {
               console.log("Usuario correcto");
   
           }
       }
   
    }
   
   
   
    if(contrasena.length < 6 || contrasena.length >15){
       alert("La contraseña tiene que tener entre 6 y 15 caracteres");
    }else{
       comprobarContraseña(contrasena);
    }
    
   }


function comprobarContraseña(contras){
    var comprueba = document.getElementById("contrasena2").value;
    if(contras != comprueba){
        alert("Las contraseñas no coinciden");
    }
}

function validarEmail(){

    var str;
    //si es 1 es valido si es 0 es inválido
    var t=1;

    //ponemos como variable el email
    
    str =document.getElementById("email").value;


 
    if(document.getElementById("email").value.trim()==""){
        alert("Debes escribir algo");
    }else{
        //aqui se comprueba el @ con str.split
        var res = str.split('@');
        //si no hay dos partes
        if(str.split('@').length!=2){
            alert("Escriba solo un @ ");
            t=0;
        }
        if(str.split('@').length<2){
            alert("Falta @ ");
            t=0;
        }
            //parte de antes del @
            var local=res[0];
            //parte de detras
            var dominio=res[1];

            // part1
            if(local.length <1 || local.length > 64){
                alert("la longitud de la parte local tiene que ser entre 1 y 64");
            }
            if(dominio.length <1 || dominio.length >256){
                alert("la longitud de la parte local tiene que ser entre 1 y 256");
            }
          
                for (let i = 0; i < res.length; i++) {
                    if (res.charCodeAt(i) == 34 || res.charCodeAt(i) == 40 || res.charCodeAt(i) == 41 || res.charCodeAt(i) == 44 || res.charCodeAt(i) == 58 || res.charCodeAt(i) == 59 || res.charCodeAt(i) == 60 || res.charCodeAt(i) == 62 || res.charCodeAt(i) == 91 || res.charCodeAt(i) == 92 || res.charCodeAt(i) == 93) {
                        alert("En el email has puesto caracteres no válidos");
                        i = res.length;
                    } else {
                        console.log("Email correcto");

                    }
             }
    

            var desps=part2.split('.');  
            if(part2.split(".").length<2){
                alert("falta punto");
                t=0;
            }
          
            if(desps[0].length==0 ){
                alert("no contenido entre @ y punto");
                t=0;
            }
            if(desps[1].length==0){
                alert("falta contenido después del punto");
                t=0;
            }

    }
}


function validarSexo(){
    
        var e = document.getElementById("sexo");
        var value = e.options[e.selectedIndex].value;
        document.getElementById("container").innerHTML = 'Has seleccionado ' + value;
}
