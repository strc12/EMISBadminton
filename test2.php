<!Doctype HTML>
<html>
<head>
	<style>
		body {
		background-color: #d0e4fe;
		}

		h1 {
		text-align: center;
		}

		p {
		font-family: "Times New Roman";
		font-size: 20px;
		}
		
		a {
		border-style:double;
		border-color:LightSeaGreen;
		border-width:5px;
		padding:5px;
		background-color:LawnGreen;
		line-height:300%;
		
		}
		#middle {
		text-align:center;
		}
		
	</style>
	<title>Jarens webapge</title>
</head>
<body>
<table border="3"><tr><td>fdgd</td><td>fdgd</td><td>fdgd</td></tr><tr><td>fdgd</td><td>fdsfgsdfgsgd</td><td>fdgd</td></tr><tr><td>fdgd</td><td>fdgd</td><td>fdgd</td></tr></table>
<h1> A header</h1>
	Some stuff here..kjhsjkdf gfjksdhg jklsfdkl ghsfjkdhgkljshfkghsfjkd <br>
	ghkjsdfhgk jhsfdkjgh sfjkdh gkljsfhd gjk
	<p  id="middle">jksjkfhksdj</p>
<div id="middle">
<a href="test.php">Link text</a>
</div>
<?php
	$mood = "sad";
	switch ($mood) {
		case "happy":
			print "Hooray, I'm in a good mood";
			break;
		case "sad":
			print "Awww, don't be down! :(";
			break;
		default:
			print "Neither happy nor sad but $mood";
}
?>
</body>
</html>