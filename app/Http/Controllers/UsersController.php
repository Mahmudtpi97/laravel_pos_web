<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\usersGroup;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{

    public function __construct(){

        parent::__construct();
        $this->data['main_menu'] = 'Users';
        $this->data['sub_menu'] = 'Users';
     }

    /* Display a listing of the resource.*/
    public function index()
    {
        $this->data['users']  = User::all();
        return view('users.users',$this->data);
    }

    /**  Show the form for creating a new resource. **/
    public function create()
    {
        // $this->data['groups'] = usersGroup::arrForGroupSelect();
                 //  OR
        $this->data['groups'] = usersGroup::all();
        return view('users.create',$this->data);
    }

    /* Store a newly created resource in storage.*/
    public function store(UsersRequest $request)
    {
        $formData = $request->all();
        // Image Upload
        $img = $request->file('photo');
        if ($img != null) {
            $imageName= time().'_'.$img->getClientOriginalName();
            $imgPath = $request->file('photo')->storeAs('images',$imageName,'public');
            $formData['photo'] = '/storage/'.$imgPath;
        }


        if (User::create($formData)) {
            Session::flash('message','User Create Successfully!');
        }
        return redirect()->to('users');

    }

    /* Display the specified resource.*/
    public function show($id)
    {
        $this->data['tab_menu'] = 'User_info';
        $this->data['users']    = User::findOrFail($id);
        return view('users.show',$this->data);
    }


    /* Show the form for editing the specified resource.*/
    public function edit($id)
    {
        $this->data['groups'] = usersGroup::arrForGroupSelect();
        $this->data['users'] = User::findOrFail($id);
        return view('users.edit',$this->data);
    }

    /* Update the specified resource in storage. */
    public function update(Request $request, $id)
    {

        $request->validate([
            'group_id'  => 'required',
            'name'      => 'required',
            'email'     => 'email',
            'phone'     => 'required|numeric',
            'address'   => 'required',
            'birthday'  => 'nullable',
        ]);

        $data = $request->all();

        $formData              = User::findOrFail($id);
        $formData->group_id    = $data['group_id'];
        $formData->name        = $data['name'];
        $formData->email       = $data['email'];
        $formData->phone       = $data['phone'];
        $formData->address     = $data['address'];
        $formData->birthday    = $data['birthday'];
        // $formData->photo       = $data['photo'];

        // if ($request->hasFile('photo')) {
        //     $file = $request->file('photo');
        //     $imagName= time().'_'.$request->file('photo')->getClientOriginalName();
        //     $imgPath = $request->file('photo')->storeAs('images',$imagName,'public');

        //     $formData['photo'] = '/storage/'.$imgPath;
        //     if (file_exists($users->photo) ) {
        //          unlike($users->photo);
        //     }
        // }
        // $formData->save();

        if($formData->save()){
            Session::flash('message','User Update Successfully!');
        }
        return  redirect('users');
    }

    /* Remove the specified resource from storage. */
    public function destroy($id)
    {
        $user_dlt = User::findOrFail($id);
        if ($user_dlt->delete() ) {
           Session::flash('message','User Delete Successfully!');
        }
        return redirect('users');
    }


}
