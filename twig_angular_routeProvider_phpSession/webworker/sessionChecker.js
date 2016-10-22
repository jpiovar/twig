



function timedCount() { debugger;
    
    
	
	
	
	var http = new XMLHttpRequest();
var url = "../dblib_exec/sesprocess.php";
var params = "sesok=33&sesoperation=set";
http.open("POST", url, true);

//Send the proper header information along with the request
http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

http.onreadystatechange = function() {//Call a function when the state changes.
    if(http.readyState == 4 && http.status == 200) {
        alert(http.responseText);
    }
}
http.send(params);
	
    setTimeout("timedCount()",500);
}

timedCount();