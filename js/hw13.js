function nameValidation(){
	var name = document.getElementById("name").value;
	var nameError = document.getElementById("nameError");
	if (name.trim() == "" || name == null){
		nameError.innerHTML = "Please enter the name of the establishment.";
		return false;
	}
	else {
		nameError.innerHTML = "";
	}
}

function categoryValidation(){
	var category = document.getElementById("category").value;
	var categoryError = document.getElementById("categoryError");
	if (category.trim() == "" || category == null){
		categoryError.innerHTML = "Please enter the category.";
		return false;
	}
	else {
		categoryError.innerHTML = "";
	}
}

function enterValidation(){
	var enter = document.getElementById("enter").value;
	var enterError = document.getElementById("enterError");
	if (enter.trim() == "" || enter == null){
		enterError.innerHTML = "Please enter your name.";
		return false;
	}
	else {
		enterError.innerHTML = "";
	}
}

function urlValidation(){
	var url = document.getElementById("url").value;
	var urlError = document.getElementById("urlError");
	if (url.trim() == "" || url == null){
		urlError.innerHTML = "Please enter the URL.";
		return false;
	}
	else {
		urlError.innerHTML = "";
	}
}

function phoneValidation(){
	var phone = document.getElementById("phone").value;
	var desired = phone.replace(/[^\w\s]/gi, '');
	var phoneError = document.getElementById("phoneError");
	if (desired.trim() == "" || desired == null){
		phoneError.innerHTML = "Please enter the phone number";
		return false;
	}
	if (desired.length > 11 || desired.length < 10){
		phoneError.innerHTML = "Please enter a valid number (10 or 11 digits)";
		return false;
	}
	else {
		phoneError.innerHTML = "";
	}
}

function addressValidation(){
	var address = document.getElementById("address").value;
	var addressError = document.getElementById("addressError");
	if (address.trim() == "" || address == null){
		addressError.innerHTML = "Please enter the address.";
		return false;
	}
	else {
		addressError.innerHTML = "";
	}
}

function commentValidation(){
	var comment = document.getElementById("comment").value;
	var commentError = document.getElementById("commentError");
	if (comment.trim() == "" || comment == null){
		commentError.innerHTML = "Please enter a comment.";
		return false;
	}
	else {
		commentError.innerHTML = "";
	}
}