//ajax.js
//fungsi untuk membuat objek XMLHttpRequest
function getXMLHTTPRequest() {
    if (window.XMLHttpRequest) {
        //code for odern browsers
        return new XMLHttpRequest();
    }else{
        //code for IE browser
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
}

//fungsi untuk melakukan request ke get_server_time.php melalui ajax
function get_server_time(){
    var xmlhttp = getXMLHTTPRequest();
    var page = 'get_server_time.php';
    xmlhttp.open("GET", page, true);
    xmlhttp.onreadystatechange = function () {
        document.getElementById('showtime').innerHTML = '<img src="../images/ajax_loader.gif" />';
        if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
            document.getElementById('showtime').innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.send(null);
}

//fungsi untuk menambahkan customer dengan GET
function add_customer_get() {
    var xmlhttp = getXMLHTTPRequest();
    //get input value
    var name = encodeURI(document.getElementById('name').value);
    var address = encodeURI(document.getElementById('address').value);
    var city = encodeURI(document.getElementById('city').value);
    //validate
    if(name != "" && address != "" && city != ""){
        //set url and inner
        var url = "add_customer_get.php?name=" + name + "&address=" + address + 
        "&city=" + city;
        //alert(url)
        var inner = 'add_response';
        //open request
        xmlhttp.open('GET', url, true);
        xmlhttp.onreadystatechange = function() {
            document.getElementById(inner).innerHTML = '<img src="../images/ajax_loader.gif" />';
            if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
                document.getElementById(inner).innerHTML = xmlhttp.responseText;
            }
            return false;
        }
        xmlhttp.send(null);
    }else{
        alert("Please fill all the fields");
    }
}

//fungsi untuk menambahkan customer dengan POST
function add_customer_post(){
    var xmlhttp = getXMLHTTPRequest();
    //get input value
    var name = encodeURI(document.getElementById('name').value);
    var address = encodeURI(document.getElementById('address').value);
    var city = encodeURI(document.getElementById('city').value);
    if(name != "" && address != "" && city != ""){
        //set url and inner
        var url = "add_customer_post.php"; alert(url);
        var inner = "add_response";
        //set parameter and open request
        var params = "name="+name+"&address="+address+"&city="+city;
        xmlhttp.open("POST", url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.onreadystatechange = function() {
            document.getElementById(inner).innerHTML = '<img src="../images/ajax_loader.gif" />';
            if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
                document.getElementById(inner).innerHTML = xmlhttp.responseText;
            }
            return false;
        }
        xmlhttp.send(params);
    }else{
        alert("Please fill all the fields");
    }
}

//fungsi template untuk memanggil AJAX
function callAjax(url,inner){
    var xmlhttp = getXMLHTTPRequest();
    xmlhttp.open("GET", url, true);
    xmlhttp.onreadystatechange = function() {
        document.getElementById(inner).innerHTML = '<img src="../images/ajax_loader.gif" />';
        if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
            document.getElementById(inner).innerHTML = xmlhttp.responseText;
        }
        return false;
    }
    xmlhttp.send(null);
}

//fungsi untuk menampilkan customer
function showCustomer(customerid) {
    var inner = 'detail_customer';
    var url = "get_customer.php?id="+customerid;
    if (customerid == '') {
        document.getElementById(inner).innerHTML = '';
    }else{
        callAjax(url,inner);
    }
}

function show_books(){
    var xmlhttp = getXMLHTTPRequest();
    //get input value
    var judul = encodeURI(document.getElementById('judul').value);
    //validate
    if (judul != "") {
        //set url and inner
        var url = "get_books.php?judul=" + judul;
        var inner = 'detail_books';
        //open request
        xmlhttp.open('GET', url, true);
        xmlhttp.onreadystatechange = function() {
            document.getElementById(inner).innerHTML = '<img src="../images/ajax_loader.gif" />';
            if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
                document.getElementById(inner).innerHTML = xmlhttp.responseText;
            }
            return false;
        }
        xmlhttp.send(null);
    }else{
        alert("Please fill all the fields");
    }
}
// function getISBN()

//cekNis unik
// function cekNis(nis){

// }
//uts tampil ekskul
function showEkstrakurikuler(kelas) {
    var inner = 'ekstrakurikuler';
    var url = "get_ekstrakurikuler.php?id="+kelas;
    if (kelas == '') {
        document.getElementById(inner).innerHTML = '';
    }else{
        callAjax(url,inner);
    }
}

//add data ekskul siswa
function add_siswa_post(){
    var xmlhttp = getXMLHTTPRequest();
    //get input value
    var nis = encodeURI(document.getElementById('nis').value);
    var nama = encodeURI(document.getElementById('nama').value);
    var jk = encodeURI(document.getElementById('jenis_kelamin').value);
    var kelas = encodeURI(document.getElementById('kelas').value);
    if(nis != "" && nama != "" && jk != "" && kelas != ""){
        //set url and inner
        var url = "add_siswa_post.php"; alert(url);
        var inner = "add_response_siswa";
        //set parameter and open request
        var params = "nis="+nis+"&nama="+nama+"&jenis_kelamin="+jk+"&kelas="+kelas;
        xmlhttp.open("POST", url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.onreadystatechange = function() {
            document.getElementById(inner).innerHTML = '<img src="../images/ajax_loader.gif" />';
            if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
                document.getElementById(inner).innerHTML = xmlhttp.responseText;
            }
            return false;
        }
        xmlhttp.send(params);
    }else{
        alert("Please fill all the fields");
    }
}

//add ekstrakurikuler_siswa
function add_siswa_ekskul() {
    var xmlhttp = getXMLHTTPRequest();
    //get input value
    var nis = encodeURI(document.getElementById('nis').value);
    var id = encodeURI(document.getElementById('idekstrakurikuler').value);
    if(nis != "" && id != ""){
        //set url and inner
        var url = "add_siswa_ekskul.php"; alert(url);
        var inner = "add_response_ekskul";
        //set parameter and open request
        var params = "nis="+nis+"&nama="+nama+"&jenis_kelamin="+jk+"&kelas="+kelas;
        xmlhttp.open("POST", url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.onreadystatechange = function() {
            document.getElementById(inner).innerHTML = '<img src="../images/ajax_loader.gif" />';
            if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
                document.getElementById(inner).innerHTML = xmlhttp.responseText;
            }
            return false;
        }
        xmlhttp.send(params);
    }else{
        alert("Please fill all the fields");
    }
}