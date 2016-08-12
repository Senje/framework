<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="css/window.css">
  <link rel="stylesheet" href="css/style.css">
  	<script type="text/javascript" src="http://yandex.st/jquery/1.7.1/jquery.min.js" ></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.window .close_window, .overlay').click(function (){
				$('.window, .overlay').css({'opacity':'0', 'visibility':'hidden'});
			});
			$('a.login').click(function (e){
				$('.window, .overlay').css({'opacity':'1', 'visibility':'visible'});
				e.preventDefault();
			});
		});
	</script>


  <title>Заголовок</title>  
</head>

<body> 404
</body>
</html>