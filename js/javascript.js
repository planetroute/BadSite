function decrypt(s){
	return atob(s);
}

function verifySecurity(){
	a = [
		'Contacting unverified source...', 
		'...downloading new integrity...', 
		'...verifying verification...', 
		'...counting to infinity...', 
		'...invalidating validity...', 
		'...reversing checksums...', 
		'...decoding SHA512...', 
		'...decrypting base64...', 
		'...encoding as AES...', 
		'Success!', 
		'Security is secure!'
	];
	
	e = document.getElementById('secure-load');
	
	tick = 0;
	
	min = 50;
	max = 1000;
	
	function pushMsg(m){
		e.innerText=m
	}
	for (b of a){
		setTimeout(pushMsg, tick, b);
		tick += Math.floor(Math.random()*max)+min;
	}
}
