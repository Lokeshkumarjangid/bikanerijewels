@extends('admin.layouts.app')

@section('title', 'Update Product')

@section('content')

<div class="content-header">
  <div class="container-fluid">
    <h1>Edit Product</h1>
  </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Product</h3>
            </div>

            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="row">
                        <!-- Category -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category</label>
                                <select name="categroy_id" class="form-control">
                                    @foreach($categroy as $cat)
                                        <option value="{{ $cat->id }}" {{ $product->categroy_id == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Product Name -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" name="product_name" class="form-control" value="{{ $product->product_name }}">
                            </div>
                        </div>

                        <!-- SKU -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>SKU</label>
                                <input type="text" name="sku" class="form-control" value="{{ $product->sku }}">
                            </div>
                        </div>

                        <!-- Colour -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Colour</label>
                                <input type="text" name="colour" class="form-control" value="{{ $product->colour }}">
                            </div>
                        </div>

                        <!-- Metal -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Metal Type</label>
                                <input type="text" name="metal_type" class="form-control" value="{{ $product->metal_type }}">
                            </div>
                        </div>

                        <!-- Finish -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Metal Finish</label>
                                <input type="text" name="metal_finish" class="form-control" value="{{ $product->metal_finish }}">
                            </div>
                        </div>

                        <!-- Weight -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gross Weight</label>
                                <input type="text" name="gross_weight" class="form-control" value="{{ $product->gross_weight }}">
                            </div>
                        </div>

                        <!-- ================= IMAGE SECTION ================= -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Product Image</b></label>
                                <input type="file" name="product_img[]" multiple class="form-control">
                            </div>

                            <!-- Existing Images BELOW -->
                            <label class="mt-2">Existing Images</label>
                            <div class="d-flex flex-wrap">

                                @forelse($product->images as $img)
                                <div class="mr-2 mb-2 text-center">

                                    <img src="{{ asset('storage/'.$img->file_path) }}"
                                        style="height:70px; width:70px; object-fit:cover; border-radius:6px;"
                                        onerror="this.src='https://via.placeholder.com/70'">

                                </div>
                                @empty
                                    <p>No images</p>
                                @endforelse

                            </div>
                        </div>

                        <!-- ================= VIDEO SECTION ================= -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Product Video</b></label>
                                <input type="file" name="product_video" class="form-control">
                            </div>

                            <!-- Existing Video BELOW -->
                            <label class="mt-2">Existing Video</label>

                            @if($product->video)
                                <div style="max-width:200px;">

                                    <video width="100%" height="120" controls style="border-radius:6px;">
                                        <source src="{{ asset('storage/'.$product->video->file_path) }}">
                                    </video>
                                </div>
                            @else
                                <p>No video</p>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>
    </div>
</section>

@endsection