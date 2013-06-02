function SavePage(url_parameter) {
	var cookieName = "ReturnPage"
	var currentPageUrl = "";
	document.cookie = cookieName+"=; expires=Thu, 01 Jan 1970 00:00:01 GMT;";
	if (typeof this.href === "undefined") {
	    currentPageUrl = document.location.toString().toLowerCase();
	}
	else {
	    currentPageUrl = this.href.toString().toLowerCase();
	}
	var date = new Date();
 	date.setTime(date.getTime() + 5 * 60 * 1000); //Cookie experation data in 5 minutes
   	document.cookie = cookieName+"="+escape(currentPageUrl)
	 								 + ";expires="+date.toGMTString() + "; path=/";
	
	//---------------New code------------
	location.href=url_parameter; 
	//Link to login page currently this is http://localhost:8081/login
}
