@extends('template')

@section('content')
    <p>
        @lang('messages.note_created') {{ App\Helpers\Routines::formatDate($note->created_at) }}
        @lang('messages.note_activated') {{ App\Helpers\Routines::formatDate($note->time_show) }}
    </p>
    <div class="alert alert-primary">
        <pre>{{ $note->message }}</pre>
    </div>
@endsection
