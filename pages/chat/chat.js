//Inisiasi 
function inisiasi() {
    var interval;
    daftarObrolan();
}

function view(){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
      if(xhr.readyState === 4 && xhr.status === 200){
        document.getElementById('chat').innerHTML = xhr.responseText;
      }
    }
    xhr.open('GET','http://127.0.0.1/akhir/pages/chat/view.php',true);
    xhr.send();
  }setInterval(function(){view()},500);

//  insert
  function insert(){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
      if(xhr.readyState === 4 && xhr.status === 200){
        xhr.responseText;
      }
    }

    xhr.open('POST','http://127.0.0.1/akhir/pages/chat/insert.php',true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send('message='+form1.message.value);
    console.log(form1.message.value);
    form1.message.value='';
    return false;
  }

