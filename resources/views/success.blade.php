@extends('template')

@section('content')
    <script src="{{ asset('js/clipboard.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            new ClipboardJS('.btn-copy');
        });
    </script>
    <div class="alert alert-success" role="alert">
        <h3> @lang('messages.done')</h3>
        {{ trans('messages.done_time', ['time' => $time_show]) }}
    </div>
    <div class="form-group">
        <input  class="form-control" id="hash_url" value="{{ $hash_url }}">
    </div>
    <button class="btn btn-primary btn-copy" data-clipboard-target="#hash_url">
        @lang('messages.copy')
    </button>
	<!--<a href="{{ $hash_url }}">{{ $hash_url }}</a>-->
@endsection
