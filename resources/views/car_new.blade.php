@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p> <a href="{{ url()->previous() }}">Back</a> </p>
            We will add a car :
            <<form method="POST" action="{{ action([App\Http\Controllers\CarController::class, 'store']) }}">
                @csrf
                <input type="hidden" name="user_id" value="{{ $car->user_id }}">
                    <label for="car_name">Car Name: </label>
                    <input type="text" name="car_name" id="car_name">
                    <input type="submit" value="add">
            </form>
        </div>
    </div>
</div>
@endsection