document.getElementById("btnL").addEventListener("click",function(){
	var s = document.getElementById("inputL").value;
	document.getElementById("outL").innerHTML = s.length;
});


document.getElementById("btnI").addEventListener("click" , function(){
	var str = document.getElementById("inputI").value;
	index = str.indexOf('a');
	document.getElementById("outI").innerHTML = index;
});


document.getElementById("btnS").addEventListener("click" , function(){
	var str = document.getElementById("inputS").value;
	var array = str.split(' ');
	document.getElementById("outS").innerHTML = array;
});
