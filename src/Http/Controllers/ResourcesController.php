<?php

namespace Motwreen\Permissions\Http\Controllers;

use App\Http\Controllers\Controller;
use Motwreen\Permissions\Models\Resource;
use Motwreen\Permissions\Services\ScanService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ResourcesController extends Controller
{

    public function index()
    {
        $resources =  Resource::paginate();
        return View('Permissions::resource.index',compact('resources'));
    }

    public function create()
    {
        $scanService = new ScanService();
        $controllers = $scanService->getResourcesList();

        return View('Permissions::resource.create',compact('controllers'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'resource'=>'required',
            'alias'=>'required',
        ]);

        $scanService = new ScanService();
        $controllers = $scanService->getResourcesList();

        $controller = $controllers[$request->get('resource')];

        $resource = new Resource;
        $resource->resource = $controller;
        $resource->alias = $request->get('alias');
        $resource->active = $request->has('active');
        $resource->save();
        return redirect(route('permissions.resources.index'));
    }

    public function edit(Resource $resource,Request $request)
    {
        return View('Permissions::resource.edit',compact('resource'));
    }

    public function show($id)
    {
    }

    public function update(Resource $resource,Request $request)
    {
        $resource->alias = $request->get('alias');
        $resource->active = $request->has('active');
        $resource->save();
        return redirect(route('permissions.resources.index'));
    }

    public function destroy(Resource $resource)
    {
        $resource->delete();
        return redirect(route('permissions.resources.index'));
    }


}
