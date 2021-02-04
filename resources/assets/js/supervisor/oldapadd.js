
  //        vertical Wizard       //
  // ------------------------------
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
      onStepChanging: function (event, currentIndex, newIndex) {
          // Allways allow previous action even if the current form is not valid!
          if (currentIndex > newIndex) {
            return true;
          }
          return form.valid();
      },
      onFinishing: function (event, currentIndex) {
          return form.valid();
      },
      onFinished: function (event, currentIndex) {
        $.ajax({
            url: "http://127.0.0.1:8000/api/supervisor/codewithmamangreget/accountpayable",
            method: "post",
            data:{
                purchase: window.purchase,
                purchase_item: window.purchase_item,
                invoice: window.invoice,
                termin: window.termin,
                payment: window.payment,
                ap: window.ap
            },
            success: function(res) {
                console.log(res);
            }
        });

        // console.log(window.ap);
        // //  payment_status,deliver,category,company
        // console.log(window.purchase);
        // // created_at,updated_at
        // console.log(window.purchase_item);
        // // quantity,subtotal,tax,item,purchase
        // console.log(window.invoice);
        // //
        // console.log(window.termin);
        // //
        // console.log(window.payment);
        // // belum
        // console.log(window.deliver);
        // // belum
      }
  });

  // live Icon color change on state change
    $(document).ready(function () {
        $(".touchspin").TouchSpin({
            buttondown_class: "btn btn-primary",
            buttonup_class: "btn btn-primary",
        });

        $(".current").find(".step-icon").addClass("bx bx-time-five");
        $(".current").find(".fonticon-wrap .livicon-evo").updateLiviconEvo({
            strokeColor: '#e83e8c'
        });

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
        window.ap.type = 'piutang';
        window.ap.visible = 1;

        // Load inital
        var url = window.location.pathname;
        url = url.split('/');
        $.ajax({
            url: "http://127.0.0.1:8000/api/supervisor/codewithmamangreget/company/"+url[3],
            // dataType: 'application/json',
            success: function(res) {
                window.ap.company = res.data.company.id;
            }
        });

        $.ajax({
            url: "http://127.0.0.1:8000/api/supervisor/codewithmamangreget/category/"+url[4],
            // dataType: 'application/json',
            success: function(res) {
                window.ap.category = res.data.category.id;
            }
        });

        $.ajax({
            url: "http://127.0.0.1:8000/api/supervisor/codewithmamangreget/suplier",
            // dataType: 'application/json',
            success: function(res) {
                var results = [];
                $.each(res.data.suplier, function (index, item) {
                    results.push({
                        id: item.id,
                        text: item.name
                    });
                });
                $("#pembelian-suplier").select2({ data: results, width: '100%'});
            }
        });

        $.ajax({
            url: "http://127.0.0.1:8000/api/supervisor/codewithmamangreget/bank",
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

        // Pembelian
        $('#pembelian').on('change', function() {
            window.purchase.no = this.value;
            window.ap.purchase = this.value;
            window.invoice.purchase = this.value;
        });

        $('#pembelian-suplier').on('change', function() {
            window.purchase_item = {};
            window.item = {};
            window.listitem = {};
            refresh_table_item();
            $("#item").empty();

            $.ajax({
                url: "http://127.0.0.1:8000/api/supervisor/codewithmamangreget/suplier/"+this.value,
                // dataType: 'application/json',
                // data: {"with": ['id', 'ad']},
                success: function(res) {
                    var results = [];
                    window.item = res.data.suplier[0].item;
                    $.each(res.data.suplier[0].item, function (index, item) {
                        results.push({
                            id: item.id,
                            text: item.name
                        });
                    });
                    $("#item").select2({ data: results, width: '100%'});
                }
            });

            var suplier = $("#pembelian-suplier option:selected");
            window.ap.suplier = suplier.val();
        });

        // Item
        $('#item, #item-jumlah').on('change', function() {
            var item = $("#item option:selected");
            if(item.val() == '' || $('#item-jumlah').val() == 0){
                $('#item-tambah').attr('disabled', 'disabled');
            }else{
                $('#item-tambah').removeAttr('disabled');
            }
        });

        $('#item-tambah').on('click', function() {
            var item = $("#item option:selected");
            if(window.purchase_item[item.index()] == null){
                window.purchase_item[item.index()] = {
                    quantity: $("#item-jumlah").val(),
                    subtotal: (($("#item-harga").val()*($("#item-pajak").val()/100))+(window.item[item.index()].price*$("#item-jumlah").val())),
                    tax: ($("#item-harga").val()*($("#item-pajak").val()/100)),
                    price: $("#item-harga").val(),
                    item: window.item[item.index()].id,
                    itemname: window.item[item.index()].name,
                    purchase : $("#pembelian").val(),
                };
            }else{
                window.purchase_item[item.index()].quantity = $("#item-jumlah").val();
                window.purchase_item[item.index()].subtotal = ((($("#item-jumlah").val()*window.item[item.index()].price)*0.1)+(window.item[item.index()].price*$("#item-jumlah").val()));
                window.purchase_item[item.index()].price =  $("#item-harga").val();
                window.purchase_item[item.index()].tax = ($("#item-harga").val()*($("#item-pajak").val()/100));
                window.purchase_item[item.index()].purchase = $("#pembelian").val();
            }


            // var item = $("#item option:selected");
            // if(window.listitem[item.index()] == null){
            //     window.listitem[item.index()] = {
            //         id : item.val(),
            //         name: window.item[item.index()].name,
            //         price: $("#item-harga").val(),
            //         tax: ($("#item-harga").val()*($("#item-pajak").val()/100)),
            //         qty: $("#item-jumlah").val(),
            //         subtotal: (($("#item-harga").val()*($("#item-pajak").val()/100))+(window.item[item.index()].price*$("#item-jumlah").val())),
            //     };

            //     window.purchase_item[item.index()] = {
            //         quantity: $("#item-jumlah").val(),
            //         subtotal: (($("#item-harga").val()*($("#item-pajak").val()/100))+(window.item[item.index()].price*$("#item-jumlah").val())),
            //         tax: ($("#item-harga").val()*($("#item-pajak").val()/100)),
            //         price: $("#item-harga").val(),
            //         item: window.item[item.index()].id,
            //         itemname: window.item[item.index()].name,
            //         purchase : $("#pembelian").val(),
            //     };
            // }else{
            //     window.listitem[item.index()].tax = ($("#item-harga").val()*($("#item-pajak").val()/100));
            //     window.listitem[item.index()].qty = $("#item-jumlah").val();
            //     window.listitem[item.index()].subtotal =((($("#item-jumlah").val()*window.item[item.index()].price)*0.1)+(window.item[item.index()].price*$("#item-jumlah").val()));
            //     window.listitem[item.index()].quantity = $("#item-jumlah").val();
            //     window.listitem[item.index()].price =  $("#item-harga").val();

            //     window.purchase_item[item.index()].subtotal = ((($("#item-jumlah").val()*window.item[item.index()].price)*0.1)+(window.item[item.index()].price*$("#item-jumlah").val()));
            //     window.purchase_item[item.index()].price =  $("#item-harga").val();
            //     window.purchase_item[item.index()].tax = ($("#item-harga").val()*($("#item-pajak").val()/100));
            //     window.purchase_item[item.index()].purchase = $("#pembelian").val();
            // }

            $('#item').val('').change();
            $('#item-jumlah').val(0);
            $('#item-tambah').attr('disabled', 'disabled');
            // refresh_table_item();
        });

        // Tagihan
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
            min: new Date(window.invoice.date),
            onClose: function() {
                window.invoice.due = this.get('select', 'yyyy-mm-dd');
            }
        });

        // Termin
        $('#termin-name, #termin-nominal, #termin-due, #termin-keterangan').on('change', function() {
            if($('#termin-name').val() == '' || $('#termin-nominal').val() == 0 || $('#termin-due').val() == ''){
                $('#termin-tambah').attr('disabled', 'disabled');
            }else{
                $('#termin-tambah').removeAttr('disabled');
            }
        });

        $('#termin-due').pickadate({
            format: 'd mmmm yyyy',
            min: new Date(window.invoice.date),
            onClose: function() {
                window.temp.due = this.get('select', 'yyyy-mm-dd');
            }
        });

        $('#termin-tambah').on('click', function() {
            var termin_value = 0;
            if(Number($('#termin-nominal').val()) > (window.purchase.total-window.temp.termin)){
                window.temp.termin = window.purchase.total;
                termin_value = window.purchase.total;
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
            $('#termin-nominal').val(0);
            $('#termin-keterangan').val('');
            $('#termin-due').empty();
            $('#termin-due').val('');
            $('#termin-due').pickadate({
                format: 'd mmmm yyyy',
                min: new Date(window.temp.due),
                onClose: function() {
                    window.temp.due = this.get('select', 'yyyy-mm-dd');
                }
            });
            $('#termin-tambah').attr('disabled', 'disabled');
            window.temp.due = '';
            refresh_table_termin();
        });

        // Pembayaran
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
                    termin: $('#pembayaran-termin').val(),
                    value: value,
                    date: window.temp.due,
                    type: window.temp.type,
                    bankaccount: bankaccount,
                    keterangan: $('#pembayaran-keterangan').val(),
                };
            }else{
                window.payment[Object.keys(window.payment).length] = {
                    termin: $('#pembayaran-termin option:selected').val(),
                    value: value,
                    date: window.temp.due,
                    type: window.temp.type,
                    bankaccount: bankaccount,
                    keterangan: $('#pembayaran-keterangan').val(),
                };
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
    });

    function refresh_table_item() {
        if(!jQuery.isEmptyObject(window.listitem)){
            var html = '<table class="table p-0"><thead><tr><th></th><th>Item</th><th>Harga (Rupiah)</th><th>Jumlah (Pieces)</th><th>Pajak (Rupiah)</th><th>Subtotal (Rupiah)</th></tr></thead><tbody id="item-list-body">';
            var barang = '<label for="kedatangan-item">Nama</label><select class="select2 form-control" id="kedatangan-item">';
            var total = 0;

            $.each( window.listitem, function(i, item) {
                html += '<tr><td class="text-center"><a href="javascript:void(0)" onclick="remove_item('+i+')"><i class="bx bx-trash text-danger font-medium-1"></i></a></td><td>'+item.name+'</td><td>'+Number(item.price).toLocaleString('en')+'</td><td>'+item.qty+'</td><td>'+Number((item.qty*item.price)*0.1).toLocaleString('en')+'</td><td>'+Number((item.qty*item.price)+((item.qty*item.price)*0.1)).toLocaleString('en')+'</td></tr>';
                total = (total+((item.qty*item.price)+((item.qty*item.price)*0.1)));
                barang += '<option value="'+item.id+'">'+item.name+'</option>';
            });
            barang += '</select>';
            html += '<tr><th></th><th class="text-right" colspan="4">Total (Rupiah))</th><th>'+Number(total).toLocaleString('en')+'</th></tr>';
            $("#kedatangan-body").html(barang);
            $("#item-list").html(html);
            $(".select2").select2({
                dropdownAutoWidth: true,
                width: '100%'
            });

            window.purchase.total = total;
            $("#termin-total").html('Rp. '+Number(window.purchase.total).toLocaleString('en'));
        }else{
            $("#item-list").html('');
        }
    }

    function remove_item(index){
        delete window.listitem[index];
        delete window.purchase_item[index];
        refresh_table_item();
    }

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

    function refresh_table_pembayaran(){
        if(!jQuery.isEmptyObject(window.payment)){
            var html = '<table class="table p-0"><thead><tr><th></th><th>Termin</th><th>Tanggal</th><th>Nominal (Rupiah)</th><th>Pembayaran</th><th>Keterangan</th></tr></thead><tbody>';
            $.each(window.payment, function(i, item) {
                if(item.type == 'cash'){
                    html += '<tr><td><a href="javascript:void(0)" onclick="remove_pembayaran('+i+')"><i class="bx bx-trash text-danger font-medium-1"></i></a></td><td>'+item.termin+'</td><td>'+item.date+'</td><td>'+Number(item.value).toLocaleString('en')+'</td><td> <span class="badge badge-light-secondary badge-pill badge-round">'+item.type+'</span></td><td>'+item.keterangan+'</td></tr>';
                }else{
                    html += '<tr><td><a href="javascript:void(0)" onclick="remove_pembayaran('+i+')"><i class="bx bx-trash text-danger font-medium-1"></i></a></td><td>'+item.termin+'</td><td>'+item.date+'</td><td>'+Number(item.value).toLocaleString('en')+'</td><td> <span class="badge badge-light-secondary badge-pill badge-round">'+item.type+'</span> <span class="badge badge-light-secondary badge-pill badge-round">'+item.bankaccount+'</span></td><td>'+item.keterangan+'</td></tr>';
                }
            });
            html += '</tbody></table>';
            $("#pembayaran-list").html(html);
        }else{
            $("#pembayaran-list").html('');
        }
    }

    function remove_pembayaran(index){
        delete window.payment[index];
        refresh_table_pembayaran();
    }

    // Form Wizard
    // Icon change on state
    // if click on next button icon change
    $(".actions [href='#next']").click(function () {
        $(".done").find(".step-icon").removeClass("bx bx-time-five").addClass("bx bx-check-circle");
        $(".current").find(".step-icon").removeClass("bx bx-check-circle").addClass("bx bx-time-five");
        // live icon color change on next button's on click
        $(".current").find(".fonticon-wrap .livicon-evo").updateLiviconEvo({
        strokeColor: '#e83e8c'
        });
        $(".current").prev("li").find(".fonticon-wrap .livicon-evo").updateLiviconEvo({
        strokeColor: '#e83e8c'
        });
    });
    $(".actions [href='#previous']").click(function () {
        // live icon color change on next button's on click
        $(".current").find(".fonticon-wrap .livicon-evo").updateLiviconEvo({
        strokeColor: '#e83e8c'
        });
        $(".current").next("li").find(".fonticon-wrap .livicon-evo").updateLiviconEvo({
        strokeColor: '#e83e8c'
        });
    });
    // if click on  submit   button icon change
    $(".actions [href='#finish']").click(function () {
        $(".done").find(".step-icon").removeClass("bx-time-five").addClass("bx bx-check-circle");
        $(".last.current.done").find(".fonticon-wrap .livicon-evo").updateLiviconEvo({
        strokeColor: '#e83e8c'
        });
        // $(".actions [href='#finish']").addClass('d-none');
        // $(".actions [href='#finish']").attr('href', 'javscript:void(0)');
        // $(".actions [href='#previous']").addClass('d-none');
        // $(".actions [href='#previous']").attr('href', 'javscript:void(0)');
    });
    // add primary btn class
    $('.actions a[role="menuitem"]').addClass("btn btn-danger");
    $('.icon-tab [role="menuitem"]').addClass("glow ");
    $('.wizard-vertical [role="menuitem"]').removeClass("btn-danger").addClass("btn-light-danger");
