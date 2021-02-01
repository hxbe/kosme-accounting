@if ($message = Session::get('message'))
    @switch($message['type'])
        @case('success')
            <script>
                toastr.success('{{$message["body"]}}', '{{$message["title"]}}');
            </script>
            @break
        @case('warning')
            <script>
                toastr.warning('{{$message["body"]}}', '{{$message["title"]}}');
            </script>
            @break
        @case('info')
            <script>
                toastr.info('{{$message["body"]}}', '{{$message["title"]}}');
            </script>
            @break
            <script>
                toastr.error('{{$message["body"]}}', '{{$message["title"]}}');
            </script>
        @default

    @endswitch
@endif
