@extends('layout.dashboard')
@section('page', 'Account Payable')
@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/extensions/dataTables.checkboxes.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/responsive.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/sweetalert2.min.css') }}">
@endsection

@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-invoice.css') }}">
@endsection
@section('content')
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{$data['category']->name}}</h4>
                    <div class="heading-elements">
                        <a class="btn btn-icon btn-light-primary"><i class="bx bx-printer"></i></a>
                        <a href="{{route('apadd', ['company' => request()->segment(3), 'category' => request()->segment(4)])}}" class="btn btn-icon btn-light-danger"><i class="bx bx-plus"></i></a>
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
                                    <a class="dropdown-item" href="javascript:void(0)">Semua</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Hutang</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Piutang</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table invoice-data-table dt-responsive nowrap row-grouping" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Suplier</th>
                                        <th>Tagihan</th>
                                        <th>Pembelian</th>
                                        <th>Total</th>
                                        <th>Jatuh Tempo</th>
                                        <th>Tipe</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($data['ap']))
                                        @foreach ($data['ap'] as $ap)
                                            <tr>
                                                {{-- Suplier --}}
                                                <td>
                                                    @isset($ap->Suplier)
                                                        {{$ap->Suplier->name}}
                                                        @php($total = 0)
                                                        @foreach ($data['ap'] as $datatotal)
                                                            @if($datatotal->suplier == $ap->suplier)
                                                                @php($total += $datatotal->Purchase->total)
                                                            @endif
                                                        @endforeach
                                                        <span class="badge badge-light-primary badge-pill badge-round float-right">Rp. {{number_format($total)}}</span>
                                                    @endisset
                                                </td>
                                                <td>
                                                    @isset($ap->Invoice)
                                                    {{$ap->Invoice->no}}
                                                    @endisset
                                                </td>
                                                <td>
                                                    @php($pid = 0)
                                                    @isset($ap->Purchase)
                                                    @php($pid = $ap->Purchase->no)
                                                        {{$ap->Purchase->no}}
                                                    @endisset
                                                </td>
                                                <td>
                                                    @isset($ap->Purchase)
                                                        Rp. {{number_format($ap->Purchase->total)}}
                                                    @endisset
                                                </td>
                                                <td>
                                                    @isset($ap->Invoice)
                                                        {{date('d M Y', strtotime($ap->Invoice->due))}}
                                                    @endisset
                                                </td>
                                                <td>
                                                    @isset($ap->type)
                                                        @if ($ap->type == 'hutang')
                                                            <span class="badge badge-warning badge-pill">{{$ap->type}}</span>
                                                        @else
                                                            <span class="badge badge-primary badge-pill">{{$ap->type}}</span>
                                                        @endif
                                                    @endisset
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <span class="bx bx-customize font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void(0)"><i class="bx bx-printer mr-1"></i> cetak</a>
                                                            <a class="dropdown-item" href="{{route('apdetail', ['name' => request()->segment(3), 'category' => request()->segment(4), 'id' => $ap->id])}}"><i class="bx bx-target-lock mr-1"></i> detail</a>
                                                            {{-- <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a> --}}
                                                            <a class="dropdown-item" href="javascript:void(0)" onclick="apdelete('{{$pid}}')"><i class="bx bx-trash mr-1"></i> delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </section>
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
