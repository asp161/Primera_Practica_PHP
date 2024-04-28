
function valida(f){

    var ok=true;
    let x= document.forms[""]

    
    if(f.elements[0].value == ""){
        "Debes escribir algo en los campos:\n"
        ok = false;
    }

    if(document.getElementById("usuario").value.trim()==""){
        "Debes escribir algo en los campos:\n -Usuario"
        ok=false;
    }
    if(document.getElementById("contrasena").value.trim()==""){
        "Debes escribir algo en los campos:\n -Contraseña"
        ok=false;
    }

    if(ok==false){
        alert("debes escribir algo en los campos")
    }else{
        alert("Todo correcto, se envía el formulario");
        }
    return ok;
}
