function validate() {
    var a = document.patient.email.value;
    //To get a valid email id we use a this expression: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (a.match(mailformat)) {
        alert("You have entered an invalid email address!");
        document.doctor.email.focus();
        return false;
    }
    return true;
}