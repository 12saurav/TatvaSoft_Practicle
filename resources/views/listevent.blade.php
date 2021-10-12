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
           <div class="card-header">List Of Events<a href="{{route('create.event')}}"  class="float-right">Add Event</a></div>
            <div class="card">
                <div class="form-control">
                    <table class="table responsive">
                     <thead>
                         <th>SI</th>
                         <th>Title</th>
                         <th>Date</th>
                         <th>Occurance</th>
                         <th>Action</th>
                     </thead>
                     <tbody>
                         @foreach ($data as $key => $value)
                         <tr>
                             <td>{{$key + 1}}</td>
                             <td>{{$value->title}}</td>
                             <td>{{date('d-m-y',strtotime($value->start_date))}}  to  {{date('d-m-y',strtotime($value->end_date))}}</td>
                             <td>
                                 @if($value->frequency==1) Every @endif
                                 @if($value->frequency==2) Every Other @endif 
                                 @if($value->frequency==3) Every Third @endif 
                                 @if($value->frequency==4) Every Fourth @endif 
                                 @if($value->interval==1) Day @endif
                                 @if($value->interval==7) Week @endif
                                 @if($value->interval==30) Month @endif
                                 @if($value->interval==365) Year @endif

                             </td>
                             <td><a href="{{route('show.event',$value->id)}}">View</a>&nbsp; &nbsp;<a href="{{route('edit.event',$value->id)}}">Edit</a> &nbsp; <a href="{{route('delete.event',$value->id)}}">Delete</a></td>
                         </tr>
                         @endforeach
                     </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</body>

</html>