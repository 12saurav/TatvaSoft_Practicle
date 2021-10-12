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
            <div class="card-header text-primary">Event Occurence:<a href="{{route('create.event')}}"
                    class="float-right">Add Event</a></div>
            <div class="card">
                <div class="form-control">
                    
                    <table class="table responsive">
                        <thead> <span>Event Title: {{$data->title}} </span>
                        </thead>
                        <tbody>
                           @foreach($dates as $value)
                           
                            <tr>
                                <td>{{$value[0]}}</td>
                                <td>{{$value[1]}}</td>
                                
                               
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row"><div class="col-md-12">
                        <span>Total Recurence Event: {{$occurance}} </span>
                    </div></div>
                    <div class="row"><div class="col-md-12">
                       <button type="button" class="btn btn-primary" onclick="window.history.back();">Back</button>
                    </div></div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>