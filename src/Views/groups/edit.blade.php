@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Group</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        {{Form::model($group,['action'=>['\Motwreen\Permissions\Http\Controllers\PermissionsGroupController@update',$group],'method'=>'patch'])}}
                            @include('Permissions::groups._form')
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
