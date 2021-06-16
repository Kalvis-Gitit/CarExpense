@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p> <a href="{{ url()->previous() }}">Back</a> </p>
            @if (count($costs)==0)
            <p color='red'> There are no costs in this category!</p>
            @else
            <table  style="width:100%">
            <tr>
            <td style="text-align:center; font-weight: bold;"> Cost Description </td>
            <td style="text-align:center; font-weight: bold;"> Amount </td>
            <td style="text-align:center; font-weight: bold;"> Date </td>
            <td> </td>
            <td  style="text-align:center; font-size: 1.8em;"> Total of this category </td>
            </tr>
            @foreach ($costs as $costs)
            <tr>
            <td style="text-align:center;"> {{ $costs->description }} </td>
            <td style="text-align:center; font-weight: bold;"> {{ $costs->s_amount }} </td>
            <td style="text-align:center;"> {{ $costs->date }} </td>
            <td style="text-align:center;"> <form method="POST" action="{{ action([App\Http\Controllers\CostsController::class, 'destroy'], $costs->id) }}">@csrf @method('DELETE')<input type="submit" value="Delete" style="padding-left: 25px; padding-right: 25px"></form> </td>
            </td>
            @endforeach
            <td style="text-align:center;  font-size: 2em;"> {{ DB::table('costs')->where('cat_id','=',$cat_id)->sum('s_amount') }} </td>
            </table>
            @endif
            <p> <input type="button" value="Add Cost" onclick="newCosts ( {{ $cat_id }} )" style="padding-left: 35px; padding-right: 35px"> </p>
            <script>
            function newCosts(catID) {
            window.location.href="/costs/category/"+catID+"/create";
            }
            </script>
        </div>
    </div>
</div>
@endsection
