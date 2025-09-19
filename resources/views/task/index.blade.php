@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            Tasks
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <a href="{{ route('tarefa.create') }}" class="text-primary text-decoration-none me-3">New</a>
                            <a href="{{ route('tarefa.export', ['extensao' =>'xlsx']) }}" class="text-primary text-decoration-none me-3">XLSX</a>
                            <a href="{{ route('tarefa.export', ['extensao' =>'csv']) }}" class="text-primary text-decoration-none me-3">CSV</a>
                            <a href="{{ route('tarefa.export', ['extensao' =>'pdf']) }}" class="text-primary text-decoration-none">PDF</a>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Task</th>
                                <th scope="col">Completion date</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($tarefas as $index => $i)
                            <tr>
                                <td scope="row">{{ $i['id'] }}</td>
                                <td>{{ $i['tarefa'] }}</td>
                                <td>{{ date('d/m/Y', strtotime($i['completion_date'])) }}</td>
                                <td>
                                    <a href="{{ route('tarefa.edit', $i['id']) }}" class="text-primary text-decoration-none">Edit</a>
                                </td>
                                <td>
                                    <form id="form_{{ $i['id'] }}" method="post" action="{{ route('tarefa.destroy', ['tarefa' => $i['id']]) }}">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                    <a href="#" onclick="document.getElementById('form_{{ $i['id'] }}').submit()" class="text-primary text-decoration-none">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <nav>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="{{ $tarefas->previousPageUrl() }}">Previous</a></li>

                            @for($i =1; $i <= $tarefas->lastPage(); $i++)
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
