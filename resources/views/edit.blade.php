@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit {{$country->name}}</div>

                <div class="card-body">
                <form method="POST" action="{{ route('dashboard.update', $country->id) }}">
                            <div class="form-group mt-3">
                                @csrf
                                @method('PUT')
                                <label for="country_name">Name:</label>
                                <input type="text" class="form-control" name="name" value="{{$country->name}}" maxlength="20" required />
                            </div>
                            <div class="form-group  mt-3">
                                <label for="ISO">ISP :</label>
                                <input type="text" class="form-control" name="ISO" value="{{$country->ISO}}" maxlength="20" required />
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Save</button>
                        </form>
            </div>
        </div>
    </div>
</div>
@endsection

