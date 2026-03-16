<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;


use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::paginate(5);
        return view("product.index",compact('products'));
    }

    public function create(){
        return view("product.create");
    }

    public function store(Request $data){
        
        $data->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required|image'
        ]);

        $imageName = time().'.'.$data->image->extension();
        $data->image->move(public_path('images'),$imageName);


        Product::create([
            'name' => $data->name,
            'price' => $data->price,
            'description' => $data->description,
            'image'=> $imageName
        ]);
        return redirect('/');
    }


    public function delete($id){
        $product = Product::find($id);
        $product->delete();
        return redirect("/");
    }


    public function edit($id){
        $product = Product::find($id);
        return view('product.edit',compact('product'));
    }


    public function update(Request $data,$id){
        $product = Product::find($id);
        $data->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);
        if ($data->has('image')){
            if ($product->image && file_exists(public_path('images/'.$product->image))){
                unlink(public_path('images/'.$product->image));

            }
            $imageName = time().'.'.$data->image->extension();
            $data->image->move(public_path('images'),$imageName);

            $product->image = $imageName;
        }

        $product->name = $data->name;
        $product->price = $data->price;
        $product->description =$data->description;

        

        $product->save();

        return redirect("/");

    }


    public function details($id){
        $product = Product::find($id);
        return view('product.view',compact('product'));

    }

    public function search(Request $request){
        
        $products = Product::where('name','LIKE','%'.$request->search.'%')->get();
        // return view('product.index',compact('products'));

        if ($request->ajax()){
            return response()->json($products);
        }
        return view('product.index',compact('products'));
    }


    public function downloadPDF()
    {
        $products = Product::all();

        $pdf = Pdf::loadView('product.pdf', compact('products'));

        return $pdf->download('product.pdf');
    }
    
}
