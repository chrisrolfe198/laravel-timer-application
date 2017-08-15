@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Timer</div>

                <div class="card-body">
                    <form method="POST" action="/timers/{{ (isset($timer) ? $timer->id : "") }}">
                        @if (isset($timer)) {{ method_field('PUT') }} @endif
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Timer Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter group name" value="{{ (isset($timer) ? $timer->name: "") }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Choose the timer for this group to belong to</label>
                            <select class="form-control" name="group_id">
                                @foreach ($groups as $group)
                                    <option
                                        value="{{ $group->id }}"
                                        {{ (isset($timer) and $timer->group->id == $group->id ? "checked" : "") }}>
                                        {{ $group->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
