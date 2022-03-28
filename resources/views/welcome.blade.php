<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">  
        <link href="/main.css" rel="stylesheet">  
        
         
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">

        <h1>Plant Watering System</h1>
    
        <div class="container">
            @if(Session::has('filledMsg'))
                <p class="alert alert-success">Plant watered</p>   
                @elseif(Session::has('notfilledMsg'))
                <p class="alert alert-warning">Plant watered stop</p>

                @elseif(Session::has('errMsg'))
                <p class="alert alert-warning">Plant already watered, Please try after 30 seconds</p>

            @endif

            <p id="timer"></p>
        </div>


        <div class="plantsData">

            <div class="plantsDataSub">
                <div class="dangerPlants">

                    @if($dangerPlantsCount>0)
                        <p class="alert alert-danger">Following plants are not watered for more than 6 hours</p> 
                    @endif

                    @for($i=0;$i< $dangerPlantsCount;$i++)
                        <p>{{$dangerPlants[$i]}}</p>
                    @endfor

                  

                   
                </div>
                
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Last-watered</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $plant)
                        <tr>
                            <td>{{$plant->name}}</td>
                            <td>{{$plant->status}}</td>
                            <td>{{$plant->lastWatered}}</td>

                            <td><a href="/water-plant/{{$plant->id}}" onclick="test()" role="button" class="btn btn-primary">Start Water</a></td>

                            <td><a href="/stopwater-plant/{{$plant->id}}" onclick="stopTimer()" role="button"  id="stopBtn-{{$plant->id}}"class="btn btn-warning" >Stop water</a></td>
                    

                             
                        </tr>
                    @endforeach
                
                    </tbody>
                </table>


       
            </div>
        </div>
        <script src="/main.js"></script>
    </body>
</html>
