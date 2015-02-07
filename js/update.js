$(document).ready(function() {
        //Added by Yezhuo Zhu
        	$('input#update_button').click(
		function() {
//			alert("click");
			var username = $('input#username').val();
			var password = $('input#password').val();
			var passwordt = $('input#password2').val();
			var email = $('input#email').val();
                        //Modified by Yezhuo Zhu
                        //Get the values from input of lastname, firstname and company
                        var lastname = $('input#lastname').val();
                        var firstname = $('input#firstname').val();
                        var company = $('input#company').val();
			var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
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
			if (email == '') {
				alert("email can't be empty !");
				return ;
			}
			if (password != passwordt) {
				alert("Two password are not equal !");
				return ;
			}
			if (!reg.test(email)) {
				alert("Please input right email !");
				return ;
			};
//			alert(password.length);
			var xmlhttp;
			if (window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
			}else{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			//Modified by Yezhuo Zhu 
                        //Add values of lastname, firstname, company to the url
			var url = "username="+username+"&password="+password+"&email="+email+"&lastname="+lastname+"&firstname="+firstname+"&company="+company;
//			alert(url);
			xmlhttp.open("POST","update_result.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					var Info = xmlhttp.responseText;
					if (Info == "true") {
						alert("Update successfully !")
						location.href = "account_info.php";
					}else{
						alert(Info);
					}
				}
			}
			xmlhttp.send(url);
		}
		);
});