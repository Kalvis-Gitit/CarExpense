@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p> <a href="{{ url()->previous() }}">Back</a> </p>
            @if (count($category)==0)
            <p color='red'> There are no categories in the database!</p>
            @else
            <table  style="width:100%;">
            <tr>
            <td style="text-align:center; font-weight: bold; padding: 7px;"> Category Name </td>
            <td style="padding: 7px;"> </td>
            <td style="padding: 7px;"> </td>
            <td style="text-align:center; font-weight: bold; padding: 7px;"> Total of this category </td>
            <td style="text-align:center; font-size: 2em; padding: 7px;"> Total of this car </td>
            </tr>
            @foreach ($category as $category)
            <tr>
            <td style="text-align:center; padding: 7px;"> {{ $category->cat_name }} </td>
            <td style="text-align:center; padding: 7px;"> <input type="button" value="show" onclick="showCosts({{ $category->id }})" style="padding-left: 25px; padding-right: 25px"> </td>
            <td style="text-align:center; padding: 7px;"> <form method="POST" action="{{ action([App\Http\Controllers\CategoryController::class, 'destroy'], $category->id) }}">@csrf @method('DELETE')<input type="submit" value="Delete" style="padding-left: 25px; padding-right: 25px"></form> </td>
            <td style="text-align:center; font-weight: bold; padding: 7px;"> {{ DB::table('costs')->where('cat_id','=',$category->id)->sum('s_amount') }} </td>
            </td>
            @endforeach
            <td style="text-align:center;  font-size: 2em;"> {{ DB::table('costs')->where('car_id','=',$car_id)->sum('s_amount') }} </td>
            </table>
            @endif
            <p> <input type="button" value="Add Category" onclick="newCategory( {{ $car_id }} )" style="padding-left: 25px; padding-right: 25px"> </p>
            <script>
            function showCosts(catID) {
            window.location.href="/costs/category/"+catID;
            }
            </script>
            <script>
            function newCategory(carID) {
            window.location.href="/category/car/"+carID+"/create";
            }
            </script>
        </div>
    </div>
</div>
@endsection
