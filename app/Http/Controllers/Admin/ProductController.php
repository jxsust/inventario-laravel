<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id'=> 'required|exists:categories,id',
        ]);

        $product = Product::create($data);

        session()->flash('swal',[
            'icon'  => 'success',
            'title' => '¡Bien Hecho!',
            'text'  => 'El producto se ha creado correctamente'
        ]);

        return redirect()->route('admin.products.edit', $product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id'=> 'required|exists:categories,id',
        ]);

        $product->update($data);

        session()->flash('swal',[
            'icon'  => 'success',
            'title' => '¡Bien Hecho!',
            'text'  => 'El producto se ha actualizado correctamente'
        ]);

        return redirect()->route('admin.products.edit', $product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

        if($product->inventories()->exists()){
            session()->flash('swal',[
                'icon'  => 'error',
                'title' => 'Error',
                'text'  => "No se puede eliminar el producto porque tiene inventario asociado"
            ]);
        }

        if($product->purchaseOrders()->exists() || $product->quotes()->exists()){
            session()->flash('swal',[
                'icon'  => 'error',
                'title' => 'Error',
                'text'  => "No se puede eliminar el producto porque tiene ordenes de compra o contizaciones  asociadas"
            ]);
        }

        $product->delete();

        session()->flash('swal',[
            'icon'  => 'success',
            'title' => '¡Bien hecho!',
            'test'  => 'El producto se ha eliminado correctamente'
        ]);

        return redirect()->route('admin.products.index');
    }

    public function dropzone(Request$request, Product $product)
    {
        $image = $product->images()->create([
            'path' => Storage::put('/images', $request->file('file')),
            'size' => $request->file('file')->getSize(),
        ]);
        
        return response()->json([
            'path' => $image->path,
        ]);
    }
}
