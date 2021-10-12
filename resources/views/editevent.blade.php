<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<body>
    <div class="nav-bar"></div>
    <div class="container">
        <div class="container-fluid">
           <div class="card-header text-primary">Update Event</div>
           <div class="row">
               @if($errors->any())
               @foreach($errors->all() as $error)
               <span class="text-danger">{{$error}}</span>
               @endforeach
               @endif
           </div>
            <div class="card">
                <div class="form-control">
                    <form action="{{route('update.event',$data->id)}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Event Title</label>
                                <input class="form-control"  type="text" name="title" id="title" value="{{$data->title}}">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Start Date</label>
                                <input class="form-control" type="date" name="start_date" id="start_date" value="{{$data->start_date}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">End Date</label>
                                <input class="form-control" type="date" name="end_date" id="end_date" value="{{$data->end_date}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Recurrence</label>
                                <div class="row"><div class="col-md-4">
                                    <select class="form-control" name="frequency" value="{{$data->frequency}}" id="frequency">
                                        <option value="1">Every</option>
                                        <option value="2">Every Other</option>
                                        <option value="3">Every Third</option>
                                        <option value="4">Every Fourth</option>
                                    </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="interval" value="{{$data->interval}}" id="interval">
                                            <option value="1">Day</option>
                                            <option value="7">Week</option>
                                            <option value="30">Month</option>
                                            <option value="365">Year</option>
                                        </select>
                                        <br>
                                        
                                    </div>

                                </div>
                                <div class="row"><div class="col-md-12">
                                    <input type="submit" name="submit" class="form-control btn btn-primary"><br><br>
                                    <button type="button" class="form-control btn btn-danger" onclick="window.history.back()">Cancel</button>
                                </div>
                                </div>
                                
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>