@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Almost there! We just need you to verify your E-Mail!</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            
                            We've sent you an E-Mail with another link!
                        </div>
                    @endif

                   Before we can proceed, please check your email for a verification link.
                   <br>
                    In case you didn't get one, please click on the following link
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">here!</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
