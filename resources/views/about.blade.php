@extends('template')

@section('content')
    <h3 class="mb-3">@lang('messages.about')</h3>
    <p class="lead">@lang('messages.about_site')</p>
    <p class="lead">@lang('messages.about_author'): <a href="https://demiart.ru">Demiurge Ash</a> &copy; {{ date('Y') }}</p>
    <p class="lead">GitHub: <a href="https://github.com/demiurge-ash/TimeNote">https://github.com/demiurge-ash/TimeNote</a></p>
    <div class="lead">@lang('messages.about_used'):
        <div class="col-lg-4 no-pad">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="http://php.net/">PHP 7.4</a></li>
                <li class="list-group-item"><a href="https://laravel.com/">Laravel 7</a></li>
                <li class="list-group-item"><a href="https://getbootstrap.com/">Bootstrap 4.5</a></li>
                <li class="list-group-item"><a href="https://jquery.com/">jQuery 1.10</a></li>
                <li class="list-group-item"><a href="https://github.com/xdan/datetimepicker">DateTimePicker 2.5</a></li>
                <li class="list-group-item"><a href="https://clipboardjs.com/">clipboard.js 2.0</a></li>
            </ul>
        </div>
    </div>
@endsection
