<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\URL;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){
        $keyword = $request->search;
        if($request->has('size')) {
            $keyword = $request->size;
        }
        if($request->has('color')) {
            $keyword = $request->color;
        }
        if($request->has('category')) {
            $keyword = $request->category;
        }
        
        $products = DB::table('products')
                    ->leftJoin('categories', 'products.category_id', '=', 'categories.id', 'AS', 'category_id')
                    ->select('products.*', 'categories.category_name')
                    ->where('products.product_name', 'like', '%'.$keyword.'%')
                    ->orwhere('products.product_brand', 'like', '%'.$keyword.'%')
                    ->orwhere('products.product_size', $keyword)
                    ->orwhere('products.product_color', 'like', '%'.$keyword.'%')
                    ->orwhere('categories.category_name', 'like', '%'.$keyword.'%')
                    ->orderBy('products.id', 'ASC');
        $categories = DB::table('categories')->get();
        $posts = DB::table('posts')
        ->orderBy('posts.id', 'DESC')->get();

        $cat = $request->input('category');
        if (is_countable($cat)) {
            foreach ($cat as $c) {
                $products = $products->where('products.category_id', $c);
            }
        }

        $products = $products->paginate(10)->withQueryString();

        $colors = DB::table('products')->select('product_color')->distinct()->get();
        return view('index', [
            'products' => $products,
            'categories' => $categories,
            'colors' => $colors,
            'posts' => $posts
        ]);
    }

    public function indexAdmin(Request $request)
    {
        $keyword = $request->search;
        $products = DB::table('products')
                    ->leftJoin('categories', 'products.category_id', '=', 'categories.id', 'AS', 'category_id')
                    ->select('products.*', 'categories.category_name')
                    ->where('products.product_name', 'like', '%'.$keyword.'%')
                    ->orwhere('products.product_brand', 'like', '%'.$keyword.'%')
                    ->orwhere('products.product_brand', 'like', '%'.$keyword.'%')
                    ->orwhere('categories.category_name', 'like', '%'.$keyword.'%')
                    ->orderBy('products.id', 'ASC')
                    ->get();
        return view('admin.products', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('products.productadd',[
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $imageName = time().'.'.$request->image->extension();
        $uploadedImage = $request->file('image')->move(public_path('images'), $imageName);
        $imagePath = 'images/' . $imageName;

        $params = $request->validated();

        if ($product = Product::create($params)) {
            $product->product_img = $imagePath;
            $product->save();
            return redirect(route('indexAdmin'))->with('success', 'Added!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $products = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.category_name')
            ->where('products.id', $id)
            ->first();
        $url =URL::to($products->product_url);
        return view('products.productdetail', [
            'product'=>$products,
            'title' => 'show',
            'url' => $url
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, $id)
    {
        $products = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id', 'AS', 'category_id')
            ->select('products.*', 'categories.category_name')
            ->where('products.id', $id)
            ->first();
        $categories = DB::table('categories')->get();
        return view('products.productedit', [
            'product'=>$products,
            'categories' => $categories,
            'title' => 'edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, $id)
    {
        $prod = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id', 'AS', 'category_id')
            ->select('products.*', 'categories.category_name')
            ->where('products.id', $id)
            ->first();
        if($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $uploadedImage = $request->image->storeAs('images', $imageName);
            $imagePath = 'images/' . $imageName;
        }

        $params = $request->validated();
        $params = Arr::except($params, ['image']);

        if(!empty($imagePath)) {
            Storage::delete($prod->product_img);
            Product::where('id',$id)->update(['product_img'=>$imagePath]);
        }
        Product::where('id',$id)->update($params);
        return redirect(route('indexAdmin'))->with('success', 'Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect(route('indexAdmin'))->with('success', 'Deleted!');
    }
    public function soldOut($id)
    {
        Product::where('id',$id)->update(['product_qty' => 0]);
        return redirect(route('indexAdmin'))->with('success', 'Changed to sold out!');
    }
}
