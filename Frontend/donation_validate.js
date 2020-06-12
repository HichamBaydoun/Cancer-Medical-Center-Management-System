function validate() {
	var a = document.patient.email.value;
	var b = document.patient.code.value;
	//To get a valid email id we use a this expression: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if (a.match(mailformat)) {
		alert("You have entered an invalid email address!");
		document.doctor.email.focus();
		return false;
	}
	var num = /^\d{3}$/;
	if (!(b.match(num))) {
		alert("Not a valid Code (Should be 3 digits)");
		return false;
	}
	return true;
}