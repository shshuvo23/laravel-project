@extends('admin.master')

@section('body')

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">Update Product</div>
                    <form action="{{route('product.update', ['id' => $product->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <p class="text-success">{{Session::get('message')}}</p>

                            <div class="row mb-3">
                                <label for="" class="col-md-3">Category</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="category_id" id="">
                                        <option  value="">Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-3">Brand</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="brand_id" id="">
                                        <option  value="}">Select Category</option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}" {{$brand->id == $product->brand_id ? 'selected' : ''}}>{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-3">Product Title</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$product->title}}" name="title" id="" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-3">Product Description</label>
                                <div class="col-md-9">
                                    <textarea name="description" id="" cols="30" rows="4" class="form-control">{{$product->description}}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-3">Product Code</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$product->code}}" name="code" id="" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-3">Image</label>
                                <div class="col-md-9">
                                    <img src="{{asset($product->image)}}" alt="" height="100" width="100">
                                    <input type="file" name="image[]" id="" class="form-control" multiple>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-md-3">Price</label>
                                <div class="col-md-9">
                                    <input type="number" value="{{$product->price}}" name="price" id="" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-md-3"></label>
                                <div class="col-md-9">
                                    <input type="submit"  class="btn btn-outline-success px-5" value="Add Product">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
