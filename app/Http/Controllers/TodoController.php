<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Http\Resources\TodoResource;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return TodoResource::collection(Todo::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return TodoResource
     */
    public function store(Request $request)
    {
        $todo = new Todo();
        $todo->title = $request->input('title');
        $todo->status = $request->input('status');

        if ($todo->save()) {
            return new TodoResource($todo);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return TodoResource
     */
    public function show($id)
    {
        $todo = Todo::findOrFail($id);
        return new TodoResource($todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return TodoResource
     */
    public function update(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->title = $request->input('title');
        $todo->status = $request->input('status');

        if ($todo->save()) {
            return new TodoResource($todo);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return TodoResource
     */
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);

        if ($todo->delete()) {
            return new TodoResource($todo);
        }
    }
}
