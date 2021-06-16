@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p> <a href="{{ url()->previous() }}">Back</a> </p>
            We will add a cost for <b>{{ $category->cat_name }}</b>:
            <form method="POST" action="{{ action([App\Http\Controllers\CostsController::class, 'store']) }}">
                @csrf
                <input type="hidden" name="cat_id" value="{{ $category->id }}">
                <input type="hidden" name="car_id" value="{{ $category->car_id }}">
                <div>
                    <label for="description">Cost description: </label>
                    <input type="text" name="description" id="description">
                </div>
                <div>
                    <label for="s_amount">Cost amount: </label>
                    <input type="number" name="s_amount" id="s_amount">
                </div>
                <div>
                    <label for="date">Date: </label>
                    <input type="date" name="date" id="date">
                </div>
                <div>
                    <input type="submit" value="add">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
