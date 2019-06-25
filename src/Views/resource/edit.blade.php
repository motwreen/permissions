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

                        {{ Form::model($resource,['action'=>['\Motwreen\Permissions\Http\Controllers\ResourcesController@update',$resource],'method'=>'patch','class'=>'form-horizontal']) }}
                            @include('Permissions::resource._form')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
