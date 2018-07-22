
function search1() {

    var str = document.getElementById("srting").innerHTML; 
    var n = str.search("the");
    document.getElementById("search").innerHTML = n;
}
function split2() {
	
    var str = document.getElementById("p2").innerHTML; 
    var n = str.split(":");
    document.getElementById("sp").innerHTML = n;
}
function match3() {
	
    var str = document.getElementById("srting").innerHTML; 
    var res = str.match(/all/g);
    document.getElementById("mm").innerHTML = res;
}

function sub(){
	var x = document.getElementById("text").innerHTML;
	x=x.toString;
	for(i=0;i<x.length;i++){
		if(x.charAt(i)>='0' && x.charAt(i)<='9')
			alert("erro");
	}
}