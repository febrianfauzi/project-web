var input = document.getElementById("pesan");
var pesanValidasi = document.getElementById("pesan").value;
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   kirimPesan();
//    if(pesanValidasi == null || pesanValidasi == ""){
//         console.log("Inputan tidak boleh kosong!");
//    } else {
//     kirimPesan();
//    }
  }
});



//Inisiasi 
function inisiasi() {
    var interval;
    daftarObrolan();
}




//Proses Updating dan kirim Pesan
function daftarObrolan() {
    $(document).ready(function () {
        list = '';
        $.ajax({
            url: 'listteman.php',
        }).done(function (data) {
            var data = JSON.parse(data);

            for (var i = 0; i < data.length; i++) {
                if(data[i]['temanObrolan'] == 'admin'){
                    console.log(data[i]['temanObrolan']);
                } else {
                var list = '<div class = "chat_list" >' +
                    '<div class="chat_people" style="cursor: pointer;" onclick="manage(\'' + data[i]['temanObrolan'] + '\')"> ' +
                    '<div class="chat_img">' +
                    '<img src="' + data[i]['gambar'] + '" alt="">' +
                    '</div>' +
                    '<div class = "chat_ib" >' +
                    '<h5>' + data[i]['namaLengkap'] + '<span class = "chat_date" ></span></h5>' +
                    '<p ></p>' +
                    ' </div>' +
                    '</div>' +
                    '</div>';
                }
                $(list).appendTo('#daftarObrolan');

            }
        });
    })
}
function manage(temanObrolan) {
    this.teman = temanObrolan;
    clearInterval(this.intervalID);
    this.intervalID = setInterval(function () {
        loadHistoriObrolan(temanObrolan)
    }, 500);
}

function loadHistoriObrolan(temanObrolan) {
    $.ajax({
        url: 'view.php',
        type: 'POST',
        data: {
            temanObrolan: temanObrolan
        }
    }).done(function (response) {
        $('#chating').html(response)
    });
}

function kirimPesan() {
 
    var temanObrolan = this.teman;
    var pesan = document.getElementById("pesan").value;
    console.log("cek" + pesan);
    $('#pesan').val('');
    $.ajax({
        url: 'insert.php',
        type: 'POST',
        data: {
            temanObrolan: temanObrolan,
            pesan: pesan
        }
    }).done(function (response) {
        manage(temanObrolan);
        $('#pesan').val('');
    });
}

//Fitur 
function cariTemanObrolan() {
    var keyword = $('#keyword').val();
    clearInterval(this.intervalID);
    $('#daftarObrolan').text('');
    $('#chating').text('');
    if (keyword == '') {
        daftarObrolan();
    } else {
        list = '';
        $.ajax({
            url: 'caritemnaObrolan.php',
            type: 'POST',
            data: {
                keyword: keyword
            }
        }).done(function (data) {
            var data = JSON.parse(data);
            for (var i = 0; i < data.length; i++) {
                var list = '<div class = "chat_list" >' +
                    '<div class="chat_people" style="cursor: pointer;" onclick="manage(\'' + data[i]['temanObrolan'] + '\')"> ' +
                    '<div class="chat_img">' +
                    '<img src="' + data[i]['gambar'] + '" alt="">' +
                    '</div>' +
                    '<div class = "chat_ib" >' +
                    '<h5>' + data[i]['namaLengkap'] + '<span class = "chat_date" ></span></h5>' +
                    '<p ></p>' +
                    ' </div>' +
                    '</div>' +
                    '</div>';
                $(list).appendTo('#daftarObrolan');

            }
        });
    }
}
