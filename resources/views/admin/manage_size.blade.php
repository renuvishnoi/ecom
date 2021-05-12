@extends('admin.layout')
@section('page_title','size')
@section('container')'
<h1 class="mb10">Manage Size</h1>
<a href="{{ url('admin/size') }}">
<button type="button" class="btn btn-success">Back</button>
</a>
 <div class="row m-t-30">
                            <div class="col-md-12">
                               <div class="row">
                            <div class="col-lg-12">
                               
                                <div class="card">
                                    
                                    <div class="card-body">
                                     
                                        <form action="{{route('size.manage_size_process')}}" method="post" >
                                            @csrf
                                            <div class="form-group">
                                                <label for="size" class="control-label mb-1">Size</label>
                                                <input id="size" name="size" type="text" value="{{ $size}}" class="form-control" aria-required="true" aria-invalid="false" required="">
                                                
                                                @error('size')
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