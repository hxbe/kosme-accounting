// Form Step
var stepsValidation = $(".wizard-vertical");
var form = stepsValidation.show();
stepsValidation.steps({
    headerTag: "h3",
    bodyTag: "fieldset",
    transitionEffect: "fade",
    enableAllSteps: true,
    stepsOrientation: "vertical",
    labels: {
        finish: 'Submit'
    },
    onStepChanging: function(event, currentIndex, newIndex) {
        if (currentIndex > newIndex) {
            $(".actions [href='#next']").addClass('d-none');
            return true;
        }
        return form.valid();
    },
    onFinishing: function(event, currentIndex) {
        return form.valid();
    },
    onFinished: function(event, currentIndex) {
        $.ajax({
            url: assetBaseUrl+"api/supervisor/codewithmamangreget/accountpayable",
            method: "post",
            data: {
                purchase: window.purchase,
                purchase_item: window.purchase_item,
                invoice: window.invoice,
                termin: window.termin,
                payment: window.payment,
                ap: window.ap
            },
            success: function(res, message, code) {
                if(message == 'success'){
                    var url = window.location.pathname;
                    url = url.replace("/tambah", "");
                    url = url.substring(1);
                    window.location.replace(assetBaseUrl+url);
                }else{
                    alert(message);
                }
            }
        });
    }
});

$(document).ready(function() {
    $(".current").find(".step-icon").addClass("bx bx-time-five");
    $(".current").find(".fonticon-wrap .livicon-evo").updateLiviconEvo({
        strokeColor: '#e83e8c'
    });
    $(".actions [href='#next']").addClass('d-none');
});

$(".actions [href='#next']").click(function() {
    $(".done").find(".step-icon").removeClass("bx bx-time-five").addClass("bx bx-check-circle");
    $(".current").find(".step-icon").removeClass("bx bx-check-circle").addClass("bx bx-time-five");
    $(".current").find(".fonticon-wrap .livicon-evo").updateLiviconEvo({
        strokeColor: '#e83e8c'
    });
    $(".current").prev("li").find(".fonticon-wrap .livicon-evo").updateLiviconEvo({
        strokeColor: '#e83e8c'
    });
});
$(".actions [href='#previous']").click(function() {
    $(".current").find(".fonticon-wrap .livicon-evo").updateLiviconEvo({
        strokeColor: '#e83e8c'
    });
    $(".current").next("li").find(".fonticon-wrap .livicon-evo").updateLiviconEvo({
        strokeColor: '#e83e8c'
    });
});
$(".actions [href='#finish']").click(function() {
    $(".done").find(".step-icon").removeClass("bx-time-five").addClass("bx bx-check-circle");
    $(".last.current.done").find(".fonticon-wrap .livicon-evo").updateLiviconEvo({
        strokeColor: '#e83e8c'
    });
    // $(".actions [href='#finish']").addClass('d-none');
    $(".actions [href='#previous']").addClass('d-none');
    // $(".actions [href='#finish']").attr('href', 'javscript:void(0)');
    $(".actions [href='#previous']").attr('href', 'javscript:void(0)');
});
$('.actions a[role="menuitem"]').addClass("btn btn-danger");
$('.icon-tab [role="menuitem"]').addClass("glow ");
$('.wizard-vertical [role="menuitem"]').removeClass("btn-danger").addClass("btn-light-danger");

// Initial variable
window.ap = {};
window.purchase = {};
window.purchase_item = {};
window.invoice = {};
window.termin = {};
window.listitem = {};
window.payment = {};
window.deliver = {};

window.temp = {};
window.temp.termin = 0;
window.temp.payment = 0;
window.temp.type = 'cash';
window.ap.type = 'piutang';
window.ap.payment_status = 0;
window.ap.visible = 1;

var suplier, item = {};

var url = window.location.pathname;
url = url.split('/');
$.ajax({
    url: assetBaseUrl+"api/supervisor/codewithmamangreget/company/" + url[3],
    // dataType: 'application/json',
    success: function(res) {
        window.ap.company = res.data.company.id;
    }
});

$.ajax({
    url: assetBaseUrl+"api/supervisor/codewithmamangreget/category/" + url[4],
    // dataType: 'application/json',
    success: function(res) {
        window.ap.category = res.data.category.id;
    }
});

$.ajax({
    url: assetBaseUrl+"api/supervisor/codewithmamangreget/bank",
    success: function(res) {
        var results = [];
        $.each(res.data.bank, function (index, item) {
            results.push({
                id: item.no,
                text: item.no+'-'+item.bank
            });
        });
        $("#pembayaran-rekening").select2({ data: results, width: '100%'});
    }
});

$.ajax({
    url: assetBaseUrl+"api/supervisor/codewithmamangreget/suplier/"+ url[4],
    // dataType: 'application/json',
    success: function(res) {
        var results = [];
        $.each(res.data.suplier, function(index, item) {
            results.push({
                id: item.id,
                text: item.name
            });
        });
        suplier = $("#pembelian-suplier").select2({
            data: results,
            width: '100%'
        });
    }
});

// Pembelian
$('#pembelian, #pembelian-suplier').on('change', function() {
    if(suplier.find(':selected').val() != '' && $('#pembelian').val() != ''){
        $(".actions [href='#next']").removeClass('d-none');
    }else{
        $(".actions [href='#next']").addClass('d-none');
    }
});
$('#pembelian').on('change', function() {
    window.purchase.no = this.value;
    window.ap.purchase = this.value;
    window.invoice.purchase = this.value;
});

$('#pembelian-suplier').on('change', function() {
    initial_item();
    window.ap.suplier = suplier.find(':selected').val();
});

// Item
function initial_item() {
    window.item = {};
    item = {};
    $("#item").empty();
    $.ajax({
        url: assetBaseUrl+"api/supervisor/codewithmamangreget/suplier/"+suplier.find(':selected').val(),
        success: function(res) {
            var results = [];
            window.item = res.data.suplier[0].item;
            $.each(res.data.suplier[0].item, function (index, item) {
                results.push({
                    id: item.id,
                    text: item.name
                });
            });

            $("#item").removeAttr('disabled');
            $("#item-jumlah").removeAttr('disabled');
            $("#item-harga").removeAttr('disabled');
            $("#item-pajak").removeAttr('disabled');
            item.list = $("#item").select2({ data: results, width: '100%'});
            item.jumlah = $("#item-jumlah").TouchSpin({
                buttondown_class: "btn btn-primary",
                buttonup_class: "btn btn-primary",
                max: 999999999999999999999999999999999999999999999999999999999,
                postfix: 'pcs',
            });
            item.harga = $("#item-harga").TouchSpin({
                buttondown_class: "btn btn-primary",
                buttonup_class: "btn btn-primary",
                decimals:"2",
                step:".01",
                max: 999999999999999999999999999999999999999999999999999999999,
                prefix: 'Rp',
            });
            item.pajak = $("#item-pajak").TouchSpin({
                buttondown_class: "btn btn-primary",
                buttonup_class: "btn btn-primary",
                decimals:"2",
                step:".01",
                max: 999999999999999999999999999999999999999999999999999999999,
                prefix: 'Rp',
            });
            $("#item").val('').change();

        }
    });
}

$('#item, #item-jumlah, #item-harga, #item-pajak').on('change', function() {
    var item = $("#item option:selected");
    if(item.val() == '' || $('#item-jumlah').val() == 0){
        $('#item-tambah').attr('disabled', 'disabled');
    }else{
        $('#item-tambah').removeAttr('disabled');
    }
});

$('#item-tambah').on('click', function() {
    if(window.purchase_item[$("#item option:selected").index()] == null){
        window.purchase_item[$("#item option:selected").index()] = {
            quantity: $("#item-jumlah").val(),
            subtotal: (($("#item-jumlah").val()*$("#item-pajak").val())+($("#item-harga").val()*$("#item-jumlah").val())),
            price: $("#item-harga").val(),
            tax: $("#item-pajak").val(),
            item: $("#item option:selected").val(),
            purchase : $("#pembelian").val(),
            itemname: $("#item option:selected").text(),
        };
    }else{
        window.purchase_item[$("#item option:selected").index()].quantity = $("#item-jumlah").val();
        window.purchase_item[$("#item option:selected").index()].subtotal = (($("#item-jumlah").val()*$("#item-pajak").val())+($("#item-harga").val()*$("#item-jumlah").val()));
        window.purchase_item[$("#item option:selected").index()].price = $("#item-harga").val();
        window.purchase_item[$("#item option:selected").index()].tax = $("#item-pajak").val();
        window.purchase_item[$("#item option:selected").index()].purchase = $("#pembelian").val();
        window.purchase_item[$("#item option:selected").index()].itemname = $("#item option:selected").text();
    }

    $('#item').val('').change();
    $('#item-jumlah').val('');
    $('#item-harga').val('');
    $('#item-pajak').val('');
    $('#item-tambah').attr('disabled', 'disabled');

    refresh_table_item();
});

function remove_item(index){
    delete window.purchase_item[index];
    refresh_table_item();
}

function refresh_table_item() {
    if(!jQuery.isEmptyObject(window.purchase_item)){
        var html = '<table class="table p-0"><thead><tr><th></th><th>Item</th><th>Harga (Rupiah)</th><th>Jumlah (Pieces)</th><th>Pajak (Rupiah/Pieces)</th><th>Subtotal (Rupiah)</th></tr></thead><tbody id="item-list-body">';
        var barang = '<label for="kedatangan-item">Nama</label><select class="select2 form-control" id="kedatangan-item">';
        var total = 0;

        $.each( window.purchase_item, function(i, item) {
            html += '<tr><td class="text-center"><a href="javascript:void(0)" onclick="remove_item('+i+')"><i class="bx bx-trash text-danger font-medium-1"></i></a></td><td>'+item.itemname+'</td><td>'+Number(item.price).toLocaleString('en')+'</td><td>'+item.quantity+'</td><td>'+Number(item.tax).toLocaleString('en')+'</td><td>'+Number((item.quantity*item.price)+((item.quantity*item.tax))).toLocaleString('en')+'</td></tr>';
            total = (total+((item.quantity*item.price)+((item.quantity*item.tax))));
            barang += '<option value="'+item.item+'">'+item.itemname+'</option>';
        });
        barang += '</select>';
        html += '<tr><th></th><th class="text-right" colspan="4">Total (Rupiah)</th><th>'+Number(total).toLocaleString('en')+'</th></tr>';
        $("#kedatangan-body").html(barang);
        $("#item-list").html(html);
        $("#kedatangan-item").select2({
            dropdownAutoWidth: true,
            width: '100%'
        });
        $(".actions [href='#next']").removeClass('d-none');

        window.purchase.total = total;
        $("#termin-total").html('Rp. '+Number(window.purchase.total).toLocaleString('en'));
    }else{
        $(".actions [href='#next']").addClass('d-none');
        $("#item-list").html('');
    }
}

// Tagihan
$('#tagihan-no, #tagihan-date, #tagihan-due').on('change', function() {
    if($('#tagihan-no').val() != '' && $('#tagihan-date').val() != '' && $('#tagihan-due').val() != ''){
        $(".actions [href='#next']").removeClass('d-none');
    }else{
        $(".actions [href='#next']").addClass('d-none');
    }
});

$('#ap-tipe').on('click', function() {
    if ($('#ap-tipe').is(":checked")){
        window.ap.type = 'piutang';
    }else{
        window.ap.type = 'hutang';
    }
});

$('#tagihan-no').on('change', function() {
    window.invoice.no = this.value;
    window.ap.invoice = this.value;
});

$('#tagihan-date').pickadate({
    format: 'd mmmm yyyy',
    onClose: function() {
        window.invoice.date = this.get('select', 'yyyy-mm-dd');
    }
});

$('#tagihan-due').pickadate({
    format: 'd mmmm yyyy',
    onClose: function() {
        window.invoice.due = this.get('select', 'yyyy-mm-dd');
    }
});

// Termin
$('#termin-name, #termin-nominal, #termin-due, #termin-keterangan').on('change', function() {
    if($('#termin-name').val() != '' && $('#termin-nominal').val() != 0 && $('#termin-due').val() != ''){
        $('#termin-tambah').removeAttr('disabled');
    }else{
        $('#termin-tambah').attr('disabled', 'disabled');
    }
});

$('#termin-due').pickadate({
    format: 'd mmmm yyyy',
    onClose: function() {
        window.temp.due = this.get('select', 'yyyy-mm-dd');
    }
});

$("#termin-nominal").TouchSpin({
    buttondown_class: "btn btn-primary",
    buttonup_class: "btn btn-primary",
    decimals:"2",
    step:".01",
    max: 999999999999999999999999999999999999999999999999999999999,
    prefix: 'Rp',
});

$('#termin-tambah').on('click', function() {
    var termin_value = 0;
    console.log(window.purchase.total-window.temp.termin);
    if(Number($('#termin-nominal').val()) > (window.purchase.total-window.temp.termin)){
        termin_value = window.purchase.total-window.temp.termin;
        window.temp.termin = window.purchase.total;
    }else{
        termin_value = $('#termin-nominal').val();
    }
    window.termin[Object.keys(window.termin).length] = {
        name: $('#termin-name').val(),
        value: termin_value,
        start: window.invoice.date,
        end: window.temp.due,
        status: 0,
        keterangan: $('#termin-keterangan').val(),
        invoice: window.invoice.no,
    };
    window.temp.termin = (window.temp.termin+Number($('#termin-nominal').val()));
    $('#termin-name').val('');
    $('#termin-nominal').val('');
    $('#termin-keterangan').val('');
    $('#termin-due').val('');
    $('#termin-tambah').attr('disabled', 'disabled');
    refresh_table_termin();
});

function refresh_table_termin(){
    if(!jQuery.isEmptyObject(window.termin)){
        var html = '<table class="table p-0"> <thead> <tr><th></th> <th>Nama</th> <th>Jatuh Tempo</th> <th>Nominal (Rupiah)</th> <th>Keterangan</th> </tr></thead><tbody>';
        $.each(window.termin, function(i, item) {
            html += '<tr><td class="text-center"><a href="javascript:void(0)" onclick="remove_termin('+i+')"><i class="bx bx-trash text-danger font-medium-1"></i></a></td><td>'+item.name+'</td><td>'+item.end+'</td><td>'+Number(item.value).toLocaleString('en')+'</td><td>'+item.keterangan+'</td></tr>';
        });
        html += '</tbody></table>';
        $("#termin-list").html(html);

        if(Object.keys(window.termin).length > 1){
            html = '<label for="pembayaran-termin">Termin</label><span class="badge badge-light-secondary badge-pill badge-round ml-auto float-right" id="pembayaran-total">Rp. '+Number(window.termin[0].value).toLocaleString('en')+'</span><select class="select2 form-control" name="pembayaran-termin" id="pembayaran-termin">';
            $.each(window.termin, function(i, item) {
                html += '<option value="'+i+'">'+item.name+'</option>';
            });
            html += '</select>';
            $("#pembayaran-body").html(html);
            $(".select2").select2({
                dropdownAutoWidth: true,
                width: '100%'
            });
            $('#pembayaran-termin').on('change', function() {
                var pembayaran_termin = $("#pembayaran-termin option:selected");
                $('#pembayaran-total').html('Rp. '+ Number(window.termin[pembayaran_termin.index()].value).toLocaleString('en'));
            });
        }else if(Object.keys(window.termin).length == 1){
            $("#pembayaran-body").html('<label for="pembayaran-termin">Termin</label><span class="badge badge-light-secondary badge-pill badge-round ml-auto float-right" id="pembayaran-total">'+Number(window.termin[0].value).toLocaleString('en')+'</span><input type="text" class="form-control" value="'+window.termin[0].name+'" disabled id="pembayaran-termin">');
        }else{
            $("#pembayaran-body").html('');
        }

        if($('#pembayaran-date').val() != ''){
            $('#pembayaran-nominal-cash').removeAttr('disabled');
            $('#pembayaran-nominal-transfer').removeAttr('disabled');
            $('#pembayaran-rekening').removeAttr('disabled');
            $('#pembayaran-keterangan').removeAttr('disabled');
            $('#pembayaran-tambah').removeAttr('disabled');
        }else{
            $('#pembayaran-nominal-cash').attr('disabled', 'disabled');
            $('#pembayaran-nominal-transfer').attr('disabled', 'disabled');
            $('#pembayaran-rekening').attr('disabled', 'disabled');
            $('#pembayaran-keterangan').attr('disabled', 'disabled');
            $('#pembayaran-tambah').attr('disabled', 'disabled');
        }

        if(Object.keys(window.termin).length > 1){
            $('#pembayaran-termin').on('change', function () {
                $("#pembayaran-nominal-cash").val(window.termin[$('#pembayaran-termin option:selected').index()].value);
                $("#pembayaran-nominal-transfer").val(window.termin[$('#pembayaran-termin option:selected').index()].value);
            });
        }else{
            $("#pembayaran-nominal-cash").val(window.termin[0].value);
            $("#pembayaran-nominal-transfer").val(window.termin[0].value);
        }
    }else{
        $('#pembayaran-tambah').attr('disabled', 'disabled');
        $("#termin-list").html('');
        $("#pembayaran-body").html('');
    }

    if(window.purchase.total-window.temp.termin > 0){
        $("#termin-total").html('Rp. '+Number((window.purchase.total-window.temp.termin)).toLocaleString('en'));
        $("#termin-total").removeClass('badge-light-success');
        $("#termin-total").addClass('badge-light-danger');
        $("#termin-name").removeAttr('disabled');
        $("#termin-nominal").removeAttr('disabled');
        $("#termin-due").removeAttr('disabled');
        $("#termin-keterangan").removeAttr('disabled');
    }else{
        $("#termin-total").html('nominal tercapai');
        $("#termin-total").removeClass('badge-light-danger');
        $("#termin-total").addClass('badge-light-success');
        $("#termin-name").attr('disabled', 'disabled');
        $("#termin-nominal").attr('disabled', 'disabled');
        $("#termin-due").attr('disabled', 'disabled');
        $("#termin-keterangan").attr('disabled', 'disabled');
    }
}

function remove_termin(index){
    window.temp.termin -= window.termin[index].value;
    delete window.termin[index];
    refresh_table_termin();
}

// Pembayaran
$("#pembayaran-nominal-cash").TouchSpin({
    buttondown_class: "btn btn-primary",
    buttonup_class: "btn btn-primary",
    decimals:"2",
    step:".01",
    max: 999999999999999999999999999999999999999999999999999999999,
    prefix: 'Rp',
});

$("#pembayaran-nominal-transfer").TouchSpin({
    buttondown_class: "btn btn-primary",
    buttonup_class: "btn btn-primary",
    decimals:"2",
    step:".01",
    max: 999999999999999999999999999999999999999999999999999999999,
    prefix: 'Rp',
});

$('#pembayaran-date').on('change', function() {
    if($('#pembayaran-date').val() != '' && !jQuery.isEmptyObject(window.termin)){
        $('#pembayaran-nominal-cash').removeAttr('disabled');
        $('#pembayaran-nominal-transfer').removeAttr('disabled');
        $('#pembayaran-rekening').removeAttr('disabled');
        $('#pembayaran-keterangan').removeAttr('disabled');
        $('#pembayaran-tambah').removeAttr('disabled');
    }else{
        $('#pembayaran-nominal-cash').attr('disabled', 'disabled');
        $('#pembayaran-nominal-transfer').attr('disabled', 'disabled');
        $('#pembayaran-rekening').attr('disabled', 'disabled');
        $('#pembayaran-keterangan').attr('disabled', 'disabled');
        $('#pembayaran-tambah').attr('disabled', 'disabled');
    }
    window.temp.type = 'cash';
    if(Object.keys(window.termin).length > 1){
        $("#pembayaran-nominal-cash").val(window.termin[$('#pembayaran-termin option:selected').index()].value);
        $("#pembayaran-nominal-transfer").val(window.termin[$('#pembayaran-termin option:selected').index()].value);
    }else{
        $("#pembayaran-nominal-cash").val(window.termin[0].value);
        $("#pembayaran-nominal-transfer").val(window.termin[0].value);
    }
});

$('#pembayaran-date').pickadate({
    format: 'd mmmm yyyy',
    onClose: function() {
        window.temp.due = this.get('select', 'yyyy-mm-dd');
    }
});

$('#pembayaran-nominal-cash').on('change', function() {
    window.temp.type = 'cash';
});

$('#pembayaran-rekening').on('change', function() {
    window.temp.type = 'transfer';
});

$('#pembayaran-nominal-transfer').on('change', function() {
    window.temp.type = 'transfer';
});

$('#pembayaran-tambah').on('click', function() {
    var bankaccount, value;
    if(window.temp.type != 'cash'){
        bankaccount = $('#pembayaran-rekening option:selected').val();
        value = $('#pembayaran-nominal-transfer').val();
    }else{
        bankaccount = '-';
        value = $('#pembayaran-nominal-cash').val();
    }
    if(Object.keys(window.termin).length == 1){
        window.payment[0] = {
            terminname: window.termin[0].name,
            termin: $('#pembayaran-termin').val(),
            value: value,
            date: window.temp.due,
            type: window.temp.type,
            bankaccount: bankaccount,
            keterangan: $('#pembayaran-keterangan').val(),
        };
        window.termin[0].status = 1;
    }else{
        window.payment[$('#pembayaran-termin option:selected').index()] = {
            terminname: window.termin[$('#pembayaran-termin option:selected').index()].name,
            termin: $('#pembayaran-termin option:selected').val(),
            value: value,
            date: window.temp.due,
            type: window.temp.type,
            bankaccount: bankaccount,
            keterangan: $('#pembayaran-keterangan').val(),
        };
        window.termin[$('#pembayaran-termin option:selected').index()].status = 1;
    }
    window.temp.due = '';
    $('#pembayaran-date').val('');
    $('#pembayaran-keterangan').val('')
    $('#pembayaran-rekening').val(0).change();
    $('#pembayaran-nominal-transfer').val(0);
    $('#pembayaran-nominal-cash').val(0);

    $('#pembayaran-nominal-cash').attr('disabled', 'disabled');
    $('#pembayaran-nominal-transfer').attr('disabled', 'disabled');
    $('#pembayaran-rekening').attr('disabled', 'disabled');
    $('#pembayaran-keterangan').attr('disabled', 'disabled');
    $('#pembayaran-tambah').attr('disabled', 'disabled');
    refresh_table_pembayaran();
});

function refresh_table_pembayaran(){
    if(!jQuery.isEmptyObject(window.payment)){
        var html = '<table class="table p-0"><thead><tr><th></th><th>Termin</th><th>Tanggal</th><th>Nominal (Rupiah)</th><th>Pembayaran</th><th>Keterangan</th></tr></thead><tbody>';
        $.each(window.payment, function(i, item) {
            if(item.type == 'cash'){
                html += '<tr><td><a href="javascript:void(0)" onclick="remove_pembayaran('+i+')"><i class="bx bx-trash text-danger font-medium-1"></i></a></td><td>'+item.terminname+'</td><td>'+item.date+'</td><td>'+Number(item.value).toLocaleString('en')+'</td><td> <span class="badge badge-light-secondary badge-pill badge-round">'+item.type+'</span></td><td>'+item.keterangan+'</td></tr>';
            }else{
                html += '<tr><td><a href="javascript:void(0)" onclick="remove_pembayaran('+i+')"><i class="bx bx-trash text-danger font-medium-1"></i></a></td><td>'+item.terminname+'</td><td>'+item.date+'</td><td>'+Number(item.value).toLocaleString('en')+'</td><td> <span class="badge badge-light-secondary badge-pill badge-round">'+item.type+'</span> <span class="badge badge-light-secondary badge-pill badge-round">'+item.bankaccount+'</span></td><td>'+item.keterangan+'</td></tr>';
            }
        });
        html += '</tbody></table>';
        $("#pembayaran-list").html(html);
    }else{
        $("#pembayaran-list").html('');
    }
}

function remove_pembayaran(index){
    window.termin[index].status = 0;
    delete window.payment[index];
    refresh_table_pembayaran();
}

// Kedatangan Barang
$("#kedatangan-no, #kedatangan-batch, #kedatangan-jumlah, #kedatangan-date").on('change', function () {
    if($("#kedatangan-no").val() != '' && $("#kedatangan-batch").val() != '' && $("#kedatangan-jumlah").val() != '' && $("#kedatangan-date").val() != ''){
        $("#kedatangan-tambah").removeAttr('disabled');
    }else{
        $("#kedatangan-tambah").attr('disabled', 'disabled');
    }
});

$("#kedatangan-batch").TouchSpin({
    buttondown_class: "btn btn-primary",
    buttonup_class: "btn btn-primary",
    max: 999999999999999999999999999999999999999999999999999999999,
});

$("#kedatangan-jumlah").TouchSpin({
    buttondown_class: "btn btn-primary",
    buttonup_class: "btn btn-primary",
    max: 999999999999999999999999999999999999999999999999999999999,
    postfix: 'pcs',
});


$('#kedatangan-date').pickadate({
    format: 'd mmmm yyyy',
    onClose: function() {
        window.invoice.date = this.get('select', 'yyyy-mm-dd');
    }
});
