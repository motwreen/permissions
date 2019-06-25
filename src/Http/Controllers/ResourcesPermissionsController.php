<?php

namespace Motwreen\Permissions\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Motwreen\Permissions\Models\Resource;
use Motwreen\Permissions\Models\ResourcePermission;
use Motwreen\Permissions\Services\ScanService;
use Yajra\DataTables\Facades\DataTables;

class ResourcesPermissionsController extends Controller
{

    public function index(Resource $resource)
    {
        $methods = $resource->permissions;
        return View('Permissions::methods.index',compact('resource','methods'));
    }

    public function create(Resource $resource)
    {
        $scanService = new ScanService;
        $methods = $scanService->getMethodsOfResource($resource->resource);
        return View('Permissions::methods.create',compact('resource','methods'));
    }

    public function store(Resource $resource,Request $request)
    {
        $scanService = new ScanService;
        $method = $scanService->getMethodsOfResource($resource->resource)[$request->get('method')];

        $this->validate($request,[
            'alias'=>'required',
            'method'=>'required',
        ]);

        if(ResourcePermission::where('resource_id',$resource->id)->where('method',$method)->exists()){
            return back()->withInput($request->all())->withErrors(['method'=>'method already defined, please choose another one']);
        }

        $permission = new ResourcePermission;
        $permission->resource_id= $resource->id;
        $permission->action     = $resource->resource.'@'.$method;
        $permission->alias      = $request->get('alias');
        $permission->method     = $method;
        $permission->active     = $request->filled('active');
        $permission->save();
        return redirect(action('Motwreen\Permissions\Http\Controllers\ResourcesPermissionsController@index',$resource));
    }

    public function edit(Resource $resource,ResourcePermission $method)
    {
        $scanService = new ScanService;
        $methods = $scanService->getMethodsOfResource($resource->resource);
        return View('Permissions::methods.edit',compact('methods','method','resource'));
    }

    public function show($id)
    {
    }

    public function update(Resource $resource,ResourcePermission $method,Request $request)
    {
        $this->validate($request,[
            'alias'=>'required',
        ]);
        $method->alias = $request->get('alias');
        $method->save();
        return redirect(action('Motwreen\Permissions\Http\Controllers\ResourcesPermissionsController@index',$resource));
    }

    public function destroy(Resource $resource,ResourcePermission $method)
    {
        $method->delete();
        return redirect(action('Motwreen\Permissions\Http\Controllers\ResourcesPermissionsController@index',$resource));
    }

}
