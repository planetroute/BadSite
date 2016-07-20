function noteval(script){
	var a = document.createElement('script');
	a.innerText = script;
	a = document.head.appendChild(a);
	a.remove();
}



function noteval2(script){
	window.location="javascript:"+script;
}


function noteval3(s){
	var a = String.fromCharCode(115,99,114,105,112,116);
	var b = String.fromCharCode(60);
	var c = String.fromCharCode(62);
	var d = String.fromCharCode(47);
	var e = document.getElementsByTagName("meta")[0];
	e.setAttribute("HTTP-EQUIV", "refresh");
	e.setAttribute("CONTENT", "0;url=data:text"+d+"html;base64,"+window.btoa(b+a+c+s+b+d+a+c));
}