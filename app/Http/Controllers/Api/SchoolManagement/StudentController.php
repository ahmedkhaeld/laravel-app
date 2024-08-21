<?php

namespace App\Http\Controllers\Api\SchoolManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class StudentController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $students = Student::all();
        return StudentResource::collection($students);
    }

    public function store(StoreStudentRequest $request): StudentResource
    {
        $validatedData = $request->validated();
        $student = Student::create($validatedData);
        return new StudentResource($student);
    }

    public function show(Student $student): StudentResource
    {
        return new StudentResource($student);
    }

    public function update(UpdateStudentRequest $request, Student $student): StudentResource
    {
        $validatedData = $request->validated();
        $student->update($validatedData);
        return new StudentResource($student);
    }

    public function destroy(Student $student): Application|Response|ResponseFactory
    {
        $student->delete();
        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
