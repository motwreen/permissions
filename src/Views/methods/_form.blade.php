@if(@$method)
<div class="row">
    <div class="form-group{{ $errors->has('method') ? ' has-error' : '' }}">
        <label class="col-md-12 control-label">
            Method :
            <code>
                {{$method->method}}
            </code>
        </label>
    </div>
</div>
<div class="row">
    <div class="form-group{{ $errors->has('method') ? ' has-error' : '' }}">
        <label class="col-md-12 control-label">
            Action :
            <code>
                {{$method->short_action}}
            </code>
        </label>
    </div>
</div>
@else
    <div class="form-group{{ $errors->has('method') ? ' has-error' : '' }}">
        <label class="col-md-3 control-label">Select Method</label>
        <div class="col-md-12">
            {!! Form::select('method',$methods,null,['required','class'=>'form-control','placeholder' => "Select Method ..."])!!}
            <small class="text-danger">{{ $errors->first('method') }}</small>
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


<div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
    <div class="col-md-8">
        <div class="switch">
            <input id="active" name="active" class="" type="checkbox" {{(@$resource->exists() && $resource->active == true)?'checked':''}}>
            <label for="active">Active</label>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-8">
        <button class='btn btn-success' type="submit">Save Method</button>
    </div>
</div>

