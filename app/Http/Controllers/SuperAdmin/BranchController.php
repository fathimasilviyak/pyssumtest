<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Branch;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('super-admin.branch.index');

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
        
        $branch = new Branch();
        $branch->name = $request->name;
        $branch->location = $request->location;
        $branch->address = $request->address;
       
        $save = $branch->save();

        return back()->with('success','Branch Added Successfully !');

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {

        
        $data = [
            'name' => $request->updt_name,
            'location' => $request->updt_location,
            'address' => $request->updt_address
        ];
        $branch->update($data);

        return back()->with('success','Branch Updated Successfully !');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
        return back()->with('success','Branch Deleted Successfully !');   
    }

    public function selectBranch(Request $request){
        $request->session()->forget('branch');
        $data = $request->input();
        $request->session()->put('branch', $data['selected_branch']);
        
        return redirect()->route('super-admin.home');
 
    }

}
