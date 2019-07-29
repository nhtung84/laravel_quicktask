@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @lang('task.New Task')
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('errors.status')

                    @include('common.errors')

                    <!-- New Task Form -->
                    {!! Form::open(['method' => 'POST', 'route' => 'tasks.store', 'class' => 'form-horizontal']) !!}

                        <!-- Task Name -->
                        <div class="form-group">
                            {{ Form::label('task-name', trans('task.Task'), ['class' => 'col-sm-3 control-label']) }}
                            <div class="col-sm-6">
                                {{ Form::text('name', '', ['id' => 'task-name', 'class' => 'form-control']) }}
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                {{ Form::button('<i class="fa fa-btn fa-plus"></i>'.trans('Add Task'), ['type' => 'submit', 'class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @lang('task.Current Tasks')
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>@lang('task.Task')</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text"><div>{{ $task->name }}</div></td>
                                        <!-- Task Delete Button -->
                                        <td>
                                        {!! Form::open(['method' => 'delete', 'route' => ['tasks.destroy', $task->id]]) !!}
                                            {{ Form::button('<i class="fa fa-btn fa-trash"></i>'.trans('task.Delete'), ['type' => 'submit', 'id' => 'delete-task-'. $task->id,'class' => 'btn btn-danger']) }}
                                        {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
