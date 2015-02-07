
function add() {
	var xmlhttp;
	var name = document.getElementById('name');
	var address = document.getElementById('address');
	var city = document.getElementById('city');
	var state = document.getElementById('state');
	var country = document.getElementById('country');
	var zip = document.getElementById('zip');
	var phonenumber = document.getElementById('phone');
	var rest = document.getElementById('result');
//	var form = document.getElementsByTagName('form');
	if (window.XMLHttpRequest)
  	{// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}
	else
  	{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	

	//post method
	var url = "name="+encodeURIComponent(name.value)+"&address="+encodeURIComponent(address.value)+
	"&city="+encodeURIComponent(city.value)+"&state="+encodeURIComponent(state.value)+
	"&country="+encodeURIComponent(country.value)+"&zip="+encodeURIComponent(zip.value)+
	"&phonenumber="+encodeURIComponent(phonenumber.value);
	xmlhttp.open("POST","add_address_result.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded;");
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var add_info = xmlhttp.responseText;
			if (add_info == "true") {
				alert("Add address successfully!!");
				location.href = "cart.php";
			}else{
				alert(add_info);
			}
		}
	}
	xmlhttp.send(url);

}
