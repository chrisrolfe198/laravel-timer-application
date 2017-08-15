@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Group</div>

                <div class="card-body">
                    <form method="POST" action="/groups/{{ (isset($group) ? $group->id : "") }}">
                        @if (isset($group)) {{ method_field('PUT') }} @endif
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Group Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter group name" value="{{ (isset($group) ? $group->name: "") }}">
                            <small id="emailHelp" class="form-text text-muted">Groups are just how we organise timers</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
