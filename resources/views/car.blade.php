@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Status messages') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            <p></p>
            <div class="card">
                <div class="card-header">{{ __('Your Cars') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if (count($car)==0)
                    <p color='red'> There are no records in the database!</p>
                    @else
                    <table style="width:100%">
                    @foreach ($car as $car)
                        <tr>
                        <td style="text-align:center; font-weight: bold;"> {{ $car->car_name }} </td>
                        <td style="text-align:center;"> <input type="button" value="show" onclick="showCategory({{ $car->id }})" style="padding-left: 55px; padding-right: 55px"> </td>
                        <td style="text-align:center;"> <form method="POST" action="{{action([App\Http\Controllers\CarController::class, 'destroy'], $car->id) }}">@csrf @method('DELETE')<input type="submit" value="delete" style="padding-left: 55px; padding-right: 55px"></form></td>
                        </td>
                    @endforeach
                    </table>
                    @endif
                    <p> <input type="button" value="New Car" onclick="newCar()" style="padding-left: 25px; padding-right: 25px"> </p>
                    <script>
                    function showCategory(carID) {
                    window.location.href="/category/car/"+carID;
                    }
                    </script>
                    <script>
                    function newCar() {
                        window.location.href="/car/create";
                    }
                    </script>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

<!-- = DB::select('SELECT user_id FROM car WHERE user_id = "'.Auth::user()->id.'"') --> 