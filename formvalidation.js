	function validInput(name, type = 'text', output = 'This field is required.') {
		var formvalue = contact.elements[name].value;
		var x = document.getElementById(name);
		if(formvalue == '') {
			x.innerHTML = output;
			contact.elements[name].setAttribute("class", "redBorder");
			return false;
		}
		else {
			if(type === 'email') {
				var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,})$/;
				//var re = /^[a-zA-Z0-9._%+-]{1,64}+@[a-zA-Z0-9._-]{1,254}+\.([a-zA-Z]{2,})$/;
				if(re.test(formvalue)) {
					x.innerHTML = '';
					contact.elements[name].setAttribute("class", "/*greenBorder*/");
					return true;
				}
				else {
					x.innerHTML = output;
					contact.elements[name].setAttribute("class", "redBorder");
					return false;
				}
			}
			else {
				x.innerHTML = '';
				contact.elements[name].setAttribute("class", "/*greenBorder*/");
				return true;
			}
		}
	}
	function checkform() {
		if (validInput('name') && validInput('email') && validInput('phone') && validInput('message')) {
			//var x = document.getElementById("ContactForm");
			//x.style.backgroundColor = "#0A0"
			return true;
		}
		else {
			validInput('name');
			validInput('email', 'email', 'Please enter a valid email.');
			validInput('phone');
			validInput('message');
			return false;
		}
	}