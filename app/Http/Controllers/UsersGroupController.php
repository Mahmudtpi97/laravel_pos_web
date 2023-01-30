<?php

namespace App\Http\Controllers;

use App\Models\usersGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class UsersGroupController extends Controller
{

    public function __construct(){

        parent::__construct();
        $this->data['main_menu'] = 'Users';
        $this->data['sub_menu'] = 'Groups';
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $this->data['groups'] =usersGroup::all();
        return view('groups.groups',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('groups.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $formData    = $request->all();

        $formData = $request->validate([
            'title' => 'required|unique:usersgroups',
        ],
        // [ 'title.required' => 'The :attribute Field is Required.']);
        [
            'title.required' => 'This Group Name  Field is Required!',
            'title.unique' => 'This Group Name Already Exist!',
        ]);
        if(usersGroup::create($formData)){
            Session::flash('message', 'Group Created Successfully');
        }
           return redirect()->to('groups');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $this->data['groups'] = usersGroup::findOrFail($id);
        return view('groups.edit',$this->data);
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

           $data = $request->all();
           $formData = usersGroup::findOrFail($id);
           $formData->title = $data['title'];

           $request->validate([
                'title' => 'required',
            ]);

            if ($formData->save()) {
                Session::flash('message', 'Group Update Successfully');
            }
            return redirect()->to('groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        if(usersGroup::findOrFail($id)->delete()){
            Session::flash('message', 'Group Delete Successfully');
        }
           return redirect()->to('groups');
    }

}



