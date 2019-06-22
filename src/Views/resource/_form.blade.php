@if(@$resource)
    <div class="form-group{{ $errors->has('resource') ? ' has-error' : '' }}">
        <label class="col-md-12 control-label"><code>{{$resource->resource}}</code></label>
    </div>
@else
    <div class="form-group{{ $errors->has('resource') ? ' has-error' : '' }}">
        <label class="col-md-3 control-label">Select Resource</label>
        <div class="col-md-12">
            {!! Form::select('resource',$controllers,null,['required','class'=>'form-control','placeholder' => "Select Resource ..",])!!}
            <small class="text-danger">{{ $errors->first('resource') }}</small>
        </div>

    </div>
@endif

<div class="form-group{{ $errors->has('alias') ? ' has-error' : '' }}">
    <label class="col-md-3 control-label">Alias</label>
    <div class="col-md-12">
        {!! Form::text('alias', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('alias') }}</small>
    </div>
</div>

<hr>


<div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
    <div class="col-md-8">
        <div class="switch">
            <input id="active" name="active" class="" type="checkbox" {{(@$resource && $resource->active == true)?'checked':''}}>
            <label for="active">Active</label>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-8">
        <button class='btn btn-success' type="submit">Save Resource</button>
    </div>
</div>
