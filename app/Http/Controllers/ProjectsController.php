<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Projects::all();

        return response()->json($projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $projects = new Projects();

        $projects->userId = $request->userId;

        $projects->name = $request->name;

        $projects->content = $request->content;

        $projects->preview = $request->preview;

        $projects->save();

        return response()->json($projects);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projects = Projects::find($id);

        return response()->json($projects);
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
        $projects = Projects::find($id);
        
        $projects->userId = $request->userId;
        
        $projects->name = $request->name;
        
        $projects->content = $request->content;
        
        $projects->preview = $request->preview;
        
        $projects->save();
        
        return response()->json($projects);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projects = Projects::find($id);

        $projects->delete();

        return response()->json("delete");
    }
}
