@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" style="color:blue;">Please Login or Register to use this app!</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <a href="books"><button class="btn btn-primary"> Book List</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
