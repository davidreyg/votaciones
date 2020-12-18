<?php

namespace App\Http\Controllers\Api\Group;

use Auth;
use App\Models\Group;
use App\Models\Setting;
use App\Models\Election;
use Illuminate\Http\Request;
use App\Models\EmployeeGroup;
use Illuminate\Support\Facades\DB;
use App\Http\Repositories\GroupRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\EmployeeGroupRequest;
use App\Http\Resources\Group\GroupResource;
use App\Http\Resources\Group\GroupCollection;
use Gate;

class GroupController extends AppBaseController
{

    /** @var  GroupRepository */
    private $groupRepository;

    public function __construct(GroupRepository $groupRepo)
    {
        $this->groupRepository = $groupRepo;
        // TODO: Importante: esta es la policy que nos ayuda a determinar las acciones que puede hacer un usario.
        $this->authorizeResource(Group::class, 'group');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = $this->groupRepository->all();
        return $this->showAll(new GroupCollection($groups));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeGroupRequest $request)
    {
        $campos = $request->validated();
        try {
            DB::beginTransaction();

            //CREAMOS LA CABECERA QUE SERIA LA VENTA!
            $group = Group::create($campos);
            $group_details = $campos['employee_group'];
            EmployeeGroup::createEmployeGroupDetail($group, $group_details);
            DB::commit();
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
        }
        return Group::with('employee_group')->whereId($group->id)->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return $this->showOne(new GroupResource($group), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return $this->showOne(new GroupResource($group), 200);
    }
}
