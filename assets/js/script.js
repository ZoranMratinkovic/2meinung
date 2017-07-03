function Check(){
	var ime = document.getElementById("ime").value;
	var email = document.getElementById('Email').value;
	var tel= document.getElementById('Tel').value;
	var zahn = document.getElementById('Zahn').value;
	var por = document.getElementById('Por').value;

	if(ime.length == 0){
		document.getElementsByClassName("err")[0].style = "display:block";
		return false;
	}
	else{
		document.getElementsByClassName("err")[0].style = "display:none";
	}
	if(email == ""){
		document.getElementsByClassName("err")[1].style = "display:block";
		return false;
	}
	else{
		document.getElementsByClassName("err")[1].style = "display:none";
	}
	if(tel == ""){
		document.getElementsByClassName("err")[2].style = "display:block";
		return false;
	}
	else{
		document.getElementsByClassName("err")[2].style = "display:none";
	}
	if(zahn == ""){
		document.getElementsByClassName("err")[3].style = "display:block";
		return false;
	}
	else{
		document.getElementsByClassName("err")[3].style = "display:none";
	}
	if(por == ""){
		document.getElementsByClassName("err")[4].style = "display:block";
		return false;
	}
	else{
		document.getElementsByClassName("err")[4].style = "display:none";
	}
	return true;
}