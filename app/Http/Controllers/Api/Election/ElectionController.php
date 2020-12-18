<?php

namespace App\Http\Controllers\Api\Election;

use App\Http\Controllers\AppBaseController;
use App\Http\Repositories\ElectionRepository;
use App\Http\Requests\ElectionRequest;
use App\Http\Resources\Election\ElectionCollection;
use App\Http\Resources\Election\ElectionResource;
use App\Models\Election;
use Illuminate\Http\Request;

class ElectionController extends AppBaseController
{

    /** @var  ElectionRepository */
    private $electionRepository;

    public function __construct(ElectionRepository $electionRepo)
    {
        $this->electionRepository = $electionRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elections = $this->electionRepository->all();
        return $this->showAll(new ElectionCollection($elections));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ElectionRequest $request)
    {
        $campos = $request->validated();
        $election = $this->electionRepository->create($campos);

        return $this->showOne(new ElectionResource($election), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Election $election)
    {
        return $this->showOne(new ElectionResource($election), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ElectionRequest $request, Election $election)
    {
        $campos = $request->validated();

        $election = $this->electionRepository->update($campos, $election);

        return $this->showOne(new ElectionResource($election), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Election $election)
    {
        $election->delete();
        return $this->showOne(new ElectionResource($election), 200);
    }
}
