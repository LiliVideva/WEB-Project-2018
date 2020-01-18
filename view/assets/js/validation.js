function validateRegisterFormOnSubmit(theForm) {
    var reason = "";

    reason += comparePasswords(theForm.password , theForm.password_repeat);
    reason += validateName(theForm.first_name);
    reason += validateName(theForm.last_name);
    reason += validateEmail(theForm.email);

    if (reason != "") {
        alert("Проблем:\n" + reason);
        return false;
    }
    return true;
}

function validateLoginFormOnSubmit(theForm) {
    var reason = "";

    reason += validateEmail(theForm.email);
    reason += validatePassword(theForm.password);

    if (reason != "") {
        alert("Проблем:\n" + reason);
        return false;
    }
    return true;
}

function validateName(fld) {
    var error = "";
    var illegalChars = /\W/; 

    if (fld.value == "") {
        fld.style.background = 'White';

        fld.style.background = '#ffa798';
        error = "Не е въведено име.\n";
    } else if ((fld.value.length < 2) || (fld.value.length > 45)) {
        fld.style.background = '#ffa798';
        error = "Невалидна дължина на името.\n";
    } else if (illegalChars.test(fld.value)) {
        fld.style.background = '#ffa798';
        error = "Името съдържа непозволени символи.\n";
    } else {
        fld.style.background = 'White';
    }
    return error;
}

function validatePassword(fld) {
    fld.style.background = 'White';

    var error = "";
	
    if (fld.value == "") {
        fld.style.background = '#ffa798';
        error = "Не е въведена парола.\n";
    } else if ((fld.value.length < 2) || (fld.value.length > 45)) {
        error = "Невалидна дължина на паролата. \n";
        fld.style.background = '#ffa798';
    } else {
        fld.style.background = 'White';
    }


    return error;
}

function comparePasswords(password , repeatedPassword){
    var error = "";

    error += validatePassword(password);
    error += validatePassword(repeatedPassword);

    if(error != ""){
        password.style.background  = '#ffa798';
        repeatedPassword.style.background  = '#ffa798';
    }else if (password.value != repeatedPassword.value) {
        error = "Паролите не съвпадат!\n";
        password.style.background  = '#ffa798';
        repeatedPassword.style.background  = '#ffa798';
    } else {
        password.style.background = 'White';
        repeatedPassword.style.background = 'White';
    }
    return error;

}

function trim(s) {
    return s.replace(/^\s+|\s+$/, '');
}

function validateEmail(fld) {
    var error="";
    var tfld = trim(fld.value);                       
    var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;
    var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;

    fld.style.background = 'White';

    if (fld.value == "") {
        fld.style.background  = '#ffa798';
        error = "Не е въведен валиден имейл адрес.\n";
    } else if (!emailFilter.test(tfld)) {            
        fld.style.background  = '#ffa798';
        error = "Моля въведи валиден имейл адрес.\n";
    }else if ((fld.value.length < 5) || (fld.value.length > 45)) {
        error = "Невалидна дължина на имейл адреса. \n";
        fld.style.background = '#ffa798';
    } else if (fld.value.match(illegalChars)) {
        fld.style.background  = '#ffa798';
        error = "Имейл адресът съдържа непозволени символи.\n";
    } else {
        fld.style.background = 'White';
    }
    return error;
}