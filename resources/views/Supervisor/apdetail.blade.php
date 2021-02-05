@extends('layout.dashboard')
@section('page', 'Account Payable')
@section('vendor-styles')
@endsection

@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-users.css') }}">
@endsection
@section('content')
<section class="users-view">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail Account Payable</h4>
                    <div class="heading-elements">
                        {{-- <a href="" class="btn btn-light-danger pl-2">Tambah</a> --}}
                        <a href="javascript:void(0)" class="btn btn-icon btn-light-primary"><i class="bx bx-printer"></i></a>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @foreach ($data['ap'] as $row)
                            <div class="row">
                                <div class="col-12 col-md-5 mt-1">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>Suplier</td>
                                                <td>
                                                    {{$row->Suplier->name}}
                                                    {{-- @foreach ($row->Suplier as $suplier)
                                                        {{$suplier->name}}
                                                    @endforeach --}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Kategori</td>
                                                <td>
                                                    {{$row->Category->name}}
                                                    {{-- @foreach ($row->Category as $category)
                                                    @endforeach --}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tipe</td>
                                                <td>
                                                    @if ($row->type == 'hutang')
                                                        <span class="badge badge-light-warning">{{ ucfirst($row->type) }}</span>
                                                    @else
                                                        <span class="badge badge-light-success">{{ ucfirst($row->type) }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>No Invoice</td>
                                                <td>{{$row->invoice}}</td>
                                            </tr>
                                            <tr>
                                                <td>No Purchase</td>
                                                <td>{{$row->purchase}}</td>
                                            </tr>
                                            <tr>
                                                <td>Jatuh Tempo</td>
                                                <td>
                                                    {{date('d M Y', strtotime($row->Invoice->due))}}
                                                    {{-- @foreach ($row->Invoice as $invoice)
                                                    @endforeach --}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>
                                                    @switch($row->payment_status)
                                                        @case('belum dibayar')
                                                            <span class="badge badge-light-danger">{{ ucfirst($row->payment_status) }}</span>
                                                        @break
                                                        @case('proses')
                                                            <span class="badge badge-light-warning">{{ ucfirst($row->payment_status) }}</span>
                                                        @break
                                                        @default
                                                            <span class="badge badge-light-success">{{ ucfirst($row->payment_status) }}</span>
                                                    @endswitch
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-7">
                                    <div class="table-responsive">
                                        <table class="table p-0">
                                            <thead>
                                                <tr>
                                                    <th>Item</th>
                                                    <th>Harga</th>
                                                    <th>Jumlah</th>
                                                    <th>Pajak</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($row->Purchase->purchaseItem as $item)
                                                    <tr>
                                                        <td>{{$item->Item->name}}</td>
                                                        <td>{{number_format($item->price)}}</td>
                                                        <td>{{number_format($item->quantity)}}</td>
                                                        <td>{{number_format($item->tax)}}</td>
                                                        <td>{{number_format($item->subtotal)}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-7 offset-md-5 mt-2">
                                    <div class="table-responsive">
                                        <table class="table p-0">
                                            <thead>
                                                <tr>
                                                    <th>Termin</th>
                                                    <th>Nominal</th>
                                                    <th>Jatuh Tempo</th>
                                                    <th>Keterangan</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($row->Invoice->Termin as $item)
                                                    <tr>
                                                        <td>{{$item->name}}</td>
                                                        <td>{{number_format($item->value)}}</td>
                                                        <td>{{date('d M Y', strtotime($item->end))}}</td>
                                                        <td>{{$item->keterangan}}</td>
                                                        <td>
                                                            @if ($item->status != 1)
                                                                <span class="badge badge-light-danger">Belum</span>
                                                            @else
                                                                <span class="badge badge-light-success">Sudah Dibayar</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('vendor-scripts')
    <script src="{{asset('vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{asset('vendors/js/tables/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{asset('vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{asset('vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{asset('vendors/js/tables/datatable/responsive.bootstrap.min.js') }}"></script>
    <script src="{{asset('vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
@endsection
@section('page-scripts')
    <script src="{{asset('assets/js/supervisor/aplist.js')}}"></script>
@endsection
