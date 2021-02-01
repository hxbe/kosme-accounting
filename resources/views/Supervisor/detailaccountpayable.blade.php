@extends('Layout.app')
@section('page', 'AP ('.$data["company"]->name.')')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/pages/page-users.css') }}">
@endsection
@section('content')
    @include('Layout.header')
    @include('Layout.menu')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
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
                                                                @foreach ($row->Suplier as $suplier)
                                                                    {{$suplier->name}}
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kategori</td>
                                                            <td>
                                                                @foreach ($row->Category as $category)
                                                                    {{$category->name}}
                                                                @endforeach
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
                                                                @foreach ($row->Invoice as $invoice)
                                                                    {{date('d M Y', strtotime($invoice->due))}}
                                                                @endforeach
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
                                            <div class="col-12 col-md-7">
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
                                                            <tr>
                                                                <td>Users</td>
                                                                <td>Yes</td>
                                                                <td>No</td>
                                                                <td>No</td>
                                                                <td>Yes</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Articles</td>
                                                                <td>No</td>
                                                                <td>Yes</td>
                                                                <td>No</td>
                                                                <td>Yes</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Staff</td>
                                                                <td>Yes</td>
                                                                <td>Yes</td>
                                                                <td>No</td>
                                                                <td>No</td>
                                                            </tr>
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
        </div>
    </div>

    @include('Layout.footer')
    @section('script')
        <script src="{{ URL::asset('app-assets/js/scripts/pages/page-users.js') }}"></script>
    @endsection
@endsection
