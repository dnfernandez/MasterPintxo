
function validateEmpty(id){
    var name = document.getElementById(id).value;

    //Comprobaciones de "nombre", no se puede registrar nadie sin nombre.
    if (name.length == 0) {
        $.notify("Tienes un campo vacio", "error");

        return false;
    }
    else {
          return true;

    }
}

function validateDir(id){
    valor = document.getElementById(id).value;
    if ((/[\w ]+\, *[\d]+\, *[\w ]+/.test(valor))) {
        //$("#div-DNI").removeClass("has-success");
        //$("#div-DNI").addClass("has-error");


        return true;
    }
    else {
        //$("#div-DNI").removeClass("has-error");
        //$("#div-DNI").addClass("has-success");
        $.notify("Introduzca un Dirección válida", "error");
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

function validateSurName() {
    var surName = document.getElementById("Apellidos").value;

    //Comprobaciones de "apellido", no se puede registrar nadie sin nombre.
    if (surName.length == 0) {
        //$("#div-surname").removeClass("has-success");
        //$("#div-surname").addClass("has-error");
        $.notify("El campo apellido no puede estar vacío", "error");

        return false;
    }
    else {
        //$("#div-surname").removeClass("has-error");
        //$("#div-surname").addClass("has-success");

        return true;
    }
}

function validateDNI(id) {
    valor = document.getElementById(id).value;
    valor = valor.toUpperCase();

    var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];

    if ((!(/^\d{8}[A-Z]$/.test(valor))) || (valor.charAt(8) != letras[(valor.substring(0, 8)) % 23])) {
        //$("#div-DNI").removeClass("has-success");
        //$("#div-DNI").addClass("has-error");
        $.notify("Introduzca un DNI válido", "error");

        return false;
    }
    else {
        //$("#div-DNI").removeClass("has-error");
        //$("#div-DNI").addClass("has-success");

        return true;
    }
}

function validateNIF() {
    valor = document.getElementById("NIF").value;
    valor = valor.toUpperCase();
   if (!(/^[A-Z]\d{8}$/.test(valor))) {
        //$("#div-DNI").removeClass("has-success");
        //$("#div-DNI").addClass("has-error");
        $.notify("Introduzca un NIF válido", "error");

        return false;
    }
    else {
        //$("#div-DNI").removeClass("has-error");
        //$("#div-DNI").addClass("has-success");

        return true;
    }
}

function validateCP(id){
    valor = document.getElementById(id).value;
    if ((/^\d{5}$/.test(valor))) {
        //$("#div-DNI").removeClass("has-success");
        //$("#div-DNI").addClass("has-error");


        return true;
    }
    else {
        //$("#div-DNI").removeClass("has-error");
        //$("#div-DNI").addClass("has-success");
        $.notify("Introduzca un CP válido", "error");
        return false;

    }
}

function validateTelefono(id){
    valor = document.getElementById(id).value;
    if ((/^\d{9}$/.test(valor))) {
        //$("#div-DNI").removeClass("has-success");
        //$("#div-DNI").addClass("has-error");


        return true;
    }
    else {
        //$("#div-DNI").removeClass("has-error");
        //$("#div-DNI").addClass("has-success");
        $.notify("Introduzca un Telefono válido", "error");
        return false;

    }
}


function validatePassword(id, id2) {
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
        $.notify("Las contraseñas deben coincidir y tener un número ,una letra y entre 6 y 15 caracteres", "error");

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
        //document.forms["registerform"].elements["register-password"].value = (hex_md5(document.forms["registerform"].elements["register-password"].value));

        document.forms[form].submit();
    }
}

function validateModUser(form) {
    if(validateEmpty('newName') && validateCP('newCP') && validateEmpty('newApellido') && validateEmpty('newDireccion') && (validatePassword('newPass','newRepeatPass') || validateOldPass('newPass','newRepeatPass'))) {
        //document.forms["registerform"].elements["register-password"].value = (hex_md5(document.forms["registerform"].elements["register-password"].value));

        document.forms[form].submit();
    }
}


function validateNewEstablishment(form) {
    if(validateEmpty('NombreEstablecimiento') && validateEmpty('DireccionEstablecimiento') && validateTelefono('Telefono') && validateNIF() && validatePassword('PassEstablecimiento','RepeatPassEstablecimiento')) {
        //document.forms["registerform"].elements["register-password"].value = (hex_md5(document.forms["registerform"].elements["register-password"].value));

        document.forms[form].submit();
    }
}

function validateModEstablishment(form) {
    if(validateEmpty('newNameEsta') && validateEmpty('newDirEsta') && validateTelefono('newTelefEsta') &&   (validatePassword('newPassEsta','newRePassEsta') || validateOldPass('newPassEsta','newRePassEsta'))) {
        //document.forms["registerform"].elements["register-password"].value = (hex_md5(document.forms["registerform"].elements["register-password"].value));

        document.forms[form].submit();
    }
}

function validateNewJPro(form){
    if(validateEmpty('NombreJPro') && validateDNI('DNIJPro') && validatePassword('PassJPro','PassRepeatJPro') && validateTelefono('TelefJPro')) {
        //document.forms["registerform"].elements["register-password"].value = (hex_md5(document.forms["registerform"].elements["register-password"].value));

        document.forms[form].submit();
    }
}

function validateModJPro(form){
    if(validateEmpty('modNameJPro') &&  (validatePassword('modPassJPro','modRepeatPassJPro') || validateOldPass('modPassJPro','modRepeatPassJPro'))  && validateTelefono('modTelefJPro')) {
        //document.forms["registerform"].elements["register-password"].value = (hex_md5(document.forms["registerform"].elements["register-password"].value));

        document.forms[form].submit();
    }
}

function ayudaPass() {
    $.notify("Las contraseñas deben tener un número ,una letra y entre 6 y 15 caracteres", "info");
}

function ayudaPass2() {
    $.notify("Las contraseñas deben tener un número ,una letra y entre 6 y 15 caracteres, si no introducen contraseñas, no se modifcaran", "info");
}

function ayudaDir() {
    $.notify("La dirección debe ser Calle, Numero, Ciudad", "info");
}



