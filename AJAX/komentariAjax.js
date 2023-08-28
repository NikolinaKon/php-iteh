var xmlHttp;
function radSaKomentarima(){
    xmlHttp = GetXmlHttpObject();
    var naziv = document.getElementById('naziv').value;
    var cena = parseInt(document.getElementById('cena').value);
    var opis = document.getElementById('opis').value;
    var korId = parseInt(document.getElementById('korId').value);

    if(xmlHttp==null){
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "AJAX/dodajKomentar.php";
    url=url+"?korId="+korId+"&naziv="+naziv+"&cena="+cena+"&opis="+opis;
    url=url+"&sid="+Math.random();
    xmlHttp.onreadystatechange=stateChanged;
    xmlHttp.open("GET",url,true);
    xmlHttp.send(null);
}

function obrisiKomentare(){
    xmlHttp = GetXmlHttpObject();
    if(xmlHttp == null){
        alert("Browser does not support HTTP Request");
    }
    var url = "AJAX/obrisiKomentare.php";
    url = url+"?sid="+Math.random();
    xmlHttp.onreadystatechange = stateChangedDelete;
    xmlHttp.open("GET",url,true);
    xmlHttp.send(null);
}


function stateChanged(){
    if(xmlHttp.readyState==4){
        console.log(xmlHttp.responseText);
        document.getElementById("tblKomentari").innerHTML = xmlHttp.responseText;
        document.getElementById('naziv').value = '';
        document.getElementById('cena').value = '';
        document.getElementById('opis').value = '';
        document.getElementById('korId').value = '';
    }
}

function stateChangedDelete(){
    if(xmlHttp.readyState==4){
        console.log(xmlHttp.responseText);
        document.getElementById("tblKomentari").innerHTML = xmlHttp.responseText;
    }
}

function GetXmlHttpObject(){
    var xmlHttp = null;
    try{
        xmlHttp = new XMLHttpRequest();
    }catch(e){
        try{
            xmlHttp = new ActiveXObject("Msxm12.XMLHTTP");
        }catch(e){
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}