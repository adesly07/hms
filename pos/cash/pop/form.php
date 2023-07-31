<html>
<head>
<title>Popup contact form</title>
<link href="elements.css" rel="stylesheet">
<script src="my_js.js"></script>
</head>
<!-- Body Starts Here -->
<body id="body" style="overflow:hidden;">
<div id="abc">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<!-- Contact Us Form -->
<form action="#" id="form" method="post" name="form">
<img id="close" src="../../images/close.png" onclick ="div_hide()">
<h2>Contact Us</h2>
<hr>
<input id="name" name="name" placeholder="Name" type="text">
<input id="email" name="email" placeholder="Email" type="text">
<textarea id="msg" name="message" placeholder="Message"></textarea>
<a href="javascript:%20check_empty()" id="submit">Send</a>
</form>
</div>
<!-- Popup Div Ends Here -->
</div>
<!-- Display Popup Button -->
<h1>Click Button To Popup Form Using Javascript</h1>
<button id="pop" onClick="div_show()">Pop</button>
<div id="sly">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<!-- Contact Us Form -->
<form action="co.php" id="form" method="post" name="form">
<img id="close" src="../../images/close.png" onclick ="div_hide2()">
<h2>Registration</h2>
<hr>
<input id="name" name="name" placeholder="Firstname" type="text">
<input name="religion" placeholder="Religion" type="text" id="religion" value="<?php echo $religion; ?>" size="35" /><textarea id="msg" name="message" placeholder="Message"></textarea>
<input type="submit" name="submit" id="submit" value="Save" />
<a href="javascript:%20check_empty()" id="submit">Send</a>
</form>
</div>
<!-- Popup Div Ends Here -->
</div>
<!-- Display Popup Button -->
<h1>Click Button To Popup Form Using Javascript</h1>
<button id="popup" onClick="div_show2()">Popup</button>

</body>
<!-- Body Ends Here -->
</html>