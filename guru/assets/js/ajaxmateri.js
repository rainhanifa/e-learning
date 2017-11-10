function pilih_kota(dom, kota) {
    console.log("Loading submateri for "+kota);
    document.getElementById(dom).innerHTML="Loading ...";
    var xmlhttp=new GetXmlHttpObject();
    if (xmlhttp==null) {
        alert ("Your browser does not support AJAX!");
        return;
    }
    var date=new Date();
    var timestamp=date.getTime();
	//alamat url script pemroses
    var url="http://localhost/e_pko/epsettings/guru/viewguru/postmateri.php";
	//menyusun variabel yang akan dikirimkan dengan AJAX
    var param="submateri="+kota;
	
	//tidak perlu dirubah
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 || xmlhttp.readyState=="complete") {
            var res=xmlhttp.responseText;
            document.getElementById(dom).innerHTML=res;
        }
    }
    xmlhttp.open("POST",url,true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.setRequestHeader("Content-length", param.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(param);
	//tidak perlu dirubah
}


function GetXmlHttpObject() {
    var xmlhttp=null;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlhttp=new XMLHttpRequest();
    }
    catch (e) {
        // Internet Explorer
        try {
            xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlhttp;
}

function clearDom(dom) {
	document.getElementById(dom).innerHTML="";
}