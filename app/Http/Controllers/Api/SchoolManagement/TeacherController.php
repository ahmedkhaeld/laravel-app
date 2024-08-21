<?php

namespace App\Http\Controllers\Api\SchoolManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Http\Resources\TeacherResource;
use App\Models\Teacher;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class TeacherController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $teachers = Teacher::all();
        return TeacherResource::collection($teachers);
    }

    public function store(StoreTeacherRequest $request): TeacherResource
    {
        $validatedData = $request->validated();
        $teacher = Teacher::create($validatedData);
        return new TeacherResource($teacher);
    }

    public function show(Teacher $teacher): TeacherResource
    {
        return new TeacherResource($teacher);
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher): TeacherResource
    {
        $validatedData = $request->validated();
        $teacher->update($validatedData);
        return new TeacherResource($teacher);
    }

    public function destroy(Teacher $teacher): \Illuminate\Foundation\Application|Response|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $teacher->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
