<script type="text/javascript">
function SavePage() {
	var cookieName = "ReturnPage"
	var currentPageUrl = "";
	if (typeof this.href === "undefined") {
	    currentPageUrl = document.location.toString().toLowerCase();
	}
	else {
	    currentPageUrl = this.href.toString().toLowerCase();
	}
	var date = new Date();
 	data.setTime(date.getTime() + 5 * 60 * 1000) //Cookie experation data in 5 minutes
   	document.cookie = cookieName+"="+escape(currentPageUrl)
	 								 + ";expires="+date.toGMTString();
	
	//---------------New code------------
	location.href="http://localhost:8081/login" 
	//Link to login page currently this is http://localhost:8081/login
	}
</script>
