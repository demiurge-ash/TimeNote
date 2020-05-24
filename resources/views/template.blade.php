<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TimeNote</title>
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/jquery.datetimepicker.css') }}" rel="stylesheet">
	<link href="{{ asset('css/note.css') }}" rel="stylesheet">
</head>

<body>
<div class="note vertical-center">
	<main class="container">
		<div class="d-flex flex-row justify-content-between  align-items-center">
			<div>
				<h1>
					<a href="{!! url('/'); !!}" class="align-items-center d-flex">
						<svg class="logoicon mr-3">
                            <use xlink:href="{{ asset('img/bomb.svg') }}#timebomb"></use>
                        </svg>
                        <span class="first-word">Time</span><span class="second-word">Note</span>
					</a>
				</h1>
			</div>
            @if (request()->route() && (request()->route()->getName() != 'about'))
                <div class="pad-proc"><a href="{{ route('about') }}">@lang('messages.how')</a></div>
            @endif
		</div>
    	@yield('content')
	</main>
</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery.datetimepicker.js') }}"></script>
<script>
	$(document).ready(function(){
		$.datetimepicker.setLocale('{{ app()->getLocale() }}');
		$('#datetimepicker').datetimepicker({
			format:'Y-m-d H:i:s',
			defaultDate:'{!! App\Helpers\Routines::createDatePlusHour("Y/m/d") !!}',
			defaultTime:'{!! App\Helpers\Routines::createDatePlusHour("H:i:s") !!}',
			minDate:'{!! date("Y/m/d"); !!}',
			maxDate:'{!! date("Y/m/d", strtotime("+1 month")); !!}',
			yearStart:'{!! date("Y"); !!}',
			yearEnd:'{!! date("Y", strtotime("+1 year")); !!}',
			roundTime:'floor',
			dayOfWeekStart:1,
			step:10,
			inline:true
		});
	});
</script>

</body>
</html>
