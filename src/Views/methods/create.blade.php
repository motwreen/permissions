@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$resource->alias}}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <label for="">Resource :
                            <code>{{$resource->resource}}</code>
                        </label>
                        {{ Form::open(['route'=>['permissions.resources.methods.store',$resource],'class'=>'form-horizontal']) }}
                            @include('Permissions::methods._form')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
