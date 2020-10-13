function cargar(){
   
    document.getElementById("btn1").addEventListener("click",function(){
        let nombre= document.getElementById("presidente").value;
        let dni=document.getElementById("dni_presidente").value
        document.getElementById("presidente").style.borderBottomColor="green"
        document.getElementById("dni_presidente").style.borderBottomColor="green"
        if(nombre.length<3 && dni.length!=8){
            document.getElementById("presidente").style.borderBottomColor="red"
            document.getElementById("dni_presidente").style.borderBottomColor="red"
            return false
        }
        else if(nombre.length<3){
            document.getElementById("presidente").style.borderBottomColor="red"
            return false
        }
        else if(dni.length!=8){
            document.getElementById("dni_presidente").style.borderBottomColor="red"
            return false
        }
        document.getElementById("step2").classList.remove("inactive")
        document.getElementById("step1").classList.toggle("inactive")
    
    })
    document.getElementById("volver1").addEventListener("click",function(){
        document.getElementById("step1").classList.toggle("inactive")
        document.getElementById("step2").classList.add("inactive")
    })
    document.getElementById("btn2").addEventListener("click",function(){
        let nombre= document.getElementById("vicepresidente").value;
        let dni=document.getElementById("dni_vicepresidente").value
       
        document.getElementById("vicepresidente").style.borderBottomColor="green"
        document.getElementById("dni_vicepresidente").style.borderBottomColor="green"
        if(nombre.length<3 && dni.length!=8){
            document.getElementById("vicepresidente").style.borderBottomColor="red"
            document.getElementById("dni_vicepresidente").style.borderBottomColor="red"
            return false
        }
        else if(nombre.length<3){
            document.getElementById("vicepresidente").style.borderBottomColor="red"
            return false
        }
        else if(dni.length!=8){
            document.getElementById("dni_vicepresidente").style.borderBottomColor="red"
            return false
        }
        document.getElementById("step2").classList.toggle("inactive")
        document.getElementById("step3").classList.remove("inactive")
    })
    document.getElementById("volver2").addEventListener("click",function(){
        document.getElementById("step2").classList.toggle("inactive")
        document.getElementById("step3").classList.add("inactive")
    })
    document.getElementById("btn3").addEventListener("click",function(){
        let nombre= document.getElementById("secretario").value;
        let dni=document.getElementById("dni_secretario").value
       
        document.getElementById("secretario").style.borderBottomColor="green"
        document.getElementById("dni_secretario").style.borderBottomColor="green"
        if(nombre.length<3 && dni.length!=8){
            document.getElementById("secretario").style.borderBottomColor="red"
            document.getElementById("dni_secretario").style.borderBottomColor="red"
            return false
        }
        else if(nombre.length<3){
            document.getElementById("secretario").style.borderBottomColor="red"
            return false
        }
        else if(dni.length!=8){
            document.getElementById("dni_secretario").style.borderBottomColor="red"
            return false
        }
        document.getElementById("step3").classList.toggle("inactive")
        document.getElementById("step4").classList.remove("inactive")
    })
    document.getElementById("volver3").addEventListener("click",function(){
        document.getElementById("step3").classList.toggle("inactive")
        document.getElementById("step4").classList.add("inactive")
    })
    document.getElementById("vocal").addEventListener("input",function(){  
        let nombre=document.getElementById("vocal").value
        if(nombre.length>3){
             document.getElementById("vocal").style.borderBottomColor="green"
        }
    })
    document.getElementById("dni_vocal").addEventListener("input",function(){
        let nombre=document.getElementById("vocal").value
        let dni=document.getElementById("dni_vocal").value
        if(nombre.length>3 && dni.length==8){
            document.getElementById("vocal").style.borderBottomColor="green"
            document.getElementById("dni_vocal").style.borderBottomColor="green"
            document.getElementById("submit").classList.add("active")
        }
        else if(dni.length!==8){
            document.getElementById("submit").classList.remove("active")
        }
    })
}   


