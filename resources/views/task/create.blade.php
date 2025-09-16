@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Task</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tarefa.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">New Task</label>
                            <input type="text" class="form-control" name="tarefa" value="{{ old('tarefa') }}">
                            @error('tarefa')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Completion Deadline</label>
                            <input type="date" class="form-control" name="completion_date" value="{{ old('completion_date') }}">
                            @error('completion_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>

                    @if (session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
