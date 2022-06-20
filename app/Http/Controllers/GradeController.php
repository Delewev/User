<?php

namespace App\Http\Controllers;

use App\Http\Requests\GradeStoreRequest;
use App\Http\Resources\GradeResource;
use App\Models\Grade;

class GradeController extends Controller
{
    public function create(GradeStoreRequest $request)
    {
//        $grade = Grade::create($request->validated());
//        return response()->json($grade);
        $grade = new Grade;
        $grade->grades = $request->grades;
        $grade->user_id = $request->user_id;
        $grade->post_id = $request->post_id;
        $grade->save();
        return response()->json($grade);
    }
    public function all()
    {
        $grade = Grade::all();
        return GradeResource::collection(Grade::all());
        return response()->json($grade);
    }
    public function delete($id)
    {
        $grade = Grade::find($id);
        if (is_null($grade)) {
            return response()->json(['error' => true, 'massage' => 'No found']);
        }
        $grade->delete();
        return response()->json();
    }
    public function show(){
        $post = Grade::query()->where('post_id', '=', 4)->avg('grades');
        return response()->json($post);
    }
}
