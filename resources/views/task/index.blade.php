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
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                          @foreach($tarefas as $index => $i)
                        <tr>
                            <td scope="row">{{ $i['id'] }}</td>
                            <td>{{ $i['tarefa'] }}</td>
                            <td>{{ date('d/m/Y', strtotime($i['completion_date'])) }}</td>
                            <td><a href="{{ route('tarefa.edit', $i['id']) }}">Edit</a></td>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                     <nav>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="{{ $tarefas->previousPageUrl() }}">Previous</a></li>

                            @for($i =1; $i <=$tarefas->lastPage(); $i++)
                            <li class="page-item {{ $tarefas->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $tarefas->url($i) }}">{{ $i }}</a>
                            </li>
                            @endfor
                         
                            <li class="page-item"><a class="page-link" href="{{ $tarefas->nextPageUrl() }}">Next</a></li>
                        </ul>
                        </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
