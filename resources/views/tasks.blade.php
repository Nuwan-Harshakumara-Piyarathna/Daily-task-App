<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h1>Daily Tasks</h1>
            <div class="row">
                <div class="col-md-12">

                    @foreach($errors->all() as $yourerror)
                        <div class="alert alert-danger" role = "alert">
                            {{$yourerror}}
                        </div>
                    @endforeach
                    <form action="/saveTask" method="POST">
                        {{csrf_field()}}
                        <input type="text"class = "form-control" name = "task" placeholder = "Enter your task here">
                        <br>  
                        <input type = "submit" class = "btn btn-primary" value="save">
                        <input type = "button" class = "btn btn-warning" value="clear">
                    </form>
                    <br><br>
                    <table class="table table-dark">
                        <th>ID</th>
                        <th>Task</th>
                        <th>Completed</th>
                        <th>Action</th>


                        @foreach($tasksvariables as $temp)
                            <tr>
                                <td>{{$temp->id}}</td>
                                <td>{{$temp->task}}</td>
                                <td>
                                    @if($temp->iscompleted)
                                        <button class="btn btn-success">Completed</button>
                                    @else
                                        <button class="btn btn-danger">Not Completed</button>
                                    @endif
                                </td>
                                <td>
                                    @if(!$temp->iscompleted)
                                    <a href="/markascompleted/{{$temp->id}}" class="btn btn-primary">Mark  As   Completed</a>
                                    @else
                                    <a href="/markasnotcompleted/{{$temp->id}}" class="btn btn-warning">Mark As Not Completed</a>
                                    @endif
                                    <a href="/deletetask/{{$temp->id}}" class="btn btn-danger">Delete</a>
                                    <a href="/updatetask/{{$temp->id}}" class="btn btn-info">Update</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>