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
                            <a href="{{action('\Motwreen\Permissions\Http\Controllers\PermissionsGroupController@create')}}" class="btn btn-success">Add New</a>
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
                            @foreach($groups as $group)
                                <tr>
                                    <td>{{$group->id}}</td>
                                    <td>{{$group->name}}</td>
                                    <td>
                                        {{Form::open(['action'=>['\Motwreen\Permissions\Http\Controllers\PermissionsGroupController@destroy',$group],'method'=>'delete'])}}
                                            <a href="{{action('\Motwreen\Permissions\Http\Controllers\PermissionsGroupController@edit',[$group])}}" class="btn btn-warning"> <i class="fa fa-edit"></i> Edit</a>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete ?')"> <i class="fa fa-times"></i> Delete</button>
                                        {{Form::close()}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$groups->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
