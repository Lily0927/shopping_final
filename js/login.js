$(document).ready(function() {
	$('input#login_button').click(
		function() {
//			alert("click");
			var username = $('input#username').val();
			var password = $('input#password').val();
			if (username == '') {
				alert("username can't be empty !");
				return ;
			}
			if (password == '') {
				alert("password can't be empty !");
				return ;
			}
			if (password.length< 6 || password.length > 16) {
				alert("password's length must be in 6 and 16!");
				return ;
			}
			var xmlhttp;
			if (window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
			}else{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			var url = "username="+username+"&password="+password;
//			alert(url);
			xmlhttp.open("POST","login_result.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					var Info = xmlhttp.responseText;
					if (Info == "true") {
						location.href = "index.php";
					}else{
						alert(Info);
					}
				}
			}
			xmlhttp.send(url);
		}
		);
});