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
   	date.setTime(date.getTime()+(30*1000));
	document.cookie = cookieName+"="+escape(currentPageUrl)
	 								 + ";expires="+date.toGMTString();
	}
</script>
