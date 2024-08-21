<?php

namespace App\Http\Controllers\Api\SchoolManagement ;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassRoomRequest;
use App\Http\Requests\UpdateClassRoomRequest;
use App\Http\Resources\ClassRoomResource;
use App\Models\ClassRoom;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ClassRoomController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $classRooms = ClassRoom::all();
        return ClassRoomResource::collection($classRooms);
    }

    public function store(StoreClassRoomRequest $request): ClassRoomResource
    {
        $validatedData = $request->validated();
        $classRoom = ClassRoom::create($validatedData);
        return new ClassRoomResource($classRoom);
    }

    public function show(ClassRoom $classRoom): ClassRoomResource
    {
        return new ClassRoomResource($classRoom);
    }

    public function update(UpdateClassRoomRequest $request, ClassRoom $classRoom): ClassRoomResource
    {
        $validatedData = $request->validated();
        $classRoom->update($validatedData);
        return new ClassRoomResource($classRoom);
    }

    public function destroy(ClassRoom $classRoom): \Illuminate\Foundation\Application|Response|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $classRoom->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
