function jumpTo(id) {
    document.getElementById(id).focus();
    document.getElementById(id + "Label").scrollIntoView();
}

function submitVerify() {
    failValid = [];
    if (!usernameVerify()) {
        failValid.push('username')}
    if (!emailVerify()) {
        failValid.push('email')}
    if (!dobVerify()) {
        failValid.push('dob')}
    if (!postcodeVerify()) {
        failValid.push('postcode')}
    if (!passVerify()) {
        failValid.push('password')}
    if (!passVerifyVerify()) {
        failValid.push('passwordVerify')}
    if (!tcVerify()) {
        failValid.push('tc')}
    jumpTo(failValid[0]);
    if (failValid.length < 1) {
        return true;
    }
    return false;
}

function usernameVerify() {
    var username_field = document.getElementById('username');
    var username_span = document.getElementById('usernameSpan');
    if (!field_present(username_field)) {
        username_span.innerHTML = ' - is required';
    } else if (!normal_characters(username_field)) {
        username_span.innerHTML = ' - must only contain normal characters';
    } else if (!field_length(username_field, 3)) {
        username_span.innerHTML = ' - must be atleast three characters';
    } else {
        username_span.innerHTML = '';
        return true;
    }
    return false;
}

function emailVerify() {
    var email_field = document.getElementById('email');
    var email_span = document.getElementById('emailSpan');
    if (!field_present(email_field)) {
        email_span.innerHTML = ' - is required';
    } else if (!email_valid(email_field)) {
        email_span.innerHTML = ' - is not valid';
    } else {
        email_span.innerHTML = '';
        return true;
    }
    return false;
}

function dobVerify() {
    var dob_field = document.getElementById('dob');
    var dob_span = document.getElementById('dobSpan');
    if (!field_present(dob_field)) {
        dob_span.innerHTML = ' - is required';
    } else {
        dob_span.innerHTML = '';
        return true;
    }
    return true;
}

function postcodeVerify() {
    var postcode_field = document.getElementById('postcode');
    var postcode_span = document.getElementById('postcodeSpan');
    if (postcode_field.value.search('[^0-9]+') != -1) {
        postcode_field.style["border-color"] = 'red';
        postcode_span.innerHTML = ' - must only contain digits';
    } else if (postcode_field.value.length > 0 && postcode_field.value.length != 4) {
        postcode_field.style["border-color"] = 'red';
        postcode_span.innerHTML = ' - must have four digits';
    } else {
        postcode_field.style["border-color"] = '#C0C0C0';
        postcode_span.innerHTML = '';
        return true;
    }
    return false;
}
//Could be better - span pass_strong
function passVerify() {
    var password_field = document.getElementById('password');
    var password_span = document.getElementById('passwordSpan');
    if (!field_present(password_field)) {
        password_span.innerHTML = ' - is required';
    } else if (!normal_characters(password_field)) {
        password_span.innerHTML = ' - must only contain normal characters';
    } else if (!password_strong(password_field)) {
        password_span.innerHTML = ' - must contain a capital, number and be atleast eight characters long';
    } else {
        password_span.innerHTML = '';
        return true;
    }
    return false;
}

function passVerifyVerify() {
    var password_verify_field = document.getElementById('passwordVerify');
    var password_verify_span = document.getElementById('passwordVerifySpan');
    if (password_verify_field.value != document.getElementById('password').value) {
        password_verify_field.style["border-color"] = 'red';
        password_verify_span.innerHTML = ' - passwords must match';
    } else {
        password_verify_field.style["border-color"] = '#C0C0C0';
        password_verify_span.innerHTML = '';
        return true;
    }
    return false;
}

function tcVerify() {
    var tc_field = document.getElementById('tc');
    var tc_span = document.getElementById('tcLabel');
    if (!tc_field.checked) {
        tcSpan.innerHTML = ' - is required';
    } else {
        tcSpan.innerHTML = '';
        return true;
    }
    return false;
}


function field_present(field) {
    if (field.value == '') {
        field.style["border-color"] = "#ED6A5A";
        return false;
    } else {
        field.style["border-color"] = "#C0C0C0";
        return true;
    }
}

function field_length(field, field_min) {
    if (field.value.length < field_min) {
        field.style["border-color"] = "#ED6A5A";
        return false;
    } else {
        field.style["border-color"] = "#C0C0C0";
        return true;
    }
}

function normal_characters(field) {
    if (field.value.search('[^a-zA-Z0-9_]') != -1) {
        field.style["border-color"] = "#ED6A5A";
        return false;
    } else {
        field.style["border-color"] = "#C0C0C0";
        return true;
    }
}
function password_strong(field) {
    password_value = field.value;
    if ((password_value.length < 8) || (password_value.search('[0-9A-Z]'))) {
        field.style["border-color"] = "#ED6A5A";
        return false;  
    } else {
        field.style["border-color"] = "C0C0C0";
        return true;
    }
}

function email_valid(field) {
    var email_input = field.value;
    var atpos = email_input.indexOf("@");
    var dotpos = email_input.lastIndexOf(".");
    var email_length = email_input.length;
    if (atpos < 1 || dotpos < atpos + 2 || dotpos > email_length - 3) {
        field.style["border-color"] = "#ED6A5A";
        return false;
    } else {
        field.style["border-color"] = "#C0C0C0";
        return true;
    }
}
