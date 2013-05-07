function getCookie(c_name){
	var c_value = document.cookie;
	var c_start = c_value.indexOf(" " + c_name + "=");
	if (c_start == -1)
	  {
	  	c_start = c_value.indexOf(c_name + "=");
	  }
	if (c_start == -1)
	  {
	  c_value = null;
	  }
	else
	  {
	  c_start = c_value.indexOf("=", c_start) + 1;
	  var c_end = c_value.indexOf(";", c_start);
	  if (c_end == -1)
	  {
	c_end = c_value.length;
	}
	c_value = unescape(c_value.substring(c_start,c_end));
	}
	return c_value;
}

function update_trolley(){
	// cookie: "<cid>-<#>-<priceper>;..."
	if(document.cookie.indexOf("trolley") >= 0){ // cookie bestaat
		var cookie = getCookie("trolley");
		if(cookie != "Null"){
			big = cookie.split(";");
			var length = big.length, element = null;
			var total = 0, aantal = 0;
			for(var i = 0; i < length; i++){
				little = big[i].split("-");
				aantal = aantal + parseInt(little[1]);
				total = total + (parseInt(little[2]) * parseFloat(little[1]));
			}
			document.getElementById("price").innerHTML = "Price: " + String(total);
			document.getElementById("quantity").innerHTML = "Quantity: " + String(aantal);
		}
	}
}

function createCookie(cookie_name, cookie_value, exdays){
	var exdate = new Date();
	exdate.setDate(exdate.getDate() + exdays);
	var c_value = escape(cookie_value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
	document.cookie = cookie_name + "=" + c_value;
}

window.onload = function onpageload(){
	createCookie("trolley", "2-1-14.00;3-1-15.00", 1);
	update_trolley();
}

