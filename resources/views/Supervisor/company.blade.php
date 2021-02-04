@extends('layout.dashboard')
@section('page', 'Perusahaan')
@section('content')
    <section id="bg-variants">
        <div class="row">
            @foreach ($data as $row)
                <div class="col-xl-4 col-sm-6 col-12">
                    <div class="card text-center">
                        <div class="card-content d-flex">
                            <div class="card-body">
                                <img src="{{ asset($row->logo) }}" alt="{{$row->name}}" height="60" class="mb-1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{route('apcompany', $row->abbr)}}" class="btn btn-light-danger">Cek Sekarang</a>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <a href="javascript:void(0)" class="btn btn-light-primary">Cetak Laporan</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
