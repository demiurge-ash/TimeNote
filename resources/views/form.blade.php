@extends('template')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

	<form action="{{ route('form.submit') }}" method="post">
		{{ csrf_field() }}
        <div class="row">
            <div class="col-lg-8">
                <div class="form-group">
                    <textarea name="text" id="text" cols="30" rows="8" class="form-control" placeholder="@lang('messages.enter_text')" required>{{ old('text') }}</textarea>
                </div>
            </div>
            <div class="col-lg-4 no-pad">
                <div class="form-group">
                    <input type="text" class="form-control" id="datetimepicker" name="date" value="@empty(old('date')){!! date('Y-m-d H:i:s', strtotime('+1 hour')); !!}@else{{old('date')}}@endif">
                </div>
            </div>
        </div>
		<button class="btn btn-primary"> @lang('messages.send') </button>
	</form>
@endsection
