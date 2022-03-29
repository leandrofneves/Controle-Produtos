function somenteNumero(){
    var sDigitos ="0123456789,.";
    var cTecla = event.key;
    if(sDigitos.indexOf(cTecla)==-1){
        return false;
    }else{
        return true;
    }
}

function somenteLetra(){
    var sDigitos = "qwertyuiopasdfghjklçzxcvbnmQWERTYUIOPASDFGHJKLÇZXCVBNMáéíóúÁÉÍÓÚâêôÂÊÔãõÃÕ -";
    var cTecla = event.key;
    if(sDigitos.indexOf(cTecla)==-1){
        return false;
    }else{
        return true;
    }
}