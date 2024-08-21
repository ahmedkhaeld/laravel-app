<?php

namespace App\Http\Controllers\Api\SchoolManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;
use App\Http\Resources\SchoolResource;
use App\Models\School;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        //
        $schools = School::all();
        return SchoolResource::collection(School::with('classRooms')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSchoolRequest $request): SchoolResource
    {
        $validatedData = $request->validated();
        $school = School::create($validatedData);
        $school->load('classRooms');

        return new SchoolResource($school);
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school): SchoolResource
    {
        return new SchoolResource($school);
    }


    public function update(UpdateSchoolRequest $request, School $school): SchoolResource
    {

        $school->update($request->validated());
        return new SchoolResource($school);
    }

    public function destroy(School $school): Application|Response|ResponseFactory
    {
        $school->delete();
        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
