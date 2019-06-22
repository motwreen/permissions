<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label class="control-label">Group Name</label>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('name') }}</small>
        </div>
    </div>
</div>


@foreach($permissions as $resource => $permission)
    <div class="row">
        <div class="col-md-12">
            <label class="control-label"> <strong>{{$resource}}</strong></label>
        </div>
        @foreach($permission as $role)
            <div class="col-md-3">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="control-label">
                        {!! Form::checkbox('permissions[]', $role->id,null) !!}
                        {{$role->alias}}
                    </label>
                </div>
            </div>
        @endforeach
    </div>
@endforeach
<small class="text-danger">{{ $errors->first('permission') }}</small>

<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-success">Save Group</button>
    </div>
</div>
