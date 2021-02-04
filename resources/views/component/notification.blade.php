@if(session()->has('message'))
@php ($message = session()->get('message'))
    <script>
        toastr['{{$message["type"]}}']('{{$message["body"]}}','{{$message["title"]}}');
    </script>
@endif
