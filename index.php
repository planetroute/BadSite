<?php


include("urimap.php");
include("includes.php");

?>


<html>
<head>
	<?php HTMLBlocks::head_contents(); ?>
</head>

<body>
	<div class="wrapper">
		<div class="container">
			<?php HTMLBlocks::page_header(); ?>
			<div class="content">
				<div class="secure-check"><a href="javascript:a=['Loading integrity...', '...verifying checks...', '...counting to infinity...', '...invalidating logic...', '...interpolating checksums...', '...decoding SHA512...', '...decrypting base64...', '...encoding as AES...', 'Success!', 'Security is secure!'];e=document.getElementById('secure-load');tick=0;min=50;max=1000;function pushMsg(m){e.innerText=m};for (b of a){setTimeout(pushMsg, tick, b);tick+=Math.floor(Math.random()*max)+min;}"><h3><img src="/images/shield.png" /> PNG Verified</h3><div id="secure-load"></div></a></div>
			</div>
		</div>
	</div>
</body>
</html>
