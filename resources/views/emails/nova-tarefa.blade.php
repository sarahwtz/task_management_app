@component('mail::message')
# {{ $tarefa }}

Completion date: {{ $completion_date }}

@component('mail::button', ['url' => $url])
Click here to see the task
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
