<?php

namespace App\Http\Controllers;
use App\Models\ProductsCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Product_Cat_Controller extends Controller
{

    public function __construct(){

        parent::__construct();
        $this->data['main_menu'] = 'Product';
        $this->data['sub_menu'] = 'Categories';
     }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['categories'] = ProductsCategories::all();
        return view('categories.categories',$this->data);
;    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData= $request->all();

        $formData= $request->validate([
            'title' => 'required',
        ]);

        if(ProductsCategories::create($formData)){
            Session::flash('message','Category Create Successfully !');
        }
        return redirect()->to('categories');


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['categories'] = ProductsCategories::findOrFail($id);
        return view ('categories.edit',$this->data);

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
        $data            = $request->all();
        $formData        = ProductsCategories::findOrFail($id);
        $formData->title = $data['title'];

        $request->validate([
            'title' => 'required',
        ]);
        if ($formData->save()) {
            Session::flash('message','Category Updated Successfully !');
        }
        return redirect()->to('categories');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formData        = ProductsCategories::findOrFail($id);
        if ($formData->delete()) {
            Session::flash('message', 'Category Delete Successfully');
        }
           return redirect()->to('categories');
    }

}
