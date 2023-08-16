@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">You're logged in!</div>

                <div class="card-body d-flex">
                <div class="card-body col-3">
                        <div class="card-header">Add new Country</div>
                        <form method="post" action="{{ route('dashboard.create') }}">
                            <div class="form-group mt-3">
                                @csrf
                                <label for="country_name">Name:</label>
                                <input type="text" class="form-control" name="name" maxlength="20" required/>
                            </div>
                            <div class="form-group mt-3">
                                <label for="ISO">ISP :</label>
                                <input type="text" class="form-control" name="ISO" maxlength="20"  required/>
                            </div>
                            <button type="submit" class="btn btn-dark mt-3">Save</button>
                        </form>
                    </div>

                    <div class="card-body col-9">
                    <div class="card-header">List of Countries</div>
                    <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">ISO</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($countries as $country)
                                <tr>
                                    <th scope="row">{{$country->id}}</th>
                                    <td>{{$country->name}}</td>
                                    <td>{{$country->ISO}}</td>
                                    <td>
                                        <a href="{{ route('dashboard.edit', $country->id)}}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" data-item-id="{{$country->id }}">Delete </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this country?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('dashboard.delete',$country->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cansel</button>
            <button type="submit" class="btn btn-primary">Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection