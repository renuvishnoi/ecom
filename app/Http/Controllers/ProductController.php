<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = Product::all();
        return view('admin.product',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_product(Request $request, $id = '')
    {
        if($id>0){
            $arr= Product::where(['id'=>$id])->get();
             $result['name']=$arr[0]->name;
            $result['slug']=$arr[0]->slug;
             $result['brand']=$arr[0]->brand;
            $result['model']=$arr[0]->model;
             $result['short_description']=$arr[0]->short_description;
            $result['keywords']=$arr[0]->keywords;
             $result['technical_specification']=$arr[0]->technical_specification;
             $result['desc']=$arr[0]->desc;
             $result['category_id']=$arr[0]->category_id;
            $result['uses']=$arr[0]->uses;
            $result['warranty']=$arr[0]->warranty;
            $result['status']=$arr[0]->status;
            $result['id']=$arr[0]->id;
        }else{
            $result['name']='';
            $result['slug']='';
             $result['brand']='';
            $result['model']='';
             $result['short_description']='';
            $result['keywords']='';
             $result['technical_specification']='';
             $result['desc']='';
             $result['category_id']='';
            $result['uses']='';
            $result['warranty']='';
            $result['status']='';
            $result['id']='';
        }
        $result['category'] = Category::where(['status'=>'1'])->get();

       // dd($result);
        return view('admin.manage_product',$result);
    }
    public function manage_product_process(Request $request){
      dd($request);
      //return $request->post;
      $request->validate([
        'product'=>'required',
        //'image'=>'required|mimes:jpeg,jpg,png',
        'slug'=>'required|unique:products,slug,'.$request->post('id'),
      ]);
      $model = new Product();
      if($request->post('id')>0){
        $model = Product::find($request->post('id'));
        $msg= "product updated";
      }else{
        $model = new Product();
        $msg= "product inserted";
      }
      
      if($request->hasFile('image')){
        dd($request->file('iamge'));
//dd($request->file('iamge'));
       $image= $request->file('iamge');
       $ext = $image->getClientOriginalExtension();

       $image_name = time().'.'.$ext;
       $image->move(public_path('media'), $image_name);
       //$image->storeAs('/public/media',$image_name);
       $model->image=$image_name;
      }
      $model->name=$request->post('product');
      $model->slug=$request->post('slug');
      $model->brand=$request->post('brand');
      $model->model=$request->post('model');
      $model->short_description=$request->post('short_description');
      $model->category_id=$request->post('category_id');
      $model->image=$request->post('image');
      $model->desc=$request->post('desc');
      $model->keywords=$request->post('keywords');
      $model->technical_specification=$request->post('technical_specification');
      $model->uses=$request->post('uses');
      $model->warranty=$request->post('warranty');
      $model->status=1;
      //dd($model);
      $model->save();
      $request->session()->flash('message',$msg);
      return redirect('admin/product');

    }

   public function delete(Request $request, $id){
     $model = Product::find($id);
     $model->delete();
     $request->session()->flash('message','product deleted successfully');
      return redirect('admin/product');
   }
   public function status(Request $request,$status, $id){
  $model = Product::find($id);
  $model->status= $status;
     $model->save();
     $request->session()->flash('message','product status updated successfully');
      return redirect('admin/product');
   }
}
