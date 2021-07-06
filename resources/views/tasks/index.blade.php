@extends('layouts.app')
@section('title', 'task list')

@section('content')
<div class="card">

   <div class="card-header">
       Task List
   </div>

   <div class="card-body">
       {{-- add --}}
        <div class="card">
            <div class="card-header">
                New Task
            </div>
            <div class="card-body">
                <form action="{{ route('task.store') }}" method="POST">
                    @csrf
                    <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Task&nbsp;<span style="color: red">*</span></label>
            
                        <div class="col-sm-6">
                            <input type="text" name="name" placeholder="Enter task" class="form-control">
                            <span class="error-message">{{ $errors->first('name') }}</span>
                        </div>
                    </div>
                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Add Task
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- list --}}
        <div style="margin-top: 5%;" class="card">
            <div class="card-header">
                Current Tasks
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th><p style="font-weight: bold">Task</p></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($tasks))
                        @foreach ($tasks as $key => $task)
                            <tr>
                                <td>{{$task->name}}</td>
                                <td>
                                    <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">DELETE</button>
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