@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{$resource->alias}}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="row">

                            <div class="col-md-8">

                                <label for="">Resource :
                                    <code>{{$resource->resource}}</code>
                                </label>

                            </div>
                            <div class="col-md-4 text-right">

                                <a href="{{route('permissions.resources.methods.create',$resource)}}" class="btn btn-success">Add New</a>
                            </div>
                        </div>
                        <br>
                        <br>
                        <table class="table table-bordered">
                            <thead>
                            <th>#</th>
                            <th>Method</th>
                            <th>action</th>
                            <th>Alias</th>
                            <th>Options</th>
                            </thead>
                            <tbody>
                            @foreach($methods as $method)
                                <tr>
                                    <td>{{$method->id}}</td>
                                    <td>{{$method->method}}</td>
                                    <td>{{$method->short_action}}</td>
                                    <td>{{$method->alias}}</td>
                                    <td>
                                        {{Form::open(['route'=>['permissions.resources.methods.destroy',$resource,$method],'method'=>'delete'])}}
                                        @if(!$resource->default)
                                            <a href="{{route('permissions.resources.methods.edit',[$resource,$method])}}" class="btn btn-warning"> <i class="fa fa-edit"></i> Edit</a>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete ?')"> <i class="fa fa-times"></i> Delete</button>
                                        @endif
                                        {{Form::close()}}
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

@endsection
