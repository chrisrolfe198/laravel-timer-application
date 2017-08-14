@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a href="/" class="nav-link active">Timers</a>
                        </li>
                        <li class="nav-item">
                            <a href="/groups" class="nav-link">Groups</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    @foreach ($timers as $timer)
                        <div class="col-sm-12 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $timer->name }}</h4>
                                    <p class="card-text">This timer currently has been running for 10 minutes</p>
                                    <a href="/timers/{{ $timer->id }}" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <a href="/timers/create" class="btn btn-primary">Create Timers</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
