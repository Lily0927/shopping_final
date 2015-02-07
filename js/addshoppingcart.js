$(document).ready(function() {
	$('div#name input[type=button]').click(
		function() {
			var url = window.location.search;
			var itemid = url.substring(url.lastIndexOf("=")+1,url.length);
	//		alert(itemid);
			var name = $('div#name h3').text();
			var price = parseInt($('div#price span a').text());

			var num = document.getElementById('qty');
			num = num.value;
			var xmlhttp;
			if (window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
			} else{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}

			var url = "itemid="+encodeURIComponent(itemid)+"&name="+encodeURIComponent(name)+
			"&price="+encodeURIComponent(price)+"&num="+encodeURIComponent(num);
			xmlhttp.open("POST","add_shopping_cart_result.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded;");
			xmlhttp.onreadystatechange = function() {
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
				{
					var add_info = xmlhttp.responseText;
					if (add_info == "true") {
						alert("Add ShoppingCart successfully !");
						location.href = "view.php?itemid="+itemid;
					}else{
						alert(add_info);
						if (add_info == "Please Login First !!") {
							location.href = "account_login.php";
						}
					}
				}
			}
			xmlhttp.send(url);
		}

		)
});