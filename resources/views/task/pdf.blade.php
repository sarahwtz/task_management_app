<h2>Task List</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Task</th>
            <th>Completion Date</th>
        </tr>

    </thead>

    <tbody>
        @foreach($tarefas as $i => $tarefa)
         <tr>
            <td>{{ $tarefa->id }}</td>
            <td>{{ $tarefa->tarefa }}</td>
            <td>{{ date('d/m/Y', strtotime($tarefa->completion_date)) }}</td>
         </tr>
        @endforeach
    </tbody>
