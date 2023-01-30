<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductsCategories;
use App\Http\Requests\ProductsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
 public function __construct(){

    parent::__construct();
    $this->data['main_menu'] = 'Product';
    $this->data['sub_menu'] = 'Products';
 }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['products'] = Product::all();
        return view('products.products',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['categories'] = ProductsCategories::listOfCategories();
        return view('products.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsRequest $request)
    {
        $formData = $request->all();

        // Image Upload
        $imgData = $request->file('p_image');
        if ($imgData != null) {

            $imageName = date('Y-m-d-H-i-s_').'-'.$imgData->getClientOriginalName();
            $imgPath = $imgData->move('storage/images/products',$imageName);

            $formData['p_image'] = $imgPath;
        }


        if (Product::create($formData)) {
            Session::flash('message','Product Create Successfully!');
        }
        return redirect()->to('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['products'] = Product::findOrFail($id);
        return view('products.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['categories'] =  ProductsCategories::listOfCategories();
        $this->data['products']   = Product::findOrFail($id);
        return view('products.edit',$this->data);
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
        $request->validate([
            'cat_id'        => 'required',
            'title'         => 'required',
            'price'         => 'required',
            'description'   => 'required',
        ]);

        $data = $request->all();
        $formData = Product::findOrFail($id);

        $formData->cat_id           = $data['cat_id'];
        $formData->title            = $data['title'];
        $formData->cost_price       = $data['cost_price'];
        $formData->price            = $data['price'];
        $formData->description      = $data['description'];
        $formData->has_stock       = $data['has_stock'];

        if ($formData->save() ) {
           Session::flash('message','Product Updated Successfully!');
        }
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_dlt = Product::findOrFail($id);
        if ($product_dlt->delete()) {
            Session::flash('message','Product Deleted Successfully!');
        }
        return redirect('products');
    }
}
