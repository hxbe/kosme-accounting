@extends('layout.dashboard')
@section('page', 'Tambah Account Payable')
@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/pickadate/pickadate.css') }}">
@endsection

@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/wizard.css') }}">
@endsection
@section('content')
<section id="vertical-wizard" class="basic-select2">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form action="#" class="wizard-vertical">
                    <!-- step 1 -->
                    <h3>
                        <span class="fonticon-wrap mr-1">
                            <i class="livicon-evo" data-options="name:shoppingcart-in.svg; size: 50px; style:lines; strokeColor:#adb5bd;"></i>
                        </span>
                        <span class="icon-title">
                            <span class="d-block">Pembelian</span>
                            <small class="text-muted">input data pembelian</small>
                        </span>
                    </h3>
                    <!-- step 1 end-->
                    <!-- step 1 content -->
                    <fieldset class="pt-0">
                        <h6 class="pb-50">Form pembelian</h6>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="pembelian">No Pembelian</label>
                                    <input type="text" class="form-control" name="pembelian" id="pembelian">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Suplier</label>
                                    <select class="select2 form-control" name="pembelian-suplier" id="pembelian-suplier">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <!-- step 1 content end-->
                    <!-- step 2 -->
                    <h3>
                        <span class="fonticon-wrap mr-1">
                            <i class="livicon-evo" data-options="name:box-add.svg; size: 50px; style:lines; strokeColor:#adb5bd;"></i>
                        </span>
                        <span class="icon-title">
                            <span class="d-block">Item</span>
                            <small class="text-muted">Input data pembelian item</small>
                        </span>
                    </h3>
                    <!-- step 2 end-->
                    <!-- step 2 content -->
                    <fieldset class="pt-0">
                        <h6 class="py-50">Form pembelian item
                        </h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="item">Nama</label>
                                    <select disabled class="select2 form-control" name="item" id="item">
                                        <option value=""></option>
                                    </select>
                                    {{-- <input type="text" class="form-control" id="proposalTitle1" placeholder="Enter Your House no./ Flate No."> --}}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="item-jumlah">Jumlah</label>
                                    <input disabled type="text" class="form-control" id="item-jumlah">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="item-harga">Harga</label>
                                    <input disabled type="text" class="form-control" id="item-harga" data-bts-prefix="Rp">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="item-pajak">Pajak</label>
                                    <input disabled type="text" class="form-control" id="item-pajak">
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-group">
                                    <button type="button" class="btn btn-icon btn-outline-primary mr-1 mt-2" id="item-tambah" disabled><i class="bx bx-plus"></i></button>
                                </div>
                            </div>
                            <div class="col-12 pr-0">
                                <div class="table-responsive" id="item-list">
                                    {{-- <table class="table p-0"> --}}
                                        {{-- <thead>
                                            <tr>
                                                <th></th>
                                                <th>Item</th>
                                                <th>Harga (Rupiah)</th>
                                                <th>Jumlah (Pieces)</th>
                                                <th>Pajak (Rupiah)</th>
                                                <th>Subtotal (Rupiah)</th>
                                            </tr>
                                        </thead>
                                        <tbody id="item-list-body">
                                            <tr>
                                                <td class="text-center"><a href="javascript:void(0)" id="item-remove" data-id="1"><i class="bx bx-trash text-danger font-medium-1"></i></a></td>
                                                <td>'+item.name+'</td>
                                                <td>'+item.price+'</td>
                                                <td>'+item.qty+'</td>
                                                <td>'+((item.qty*item.price)*0.1)+'</td>
                                                <td>'+((item.qty*item.price)+((item.qty*item.price)*0.1))+'</td>
                                            </tr> --}}
                                        {{-- </tbody>
                                        <tfoot id="item-list-total">
                                            <tr>
                                                <th></th>
                                                <th class="text-right" colspan="4">Total</th>
                                                <th>'+total+'</th>
                                            </tr>
                                        </tfoot> --}}
                                    {{-- </table> --}}
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <!-- step 2 content end-->
                    <!-- section 3 -->
                    <h3>
                        <span class="fonticon-wrap mr-1">
                            <i class="livicon-evo" data-options="name:notebook.svg; size: 50px; style:lines; strokeColor:#adb5bd;"></i>
                        </span>
                        <span class="icon-title">
                            <span class="d-block">Tagihan</span>
                            <small class="text-muted">input data tagihan</small>
                        </span>
                    </h3>
                    <!-- section 3 end-->
                    <!-- step 3 content -->
                    <fieldset class="pt-0">
                        <div class="row">
                            <div class="col-6">
                                <h6 class="py-50">Form Tagihan</h6>
                            </div>
                            <div class="col-6" align="right">
                                <div class="custom-control custom-switch custom-control-inline mb-1">
                                    <input type="checkbox" class="custom-control-input" checked name="ap-tipe" id="ap-tipe">
                                    <span>Hutang</span>
                                    <label class="custom-control-label mx-1" for="ap-tipe"></label>
                                    <span>Piutang</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="tagihan-no">No Tagihan</label>
                                    <input type="text" class="form-control" name="tagihan-no" id="tagihan-no">
                                    {{-- <small class="text-muted form-text">Please enter your first name.</small> --}}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tagihan-date">Tanggal Tagihan</label>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="text" class="form-control pickadate" id="tagihan-date">
                                        <div class="form-control-position">
                                            <i class='bx bx-calendar'></i>
                                        </div>
                                    </fieldset>
                                    {{-- <input type="text" class="form-control" id="firstName12"> --}}
                                    {{-- <small class="text-muted form-text">Please enter your first name.</small> --}}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tagihan-due">Jatuh Tempo</label>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="text" class="form-control pickadate" id="tagihan-due">
                                        <div class="form-control-position">
                                            <i class='bx bx-calendar'></i>
                                        </div>
                                    </fieldset>
                                    {{-- <input type="text" class="form-control" id="firstName12"> --}}
                                    {{-- <small class="text-muted form-text">Please enter your first name.</small> --}}
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">

                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <!-- step 3 content end-->
                    <!-- step 2 -->
                    <h3>
                        <span class="fonticon-wrap mr-1">
                            <i class="livicon-evo" data-options="name:calendar.svg; size: 50px; style:lines; strokeColor:#adb5bd;"></i>
                        </span>
                        <span class="icon-title">
                            <span class="d-block">Termin</span>
                            <small class="text-muted">Input data termin</small>
                        </span>
                    </h3>
                    <!-- step 2 end-->
                    <!-- step 2 content -->
                    <fieldset class="pt-0">
                        <h6 class="py-50">Form termin
                        </h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="termin-name">Nama</label>
                                    <input type="text" class="form-control" id="termin-name">
                                </div>
                                <div class="form-group">
                                    <label for="termin-due">Jatuh Tempo</label>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="text" class="form-control pickadate" id="termin-due">
                                        <div class="form-control-position">
                                            <i class='bx bx-calendar'></i>
                                        </div>
                                    </fieldset>
                                    {{-- <input type="text" class="form-control" id="firstName12"> --}}
                                    {{-- <small class="text-muted form-text">Please enter your first name.</small> --}}
                                </div>
                                <div class="form-group">
                                    <label for="termin-nominal">Nominal</label>
                                    <span class="badge badge-light-danger badge-pill badge-round ml-auto float-right" id="termin-total"></span>
                                    <input type="text" id="termin-nominal">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="termin-keterangan">Keterangan</label>
                                    <textarea class="form-control" id="termin-keterangan" rows="9"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-group">
                                    <button type="button" id="termin-tambah" class="btn btn-icon btn-outline-primary mr-1 mt-2" disabled><i class="bx bx-plus"></i></button>
                                </div>
                            </div>
                            <div class="col-12 pr-0">
                                <div class="table-responsive" id="termin-list">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <!-- step 2 content end-->
                    <!-- section 4 -->
                    <h3>
                        <span class="fonticon-wrap mr-1">
                            <i class="livicon-evo" data-options="name:credit-card-out.svg; size: 50px; style:lines; strokeColor:#adb5bd;"></i>
                        </span>
                        <span class="icon-title">
                            <span class="d-block">Pembayaran</span>
                            <small class="text-muted">input data pembayaran</small>
                        </span>
                    </h3>
                    <!-- section 4 end-->
                    <!-- step 4 content -->
                    <fieldset class="pt-0">
                        <h6 class="py-50">Form Pembayaran<small class="text-danger form-text">silahkan kosongkan apabila belum melakukan pembayaran</small></h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group" id="pembayaran-body">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="pembayaran-date">Tanggal</label>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="text" class="form-control pickadate" id="pembayaran-date">
                                        <div class="form-control-position">
                                            <i class='bx bx-calendar'></i>
                                        </div>
                                    </fieldset>
                                    {{-- <input type="text" class="form-control" id="firstName12"> --}}
                                    {{-- <small class="text-muted form-text">Please enter your first name.</small> --}}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h6 class="py-50">Cash</h6>
                                <div class="form-group">
                                    <label for="pembayaran-nominal-cash">Nominal</label>
                                    <input disabled type="text" class="touchspin" id="pembayaran-nominal-cash" data-bts-max="10000000000000000000000000000000000" data-bts-decimals="2" data-bts-step=".01"  value="0" data-bts-prefix="Rp.">
                                    {{-- <input type="text" class="form-control" id="firstName12"> --}}
                                    {{-- <small class="text-muted form-text">Please enter your first name.</small> --}}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h6 class="py-50">Transfer</h6>
                                <div class="form-group">
                                    <label for="pembayaran-rekening">Pilih Rekening</label>
                                    <select disabled class="select2 form-control" id="pembayaran-rekening">
                                        <option value=""></option>
                                    </select>
                                    {{-- <input type="text" class="form-control" id="firstName12"> --}}
                                    {{-- <small class="text-muted form-text">Please enter your first name.</small> --}}
                                </div>
                                <div class="form-group">
                                    <label for="pembayaran-nominal-transfer">Nominal</label>
                                    <input disabled type="text" class="touchspin" id="pembayaran-nominal-transfer" data-bts-max="10000000000000000000000000000000000" data-bts-decimals="2" data-bts-step=".01"  value="0" data-bts-prefix="Rp.">
                                    {{-- <input type="text" class="form-control" id="firstName12"> --}}
                                    {{-- <small class="text-muted form-text">Please enter your first name.</small> --}}
                                </div>
                            </div>
                            <div class="col-lg-11">
                                <div class="form-group">
                                    <label for="pembayaran-keterangan">Keterangan</label>
                                    <textarea class="form-control" id="pembayaran-keterangan" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-group">
                                    <button disabled type="button" id="pembayaran-tambah" class="btn btn-icon btn-outline-primary mt-2 float-right"><i class="bx bx-plus"></i></button>
                                </div>
                            </div>
                            <div class="col-12 pr-0">
                                <div class="table-responsive" id="pembayaran-list">
                                    {{-- <table class="table p-0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Termin</th>
                                                <th>Tanggal</th>
                                                <th>Nominal (Rupiah)</th>
                                                <th>Tipe</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="javascript:void(0)" onclick="pembayaran_remove('+i+')"><i class="bx bx-trash text-danger font-medium-1"></i></a></td>
                                                <td>'+item.termin+'</td>
                                                <td>'+item.date+'</td>
                                                <td>'+item.value+'</td>
                                                <td>
                                                    <span class="badge badge-light-secondary badge-pill badge-round">'+item.type+'</span>
                                                    <span class="badge badge-light-secondary badge-pill badge-round">'+item.bankaccount+'</span>
                                                </td>
                                                <td>'+item.keterangan+'</td>
                                            </tr>
                                        </tbody>
                                    </table> --}}
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <!-- step 4 content end-->
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('vendor-scripts')
    <script src="{{asset('vendors/js/extensions/jquery.steps.min.js') }}"></script>
    <script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{asset('vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{asset('vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{asset('vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{asset('vendors/js/pickers/pickadate/picker.time.js') }}"></script>
    <script src="{{asset('vendors/js/pickers/pickadate/legacy.js') }}"></script>
    <script src="{{asset('vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}"></script>
@endsection
@section('page-scripts')
    <script src="{{asset('assets/js/supervisor/apadd.js')}}"></script>
    {{-- <script src="{{asset('js/scripts/forms/select/form-select2.js') }}"></script> --}}
    {{-- <script src="{{asset('js/scripts/pickers/dateTime/pick-a-datetime.js') }}"></script> --}}
@endsection
