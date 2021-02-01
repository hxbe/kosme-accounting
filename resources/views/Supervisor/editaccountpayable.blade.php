@extends('Layout.app')
@section('page', 'Tambah Account Payable')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/plugins/forms/wizard.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') }}">
@endsection
@section('content')
    @include('Layout.header')
    @include('Layout.menu')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <section id="vertical-wizard" class="basic-select2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@if (isset($data['suplier']))
                            @foreach ($data['suplier'] as $row)
                                {{ $row->name }}
                            @endforeach
                        @endif
                        </h4>
                    </div>
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
                                    <h6 class="pb-50">Form Pembelian</h6>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="firstName12">No Pembelian</label>
                                                <input type="text" class="form-control" id="firstName12">
                                                {{-- <small class="text-muted form-text">Please enter your first name.</small> --}}
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="lastName1">Suplier</label>
                                                @if (isset($data['suplier']))
                                                <select class="select2 form-control">
                                                    <option value=""></option>
                                                    @foreach ($data['suplier'] as $row)
                                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                                    @endforeach
                                                </select>
                                                @endif
                                                {{-- <input type="text" class="form-control" id="lastName1" placeholder="Enter Your Last Name"> --}}
                                                {{-- <small class="text-muted form-text">Please enter your last name.</small> --}}
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
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="proposalTitle1">Nama</label>
                                                    @if (isset($data['suplier']))
                                                    <select class="select2 form-control">
                                                        <option value=""></option>
                                                        @foreach ($data['suplier'] as $row)
                                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @endif
                                                {{-- <input type="text" class="form-control" id="proposalTitle1" placeholder="Enter Your House no./ Flate No."> --}}
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="jobtitle">Jumlah</label>
                                                <input type="text" class="touchspin" value="1" data-bts-postfix="pcs">
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-icon btn-outline-primary mr-1 mt-2"><i class="bx bx-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-12 pr-0">
                                            <div class="table-responsive">
                                                <table class="table p-0">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>Item</th>
                                                            <th>Harga (Rupiah)</th>
                                                            <th>Jumlah (Pieces)</th>
                                                            <th>Pajak (Rupiah)</th>
                                                            <th>Subtotal (Rupiah)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center"><a href="#"><i class="bx bx-trash text-danger font-medium-1"></i></a></td>
                                                            <td>Sorbosil BFG-500</td>
                                                            <td>{{number_format(1256490)}}</td>
                                                            <td>26</td>
                                                            <td>{{number_format(((10/100*1256490)*26))}}</td>
                                                            <td>{{number_format((((10/100*1256490)*26)+(1256490*26)))}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center"><a href="#"><i class="bx bx-trash text-danger font-medium-1"></i></a></td>
                                                            <td>ATL Sphere(B) White 2A (4BR)</td>
                                                            <td>{{number_format(1843830)}}</td>
                                                            <td>12</td>
                                                            <td>{{number_format(((10/100*1843830)*12))}}</td>
                                                            <td>{{number_format((((10/100*1843830)*12)+(1843830*12)))}}</td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th></th>
                                                            <th class="text-right" colspan="4">Total</th>
                                                            <th>{{number_format((((10/100*1256490)*26)+(1256490*26))+(((10/100*1843830)*12)+(1843830*12)))}}</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
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
                                                <input type="checkbox" class="custom-control-input" checked id="customSwitch1">
                                                <span>Bayar nanti</span>
                                                <label class="custom-control-label mx-1" for="customSwitch1"></label>
                                                <span>Bayar sekarang</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="firstName12">No Tagihan</label>
                                                <input type="text" class="form-control" id="firstName12">
                                                {{-- <small class="text-muted form-text">Please enter your first name.</small> --}}
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="firstName12">Tanggal Tagihan</label>
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control pickadate">
                                                    <div class="form-control-position">
                                                        <i class='bx bx-calendar'></i>
                                                    </div>
                                                </fieldset>
                                                {{-- <input type="text" class="form-control" id="firstName12"> --}}
                                                {{-- <small class="text-muted form-text">Please enter your first name.</small> --}}
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
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
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="proposalTitle1">Nama</label>
                                                <input type="text" class="form-control" id="proposalTitle1">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="jobtitle">Keterangan</label>
                                                <textarea class="form-control" id="basicTextarea" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-icon btn-outline-primary mr-1 mt-2"><i class="bx bx-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-12 pr-0">
                                            <div class="table-responsive">
                                                <table class="table p-0">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Keterangan</th>
                                                            <th>Jatuh Tempo</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Users</td>
                                                            <td>Yes</td>
                                                            <td>No</td>
                                                            <td>No</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Articles</td>
                                                            <td>No</td>
                                                            <td>Yes</td>
                                                            <td>No</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Staff</td>
                                                            <td>Yes</td>
                                                            <td>Yes</td>
                                                            <td>No</td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
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
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="firstName12">Termin</label>
                                                <input type="text" class="form-control" id="firstName12">
                                                <small class="text-danger form-text">silahan masukkan bila ada termin</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="py-50">Cash</h6>
                                            <div class="form-group">
                                                <label for="firstName12">Nominal</label>
                                                <input type="text" class="touchspin" value="0" data-bts-prefix="Rp.">
                                                {{-- <input type="text" class="form-control" id="firstName12"> --}}
                                                {{-- <small class="text-muted form-text">Please enter your first name.</small> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="py-50">Transfer</h6>
                                            <div class="form-group">
                                                <label for="firstName12">Pilih Rekening</label>
                                                @if (isset($data['suplier']))
                                                <select class="select2 form-control">
                                                    <option value=""></option>
                                                    @foreach ($data['bank_account'] as $row)
                                                        <option value="{{$row->no}}">{{$row->Bank->abbr.'-'.$row->no}}</option>
                                                    @endforeach
                                                </select>
                                                @endif
                                                {{-- <input type="text" class="form-control" id="firstName12"> --}}
                                                {{-- <small class="text-muted form-text">Please enter your first name.</small> --}}
                                            </div>
                                            <div class="form-group">
                                                <label for="firstName12">Nominal</label>
                                                <input type="text" class="touchspin" value="0" data-bts-prefix="Rp.">
                                                {{-- <input type="text" class="form-control" id="firstName12"> --}}
                                                {{-- <small class="text-muted form-text">Please enter your first name.</small> --}}
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="firstName12">Keterangan</label>
                                                <textarea class="form-control" id="basicTextarea" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <!-- step 4 content end-->
                                <!-- step 5 -->
                                <h3>
                                    <span class="fonticon-wrap mr-1">
                                        <i class="livicon-evo" data-options="name:truck.svg; size: 50px; style:lines; strokeColor:#adb5bd;"></i>
                                    </span>
                                    <span class="icon-title">
                                        <span class="d-block">Kedatangan barang</span>
                                        <small class="text-muted">input data kedatangan barang</small>
                                    </span>
                                </h3>
                                <!-- step 5 end-->
                                <!-- step 5 content -->
                                <fieldset class="pt-0">
                                    <h6 class="py-50">Form kedatangan barang</h6>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="firstName12">Tanggal kedatangan</label>
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control pickadate">
                                                    <div class="form-control-position">
                                                        <i class='bx bx-calendar'></i>
                                                    </div>
                                                </fieldset>
                                                {{-- <input type="text" class="form-control" id="firstName12"> --}}
                                                {{-- <small class="text-muted form-text">Please enter your first name.</small> --}}
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="proposalTitle1">Nama</label>
                                                    @if (isset($data['suplier']))
                                                    <select class="select2 form-control">
                                                        <option value=""></option>
                                                        @foreach ($data['suplier'] as $row)
                                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @endif
                                                {{-- <input type="text" class="form-control" id="proposalTitle1" placeholder="Enter Your House no./ Flate No."> --}}
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="jobtitle">Jumlah</label>
                                                <input type="text" class="touchspin" value="1" data-bts-postfix="pcs">
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-icon btn-outline-primary mr-1 mt-2"><i class="bx bx-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-12 pr-0">
                                            <div class="table-responsive">
                                                <table class="table p-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Item</th>
                                                            <th>Jumlah (Pieces)</th>
                                                            <th>Datang (Pieces)</th>
                                                            <th>Persentase</th>
                                                            <th>Batch</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="table-danger text-danger">
                                                            <td>Sorbosil BFG-500</td>
                                                            <td>26</td>
                                                            <td>0</td>
                                                            <td>0%</td>
                                                            <td>-</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Item tak teduga</td>
                                                            <td>20</td>
                                                            <td>15</td>
                                                            <td>75%</td>
                                                            <td>1</td>
                                                        </tr>
                                                        <tr class="table-primary text-primary">
                                                            <td>ATL Sphere(B) White 2A (4BR)</td>
                                                            <td>12</td>
                                                            <td>12</td>
                                                            <td>100%</td>
                                                            <td>1</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <!-- step 5 content end-->
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    @include('Layout.footer')

    @section('script')
        <script src="{{ URL::asset('app-assets/vendors/js/extensions/jquery.steps.min.js') }}"></script>
        <script src="{{ URL::asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
        <script src="{{ URL::asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
        <script src="{{ URL::asset('app-assets/js/scripts/forms/wizard-steps.js') }}"></script>
        <script src="{{ URL::asset('app-assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
        <script src="{{ URL::asset('app-assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
        <script src="{{ URL::asset('app-assets/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
        <script src="{{ URL::asset('app-assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>
        <script src="{{ URL::asset('app-assets/js/scripts/forms/select/form-select2.js') }}"></script>
        <script src="{{ URL::asset('app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}"></script>
        <script src="{{ URL::asset('app-assets/js/scripts/forms/number-input.js') }}"></script>
        <script src="{{ URL::asset('app-assets/js/scripts/pickers/dateTime/pick-a-datetime.js') }}"></script>
    @endsection
@endsection
