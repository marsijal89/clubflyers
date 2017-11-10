<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TempGroup;

class TemGroController extends Controller
{
    public function index()

    {
        $template = TempGroup::all();

        return response()->json($template);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $template = new TempGroup();

        $template->name = $request->name;

        $template->save();

        return response()->json($template);
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $template = TempGroup::find($id);

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
       $template = TempGroup::find($id);

       $template->name = $request->name;
       
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
        $template = TempGroup::find($id);

        $template->delete();

        return response()->json('delete');
        
        
    }

}
