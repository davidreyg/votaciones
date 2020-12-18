<?php

namespace App\Http\Controllers\Api\Election;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ElectionGroupRequest;
use App\Models\Election;
use App\Models\ElectionGroup;
use App\Models\Setting;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ElectionGroupController extends AppBaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ElectionGroupRequest $request)
    {
        $electionSetting = Setting::getSetting('default_election');
        $election = Election::find($electionSetting);
        $user_id = Auth::id();
        if (!$election) {
            return $this->errorResponse('No existe una eleccion definida. Por favor, comunicar al ADMINISTRADOR', 422);
        }
        $campos = ['user_id' => $user_id, 'election_id' => $election->id];

        $messages = [
            'user_id.unique' => 'Este usuario ya realizo su voto',
        ];
        $validator = Validator::make($campos, ['user_id' => 'required|unique:election_groups,user_id', 'election_id' => 'required|exists:elections,id|in:' . $election->id], $messages);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 422);
        }
        $electionGroup = new ElectionGroup();
        $electionGroup->user_id = $user_id;
        $electionGroup->group_id = $request->group_id;
        $electionGroup->election_id = $election->id;
        $electionGroup->save();
        return $electionGroup->with('group', 'user', 'election')->get();
    }
}
