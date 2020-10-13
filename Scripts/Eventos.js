function cargar(){
    document.getElementById("men").addEventListener("click",function(){
        document.getElementById("contenedor").classList.add("opaco");
        document.getElementById("formulario").classList.add("inactive");
        document.getElementById("admin").classList.add("active");
    })
   document.getElementById("cancelar").addEventListener("click",function(){
    document.getElementById("contenedor").classList.remove("opaco");
    document.getElementById("formulario").classList.remove("inactive");
    document.getElementById("admin").classList.remove("active");
   })
}

function validar(){
    var btn=document.getElementById("dni").value;
    
    if(btn.length<8){
        console.log(btn)
        document.getElementById("mensaje").style.color="red";
        document.getElementById("mensaje").style.fontSize="20px"
        document.getElementById("mensaje").innerHTML="*Debe contener 8 caracteres"
        document.getElementById("dni").style.borderColor="red";
        return false;
    }
    document.getElementById("mensaje").innerHTML=""
    document.getElementById("dni").style.borderColor="green";
    return false;   
}

function validar2(){
    var contraseña=prompt("ingrese la contraseña");
    if(contraseña!=42471205){
        setTimeout(function(){window.location="../Index.php"});
    }
}

