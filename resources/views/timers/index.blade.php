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
                    <div class="row mb-4">
                        @foreach ($timers as $timer)
                            <div class="col-sm-12 col-md-4 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $timer->name }}</h4>
                                        @if ($timer->running == null)
                                            <p class="card-text">This timer currently has been running for {{ Carbon\Carbon::now()->diffInMinutes($timer->created_at) }} minutes</p>
                                            <a href="/timers/{{ $timer->id }}/stop" class="btn btn-danger">Stop</a>
                                        @else
                                            <p class="card-text">This timer ran for {{ $timer->created_at->diffInMinutes($timer->running) }} minutes</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <p class="text-center"><a href="/timers/create" class="btn btn-primary">Create a Timer</a></p>

                    {{ $timers->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
