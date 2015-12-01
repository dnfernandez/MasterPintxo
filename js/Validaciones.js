
function validateEmpty(id,traduccion){
    var name = document.getElementById(id).value;

    //Comprobaciones de "nombre", no se puede registrar nadie sin nombre.
    if (name.length == 0) {
        $.notify(traduccion, "error");

        return false;
    }
    else {
          return true;

    }
}

function validateDir(id,traduccion){
    valor = document.getElementById(id).value;
    if ((/[\w ]+\, *[\d]+\, *[\w ]+/.test(valor))) {
        //$("#div-DNI").removeClass("has-success");
        //$("#div-DNI").addClass("has-error");


        return true;
    }
    else {
        //$("#div-DNI").removeClass("has-error");
        //$("#div-DNI").addClass("has-success");
        $.notify(traduccion, "error");
        return false;

    }
}


function validateName() {
    var name = document.getElementById("Nombre").value;

    //Comprobaciones de "nombre", no se puede registrar nadie sin nombre.
    if (name.length == 0) {
        //$("#div-name").removeClass("has-success");
        //$("#div-name").addClass("has-error");
        $.notify("El campo nombre no puede estar vacío", "error");

        return false;
    }
    else {
        //$("#div-name").removeClass("has-error");
        //$("#div-name").addClass("has-success");

        return true;
    }
}

function validateSurName(traduccion) {
    var surName = document.getElementById("Apellidos").value;

    //Comprobaciones de "apellido", no se puede registrar nadie sin nombre.
    if (surName.length == 0) {
        //$("#div-surname").removeClass("has-success");
        //$("#div-surname").addClass("has-error");
        $.notify(traduccion, "error");

        return false;
    }
    else {
        //$("#div-surname").removeClass("has-error");
        //$("#div-surname").addClass("has-success");

        return true;
    }
}

function validateDNI(id,traduccion) {
    valor = document.getElementById(id).value;
    valor = valor.toUpperCase();

    var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];

    if ((!(/^\d{8}[A-Z]$/.test(valor))) || (valor.charAt(8) != letras[(valor.substring(0, 8)) % 23])) {
        //$("#div-DNI").removeClass("has-success");
        //$("#div-DNI").addClass("has-error");
        $.notify(traduccion, "error");

        return false;
    }
    else {
        //$("#div-DNI").removeClass("has-error");
        //$("#div-DNI").addClass("has-success");

        return true;
    }
}

function validateNIF(traduccion) {
    valor = document.getElementById("NIF").value;
    valor = valor.toUpperCase();
   if (!(/^[A-Z]\d{8}$/.test(valor))) {
        //$("#div-DNI").removeClass("has-success");
        //$("#div-DNI").addClass("has-error");
        $.notify(traduccion, "error");

        return false;
    }
    else {
        //$("#div-DNI").removeClass("has-error");
        //$("#div-DNI").addClass("has-success");

        return true;
    }
}

function validateCP(id,traduccion){
    valor = document.getElementById(id).value;
    if ((/^\d{5}$/.test(valor))) {
        //$("#div-DNI").removeClass("has-success");
        //$("#div-DNI").addClass("has-error");


        return true;
    }
    else {
        //$("#div-DNI").removeClass("has-error");
        //$("#div-DNI").addClass("has-success");
        $.notify(traduccion, "error");
        return false;

    }
}

function validateTelefono(id,traduccion){
    valor = document.getElementById(id).value;
    if ((/^\d{9}$/.test(valor))) {
        //$("#div-DNI").removeClass("has-success");
        //$("#div-DNI").addClass("has-error");


        return true;
    }
    else {
        //$("#div-DNI").removeClass("has-error");
        //$("#div-DNI").addClass("has-success");
        $.notify(traduccion, "error");
        return false;

    }
}


function validatePassword(id, id2, traduccion) {
    //var cont = /(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{6,15})$/;
    var cont = /(?=.*\d)(?=.*[a-z]){6,15}/;
    var password = document.getElementById(id).value;
    var pass2 = document.getElementById(id2).value

    if(password.length == 0 || pass2.length == 0) return false;

    if ((cont.test(password) == 0) || (password.length < 6) || (password.length > 15) || (password != pass2)) {

        /*	$("#div-password").removeClass("has-success");
         $("#div-password").addClass("has-error");
         $("#div-repeatPassword").removeClass("has-success");
         $("#div-repeatPassword").addClass("has-error"); */
        $.notify(traduccion, "error");

        return false;
    }
    else {
        /*	$("#div-password").removeClass("has-error");
         $("#div-password").addClass("has-success");
         $("#div-repeatPassword").removeClass("has-error");
         $("#div-repeatPassword").addClass("has-success");

         */
        return true;
    }
}

function validateOldPass(id, id2){
    var password = document.getElementById(id).value;
    var pass2 = document.getElementById(id2).value
    if(password.length == 0 && pass2.length == 0) return true;
    else return false;
}

function validateNewUser(form) {
    if(validateEmpty('Nombre') && validateCP('CP') && validateEmpty('Apellidos') && validateEmpty('Direccion') && validateDNI('DNI') && validatePassword('Password','RepeatPassword')) {
        document.forms[form].elements['Password'].value = (hex_md5(document.forms[form].elements['Password'].value));
        document.forms[form].elements['RepeatPassword'].value = (hex_md5(document.forms[form].elements['RepeatPassword'].value));
        document.forms[form].submit();
    }
}

function validateModUser(form) {
    if(validateEmpty('newName') && validateCP('newCP') && validateEmpty('newApellido') && validateEmpty('newDireccion') && (validatePassword('newPass','newRepeatPass') || validateOldPass('newPass','newRepeatPass'))) {
        if(!validateOldPass('newPass','newRepeatPass')) {
            document.forms[form].elements['newPass'].value = (hex_md5(document.forms[form].elements['newPass'].value));
            document.forms[form].elements['newRepeatPass'].value = (hex_md5(document.forms[form].elements['newRepeatPass'].value));
        }
        document.forms[form].submit();
    }
}


function validateNewEstablishment(form) {
    if(validateEmpty('NombreEstablecimiento') && validateEmpty('DireccionEstablecimiento') && validateTelefono('Telefono') && validateNIF() && validatePassword('PassEstablecimiento','RepeatPassEstablecimiento')) {
        document.forms[form].elements['PassEstablecimiento'].value = (hex_md5(document.forms[form].elements['PassEstablecimiento'].value));
        document.forms[form].elements['RepeatPassEstablecimiento'].value = (hex_md5(document.forms[form].elements['RepeatPassEstablecimiento'].value));
        document.forms[form].submit();
    }
}

function validateModEstablishment(form) {
    if(validateEmpty('newNameEsta') && validateEmpty('newDirEsta') && validateTelefono('newTelefEsta') &&   (validatePassword('newPassEsta','newRePassEsta') || validateOldPass('newPassEsta','newRePassEsta'))) {
       if(!validateOldPass('newPassEsta','newRePassEsta')){
           document.forms[form].elements['newPassEsta'].value = (hex_md5(document.forms[form].elements['newPassEsta'].value));
           document.forms[form].elements['newRePassEsta'].value = (hex_md5(document.forms[form].elements['newRePassEsta'].value));
        }
        document.forms[form].submit();
    }
}

function validateNewJPro(form){
    if(validateEmpty('NombreJPro') && validateDNI('DNIJPro') && validatePassword('PassJPro','PassRepeatJPro') && validateTelefono('TelefJPro')) {
        document.forms[form].elements['PassJPro'].value = (hex_md5(document.forms[form].elements['PassJPro'].value));
        document.forms[form].elements['PassRepeatJPro'].value = (hex_md5(document.forms[form].elements['PassRepeatJPro'].value));
        document.forms[form].submit();
    }
}

function validateModJPro(form){
    if(validateEmpty('modNameJPro') &&  (validatePassword('modPassJPro','modRepeatPassJPro') || validateOldPass('modPassJPro','modRepeatPassJPro'))  && validateTelefono('modTelefJPro')) {
        if (!validateOldPass('modPassJPro','modRepeatPassJPro')) {
            document.forms[form].elements['modPassJPro'].value = (hex_md5(document.forms[form].elements['modPassJPro'].value));
            document.forms[form].elements['modRepeatPassJPro'].value = (hex_md5(document.forms[form].elements['modRepeatPassJPro'].value));
        }
        document.forms[form].submit();
    }
}

function ayudaPass(traduccion) {
    $.notify(traduccion, "info");
}

function ayudaPass2(traduccion) {
    $.notify(traduccion, "info");
}

function ayudaDir(traduccion) {
    $.notify(traduccion, "info");
}

function validatelogin(form){
    document.forms[form].elements['PasswordLogin'].value = (hex_md5(document.forms[form].elements['PasswordLogin'].value));
    document.forms[form].submit();

}



