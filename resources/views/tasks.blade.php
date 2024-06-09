<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MLP To-Do</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    </head>
    <body style="background: #f1f1f1;">
        <div class="container">
            <div style="margin-top: 20px; margin-bottom: 60px;"> 
                <img src="{{ asset('assets/logo.png') }}"/>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <form method="POST" action="{{url('create-task')}}">
                        @csrf
                    
                        <input id="name" name="name" type="text" class="form-control" placeholder="Insert task name">
                        <br />
                        <input type="submit" name="submit" value="Add" class="btn btn-primary" style="width: 100%;">
                    </form>
                </div>
                <div class="col-md-8">     
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="container-fluid" style="background: white; border:1px solid #cecece; border-radius: 5px;">
                        <table class="table" style="width: 100%;">
                            <tr>
                                <th>#</th>
                                <th>Task</th>
                                <th></th>
                            </tr>
                            @foreach ($tasks as $task)
                                @if($task->completed == 0)
                                    <tr>
                                        <td>{{ $task->id }}</td>
                                        <td>{{ $task->name }}</td>
                                        <td><a href="{{url('mark-task-as-complete')}}/{{$task->id}}" class="btn btn-success" onclick="return confirm('Are you sure you want to mark this task as complete?')">&#10004;</a><a href="{{url('delete-task')}}/{{$task->id}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">&#10006;</a>
                                    </tr>
                                @else
                                    <tr>
                                        <td>{{ $task->id }}</td>
                                        <td><s>{{ $task->name }}</s></td>
                                        <td></td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
                </div>
                <br />
                <div class="text-center" style="margin-top: 250px;">Copyright &copy; <?= date('Y'); ?> All Rights Reserved.</div>
            </div>
        </div>
    </body>
</html>
