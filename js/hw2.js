
document.getElementById("submitbtn").addEventListener("click" , function(){
	var str = document.getElementById("text1").value;
	if(str.length == 0)
		document.getElementById("label2").innerHTML = "cannot be empty";
	if(str.length > 0)
		document.getElementById("label2").innerHTML = "";

});

document.getElementById("text1").onkeydown = function myFun(e){
	var x = e.keyCode;
	
	if(x ==48 ||x==49 ||x==50 ||x==51 ||x==52 ||x==53 ||x==54 ||x==55 ||x==56 ||x==57)
		document.getElementById("label2").innerHTML = "";
	else
		document.getElementById("label2").innerHTML = "only numbers";
}