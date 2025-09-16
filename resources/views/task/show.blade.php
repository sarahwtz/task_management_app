@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $tarefa->tarefa }}</div>

                <div class="card-body">
                 <fieldset disabled>
                        <div class="mb-3">
                            <label class="form-label">Completion Deadline</label>
                            <input type="date" class="form-control" value="{{ $tarefa->completion_date }}">
                        </div>

                        <div class="mb-3">
                         
                        </div>

                    </fieldset>
                    <a href="{{ url()->previous() }}"class="btn btn-primary">Back</a>


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
