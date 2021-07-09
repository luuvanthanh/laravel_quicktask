@extends('layouts.app')
@section('title', 'task list')

@section('content')
    <div class="card">

        <div class="card-header">
            @lang('message.tasklist')
        </div>

        <div class="card-body">
            {{-- add --}}
            <div class="card">
                <div class="card-header">
                    @lang('message.newtask')
                </div>
                <div class="card-body">
                    <form action="{{ route('Task.store') }}" method="POST">
                        @csrf
                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">@lang('message.task')&nbsp;<span
                                    class="task">*</span></label>

                            <div class="col-sm-6">
                                <input type="text" name="name" class="form-control">
                                <span class="error-message">{{ $errors->first('name') }}</span>
                            </div>
                        </div>
                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> @lang('message.addtask')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- list --}}
            <div class="card">
                <div class="card-header">
                    @lang('message.currenttask')
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <p class="task-b">Task</p>
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($tasks))
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td>{{ $task->name }}</td>
                                        <td>
                                            <form action="{{ route('Task.destroy', $task->id) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">
                                                    @lang('message.delete')</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
