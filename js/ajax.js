function ajax(serverpage,id)
{ 
	//alert(serverpage);
	if (window.XMLHttpRequest)
		xmlhttp=new XMLHttpRequest();
	else if (window.ActiveXObject)
		try{
			xmlhttp=new ActiveXObject("MSXML2.XMLHttp");}
		catch(e){
			xmlhttp=new ActiveXObject("MIcrosoft.XMLHttp");}
			//if(xmlhttp)
				
	div=document.getElementById(id);
	xmlhttp.open("POST",serverpage);
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				div.innerHTML=xmlhttp.responseText;
			
		}
					
		}	
		xmlhttp.send(null);	
		
		//<img src="../../images/wait.gif">
}

	