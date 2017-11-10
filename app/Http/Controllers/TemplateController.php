<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $template = Template::all();

        return response()->json($template);
        
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
        $template = new Template();

        $template->groupId = $request->groupId;

        $template->name = $request->name;

        $template->content = $request->content;

        $template->preview = $request->preview;

        $template->save();

        return response()->json($template);
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
       $template = Template::find($id);

       return response()->json($template);
       
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
       $template = Template::find($id);

       $template->groupId = $request->groupId;
       
       $template->name = $request->name;
       
       $template->content = $request->content;
       
       $template->preview = $request->preview;
       
       $template->save();
       
       return response()->json('Update success');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $template = Template::find($id);

        $template->delete();

        return response()->json('delete');
        
        
    }
}
