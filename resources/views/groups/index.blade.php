@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Timers</a>
                        </li>
                        <li class="nav-item">
                            <a href="/groups" class="nav-link active">Groups</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        @foreach ($groups as $group)
                            <div class="col-sm-12 col-md-4 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $group->name }}</h4>
                                        <a href="/groups/{{ $group->id }}/edit" class="btn btn-primary">Edit Group</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <p class="text-center"><a href="/groups/create" class="btn btn-primary">Create a Group</a></p>

                    {{ $groups->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
