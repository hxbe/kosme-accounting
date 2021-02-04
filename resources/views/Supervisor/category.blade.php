@extends('layout.dashboard')
@section('page', 'Kategori')
@section('content')
<section id="block-level-buttons">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row justify-content-center">
                        @foreach ($data as $row)
                            <div class="col-sm-12 col-lg-4">
                                <div class="form-group">
                                    <a href="{{route('aplist', ['company' => request()->segment(3), 'category' => strtolower(str_replace(' ', '-', $row->name))])}}" class="btn mb-1 btn-light-danger btn-lg btn-block white">{{$row->name}}</a>
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
@endsection
