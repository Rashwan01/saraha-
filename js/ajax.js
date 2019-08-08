//create a REquest

var myReq;
// if borwser is google or firefox or ms create object from XMLHtppRequest
if(window.XMLHttpRequest)
{
  myReq = new XMLHttpRequest();
}
 else
	// if borwser is less ie 6 create object from ActiveXObject

{

     myReq = new ActiveXObject("Microsoft.XMLHTTP");
 }

// after processing a request to that inside this function
function check(){
	"use strict";
		var div = document.getElementById("searchbody");
	if(myReq.readyState === XMLHttpRequest.DONE)
		{
			if(myReq.status === 200)
				{
//					div.innerHTML = "<p> HI SUCESS</p>";
					div.innerHTML = myReq.responseText;
				}
			else
				{
					div.innerHTML = "<p> FILE IS NOT FOUND</p>";

				}
		}
	

}

document.getElementById("search").onkeyup=function(){

	"use strict";
myReq.onreadystatechange = check;
//send A Request
myReq.open("GET","info.php?q="+this.value, true);
myReq.send();
// JavaScript Document



};

// JavaScript Document