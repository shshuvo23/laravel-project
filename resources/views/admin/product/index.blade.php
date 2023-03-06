@extends('admin.master')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">All Products</div>
                        <div class="card-body">
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"">
                                <thead>
                                    <tr>
                                        <th>SL NO</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->status == 1 ? 'Active' : 'Deactivate' }}</td>
                                            <td>
                                                <img src="{{ asset($product->image) }}" alt="" height="50px">
                                            </td>
                                            <td>
                                                <div class="col">
                                                    <a href="{{route('product.edit', ['id' => $product->id])}}" class="btn btn-outline-success btn-sm"><i
                                                            class="fa-regular fa-pen-to-square"></i></a>
                                                    <a href="" class="btn btn-outline-primary btn-sm"><i class="fa-regular fa-eye">Details</i></a>

                                                    <form action="" method="post"
                                                        onsubmit="return confirm('Are you sure?')">
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-outline-danger btn"><i class="fa-solid fa-trash-can"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
