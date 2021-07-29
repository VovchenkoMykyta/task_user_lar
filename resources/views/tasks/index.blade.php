@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($tasks) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Текущая задача
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">

                        <!-- Заголовок таблицы -->
                        <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                        </thead>

                        <!-- Тело таблицы -->
                        <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Имя задачи -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>

                                <td>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Удалить
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <form action="{{route('tasks.create') }}" method="GET" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Добавить задачу
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection
