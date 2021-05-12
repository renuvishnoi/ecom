@extends('admin.layout')
@section('page_title','product')
@section('container')'
<h1 class="mb10">Manage product</h1>
<a href="{{ url('admin/product') }}">
<button type="button" class="btn btn-success">Back</button>
</a>
 <div class="row m-t-30">
                            <div class="col-md-12">
                               <div class="row">
                            <div class="col-lg-12">
                               
                                <div class="card">
                                    
                                    <div class="card-body">
                                     
                                        <form action="{{route('product.manage_product_process')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $id}}">
                                            <div class="form-group">
                                                <label for="product" class="control-label mb-1">product</label>
                                                <input id="product" name="product" type="text" value="{{ $name}}" class="form-control" aria-required="true" aria-invalid="false" >
                                                
                                                @error('product')
                                                <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                                </div>
                                                @enderror
                                            
                                            </div>
                                               <div class="form-group">
                                                <label for="product" class="control-label mb-1">Category</label>
                                                <select id="category" name="category_id"   class="form-control" aria-required="true" aria-invalid="false" >
                                                    <option value="">Select Category</option>
                                                    @foreach($category as $list)
                                                    @if($category_id == $list->id)
                                                    <option value="{{ $list->id }}" selected >{{ $list->category_name }}</option>
                                                    @else
                                                    <option value="{{ $list->id }}" >{{ $list->category_name }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                
                                                @error('category_id')
                                                <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                                </div>
                                                @enderror
                                            
                                            </div>
                                            <div class="form-group">
                                                <label for="product" class="control-label mb-1">Image</label>
                                                <input  type="file" id="image" name="upload"  class="form-control" aria-required="true" aria-invalid="" value="{{ old('image') }}">
                                                
                                                @error('image')
                                                <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                                </div>
                                                @enderror
                                            
                                            </div>
                                            <div class="form-group">
                                                <label for="product" class="control-label mb-1">Slug</label>
                                                <input id="slug" name="slug" type="text" value="{{ $slug}}" class="form-control" aria-required="true" aria-invalid="false" >
                                                @error('slug')
                                                <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="brand" class="control-label mb-1">Brand</label>
                                                <input id="brand" name="brand" type="text" value="{{ $brand }}" class="form-control" aria-required="true" aria-invalid="false" >
                                                @error('brand')
                                                <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="brand" class="control-label mb-1">Model</label>
                                                <input id="model" name="model" type="text" value="{{ $model }}" class="form-control" aria-required="true" aria-invalid="false" >
                                                @error('model')
                                                <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                             <div class="form-group">
                                                <label for="brand" class="control-label mb-1">Short Description</label>
                                                <textarea name="short_description" class="form-control">{{$short_description}}</textarea>
                                                @error('short_description')
                                                <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="brand" class="control-label mb-1"> Description</label>
                                                <textarea name="desc" class="form-control">{{$desc}}</textarea>
                                                @error('desc')
                                                <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                             <div class="form-group">
                                                <label for="brand" class="control-label mb-1"> Keywords</label>
                                                <textarea name="keywords" class="form-control">{{$keywords}}</textarea>
                                                @error('keywords')
                                                <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                             <div class="form-group">
                                                <label for="brand" class="control-label mb-1"> Technical Specification</label>
                                                <textarea name="technical_specification" class="form-control">{{$technical_specification}}</textarea>
                                                @error('technical_specification')
                                                <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                             <div class="form-group">
                                                <label for="brand" class="control-label mb-1"> Uses</label>
                                                <textarea name="uses" class="form-control">{{$uses}}</textarea>
                                                @error('uses')
                                                <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                             <div class="form-group">
                                                <label for="brand" class="control-label mb-1">Warrenty</label>
                                                <textarea name="warranty" class="form-control">{{ $warranty }}</textarea>
                                                @error('warranty')
                                                <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                           
                                         
                                          <input type="hidden" name="id" value="{{ $id }}">
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">Submit
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                           
                            
                            
                           
                        </div>
                            </div>
                        </div>
@endsection