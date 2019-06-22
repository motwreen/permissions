<?php
namespace Motwreen\Permissions\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Motwreen\Permissions\Models\AdminGroup;
use Motwreen\Permissions\Models\ResourcePermission;

class PermissionsGroupController extends Controller
{
    public function index()
    {
        $groups = AdminGroup::paginate();
        return View('Permissions::groups.index',compact('groups'));
    }

    public function create()
    {
        $permissions = ResourcePermission::with('resource')->get()->groupBy('resource.alias');
        return View('Permissions::groups.create',compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
           'name'=>'required',
           'permissions'=>'required',
        ]);
        $group = new AdminGroup;
        $group->name = $request->get('name');
        $group->save();
        $group->permissions()->sync($request->get('permissions'));
        return redirect(route('permissions.groups.index'));
    }

    public function edit(AdminGroup $group)
    {
        $permissions = ResourcePermission::with('resource')->get()->groupBy('resource.alias');
        return View('Permissions::groups.edit',compact('group','permissions'));
    }

    public function update(AdminGroup $group,Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'permissions'=>'required',
        ]);

        $group->name = $request->get('name');
        $group->save();
        $group->permissions()->sync($request->get('permissions'));

        return redirect(route('permissions.groups.index'));
    }

    public function destroy(AdminGroup $group)
    {
        $group->delete();
        return redirect(route('permissions.groups.index'));
    }

}
