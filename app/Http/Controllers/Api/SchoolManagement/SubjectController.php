<?php

namespace App\Http\Controllers\Api\SchoolManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Http\Resources\SubjectResource;
use App\Models\Subject;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class SubjectController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $subjects = Subject::all();
        return SubjectResource::collection($subjects);
    }

    public function store(StoreSubjectRequest $request): SubjectResource
    {
        $validatedData = $request->validated();
        $subject = Subject::create($validatedData);
        return new SubjectResource($subject);
    }

    public function show(Subject $subject): SubjectResource
    {
        return new SubjectResource($subject);
    }

    public function update(UpdateSubjectRequest $request, Subject $subject): SubjectResource
    {
        $validatedData = $request->validated();
        $subject->update($validatedData);
        return new SubjectResource($subject);
    }

    public function destroy(Subject $subject): Application|Response|ResponseFactory
    {
        $subject->delete();
        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
