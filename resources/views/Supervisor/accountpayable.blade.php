@extends('Layout.app')
@section('page', ucfirst($data['company']->name))
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/pages/app-invoice.css') }}">
@endsection
@section('content')
    @include('Layout.header')
    @include('Layout.menu')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{$data['category']->name}}</h4>
                                <div class="heading-elements">
                                    {{-- <a href="" class="btn btn-light-danger pl-2">Tambah</a> --}}
                                    <a class="btn btn-icon btn-light-primary"><i class="bx bx-printer"></i></a>
                                    <a href="{{route('tambah', ['name' => request()->segment(3), 'category' => request()->segment(4)])}}" class="btn btn-icon btn-light-danger"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                            <div class="card-content">
                                <section class="invoice-list-wrapper p-1">
                                    <div class="action-dropdown-btn d-none">
                                        <div class="dropdown invoice-filter-action">
                                            <button class="btn border dropdown-toggle mr-1" type="button" id="invoice-filter-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Filter
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="invoice-filter-btn">
                                                <a class="dropdown-item" href="#">Semua</a>
                                                <a class="dropdown-item" href="#">Hutang</a>
                                                <a class="dropdown-item" href="#">Piutang</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table invoice-data-table dt-responsive nowrap row-grouping" style="width:100%">
                                            <thead>
                                                <tr>
                                                    {{-- <th></th> --}}
                                                    <th>Suplier</th>
                                                    <th>
                                                        <span class="align-middle">Tagihan</span>
                                                    </th>
                                                    <th>Pembelian</th>
                                                    <th>Total</th>
                                                    <th>Tipe</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data['ap'] as $row)
                                                    <tr
                                                        @switch($row->payment_status)
                                                            @case('lunas')
                                                                class='table-success text-success'
                                                            @break
                                                            @case('proses')
                                                                class='table-success'
                                                            @break
                                                            @default

                                                        @endswitch
                                                    >
                                                        <td>
                                                            @if (isset($row->Suplier))
                                                                @foreach ($row->Suplier as $suplier)
                                                                    {{$suplier->name}}
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                        {{-- <td></td> --}}
                                                        <td>
                                                            {{$row->invoice}}
                                                        </td>
                                                        <td>{{$row->purchase}}</td>
                                                        <td>
                                                            @if (isset($row->Purchase))
                                                                @foreach ($row->Purchase as $purchase)
                                                                    Rp. {{number_format($purchase->total)}}
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                        {{-- <td><span class="invoice-amount">$459.30</span></td> --}}
                                                        {{-- <td><small class="text-muted">12-08-19</small></td> --}}
                                                        {{-- <td>
                                                            <span class="bullet bullet-success bullet-sm"></span>
                                                            <small class="text-muted">Technology</small>
                                                        </td> --}}
                                                        <td>
                                                            @if ($row->type == 'hutang')
                                                                <span class="badge badge-warning badge-pill">{{$row->type}}</span>
                                                            @else
                                                                <span class="badge badge-primary badge-pill">{{$row->type}}</span>
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="dropdown">
                                                                <span class="bx bx-customize font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="javascript:void(0)"><i class="bx bx-printer mr-1"></i> cetak</a>
                                                                    <a class="dropdown-item" href="{{route('apdetail', ['name' => request()->segment(3), 'category' => request()->segment(4), 'id' => $row->id])}}"><i class="bx bx-target-lock mr-1"></i> detail</a>
                                                                    <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                                                    <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    @include('Layout.footer')
    @section('script')
        <script src="{{ URL::asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
        <script src="{{ URL::asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ URL::asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
        <script src="{{ URL::asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
        <script src="{{ URL::asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('app-assets/js/scripts/pages/app-invoice.js') }}"></script>
    @endsection
@endsection
