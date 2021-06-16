@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p> <a href="{{ url()->previous() }}">Back</a> </p>
            We will add a category for <b>{{ $car->car_name }}</b>:
            <form method="POST" action="{{ action([App\Http\Controllers\CategoryController::class, 'store']) }}">
                @csrf
                <input type="hidden" name="car_id" value="{{ $car->id }}">
                    <label for="cat_name">Category Name: </label>
                    <input type="text" name="cat_name" id="cat_name">
                    <input type="submit" value="add">
            </form>
        </div>
    </div>
</div>
@endsection