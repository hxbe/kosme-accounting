@extends('Layout.app')
@section('page', 'AP ('.$data["company"]->name.')')
@section('content')
    @include('Layout.header')
    @include('Layout.menu')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            {{-- @foreach ($data as $datas)
                <p>{{ $datas }}</p>
            @endforeach --}}
            {{-- {{var_dump($data)}} --}}
            <section id="block-level-buttons">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Kategori Account Payable</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                    @foreach ($data['category'] as $row)
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="form-group">
                                                <a href="{{route('aplist', ['name' => request()->segment(3), 'category' => strtolower(str_replace(' ', '-', $row->name))])}}" class="btn mb-1 btn-light-danger btn-lg btn-block white">{{$row->name}}</a>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    @include('Layout.footer')
@endsection
