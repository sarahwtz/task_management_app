<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        .titulo {
            border: 1px;
            background-color: #c2c2c2;
            text-align: center;
            width: 100%;
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            page-break-inside: auto;
        }

        table thead {
            display: table-header-group; 
        }

        table tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        table th, table td {
            text-align: left;
            padding: 4px;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>

<body>

    <div class="titulo">Task List</div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Task</th>
                <th>Completion Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tarefas as $tarefa)
                <tr>
                    <td>{{ $tarefa->id }}</td>
                    <td>{{ $tarefa->tarefa }}</td>
                    <td>{{ date('d/m/Y', strtotime($tarefa->completion_date)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
