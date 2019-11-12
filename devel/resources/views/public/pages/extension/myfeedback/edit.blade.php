@extends('public.layouts.default')
@section('content')
    <h2><center>Uprav svoj Feedback</h2>
    <div class="col-md-5">
        <div class="p-4 mb-3 bg-white">

    <form method="post" action="{{route('myfeedback.edit',$myfeed->id)}}">

        <h5>Popis:</h5><br>
        <textarea name="message" id="message" cols="30" rows="7" class="form-control" >{{$myfeed->comment}}</textarea>
        <br>
        <br><br>

        <h5>Rate:</h5><br>
        <select class="form-control" name="rate">
            <option value="Odporúčam">Odporúčam</option>
            <option value="Neodporúčam">Neodporúčam</option>
        </select>

        <br>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" value="Upraviť" class="btn btn-primary py-2 px-4 text-white">
    </form>
        </div>
    </div>

@endsection