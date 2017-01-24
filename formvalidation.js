	function validInput(name, output = 'This field is required.') {
		formvalue = contact.elements[name].value;
		if(formvalue == '') {
			var x = document.getElementById(name);
			x.innerHTML = output;
			contact.elements[name].setAttribute("class", "redBorder")
		}
	}
	function checkform() {
		//to do
		var x = document.getElementById("ContactForm");
		x.style.backgroundColor = "#A00"
		return false;
	}