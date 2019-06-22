@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="col-md-12 text-right">
                            <a href="{{route('permissions.resources.create')}}" class="btn btn-success">Add New</a>
                            <br>
                            <br>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>action</th>
                            </thead>
                            <tbody>
                            @foreach($resources as $resource)
                                <tr>
                                    <td>{{$resource->id}}</td>
                                    <td>{{$resource->alias}}</td>
                                    <td>
                                        {{Form::open(['route'=>['permissions.resources.destroy',$resource],'method'=>'delete'])}}
                                        <a href="{{route('permissions.resources.methods.index',[$resource])}}" class="btn btn-success"> <i class="fa fa-eye"></i> Show</a>
                                        @if(!$resource->default)
                                            <a href="{{route('permissions.resources.edit',[$resource])}}" class="btn btn-warning"> <i class="fa fa-edit"></i> Edit</a>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete ?')"> <i class="fa fa-times"></i> Delete</button>
                                        @endif
                                        {{Form::close()}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$resources->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
