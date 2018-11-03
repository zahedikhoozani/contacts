// JavaScript Document
function cnfrm() {
	var frm = document.getElementById("frm");
	var radios = document.getElementsByName('id');
	var length = radios.length;
	var id;
	var resulte;
	for (var i = 0; i < length; i++) {
		if (radios[i].checked) {
			// do whatever you want with the checked radio
			id = radios[i].value;

			// only one radio can be logically checked, don't check the rest
			break;
		}
	}
	var mod = frm.elements[length].value;
	if (mod === "delete") {
		resulte = window.confirm("آیا مطمئن هستید رکورد " + id + "\r حذف شود ؟");
		if (!resulte) {
			return false;
		} else {
			/*
			document.getElementById("jsfrm").innerHTML = "id=" + id + "mod=" + mod;
			var form = document.createElement("form");
			var formattr1 = document.createAttribute("id").value = "jsform";
			var formattr2 = document.createAttribute("action").value = "index.php";
			var formattr3 = document.createAttribute("method").value = "post";
			form.setAttributeNode(formattr1);
			form.setAttributeNode(formattr2);
			form.setAttributeNode(formattr3);

			var input = document.createElement("input");
			//var att1 = document.createAttribute("name").value = "id";
			var att2 = document.createAttribute("value").value = id;
			input.setAttribute("name", "id");
			input.setAttributeNode(att2);
			*/

			frm.submit();
		}
	} else {
		frm.submit();
	}
}
/*
setTimeout(function () {
	document.getElementsByClassName("notif").style.display = "none";
}, 1000);
*/
