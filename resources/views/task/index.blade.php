@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tasks</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Task</th>
                                <th scope="col">Completion date</th>
                            </tr>
                        </thead>

                        <tbody>
                          @foreach($tarefas as $index => $i)
                        <tr>
                            <td scope="row">{{ $i['id'] }}</td>
                            <td>{{ $i['tarefa'] }}</td>
                            <td>{{ date('d/m/Y', strtotime($i['completion_date'])) }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
