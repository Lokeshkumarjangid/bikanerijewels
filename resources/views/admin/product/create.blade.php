@extends('admin.layouts.app')

@section('title', 'Product Add')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Product Add</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Product</li>
                </ol>
            </div>
            </div>
        </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="categoryName">Categroy Name</label>
                                <select class="form-control" name='categroy_id'>
                                <option value=''>Please select</option>
                                @if(!empty($categroy))
                                    @foreach($categroy as $value)
                                        <option value='{{$value->id}}'>{{$value->name}}</option>
                                    @endforeach
                                @endif
                                </select>
                                @error('categroy_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="productname">Product Name</label>
                                <input type="text" name="product_name" class="form-control" id="productname" placeholder="Product Name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="skuName">Sku</label>
                                <input type="text" name="sku" class="form-control" id="skuName" placeholder="Sku">
                                @error('sku')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="colourName">Colour</label>
                                <input type="text" name="colour" class="form-control" id="colourName" placeholder="Colour">
                                @error('colour')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="metalName">Metal Type</label>
                                <input type="text" name="metal_type" class="form-control" id="metalName" placeholder="Metal Type">
                                @error('metal_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="metalfinishName">Metal Finish</label>
                                <input type="text" name="metal_finish" class="form-control" id="metalfinishName" placeholder="Metal Finish">
                                @error('metal_finish')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="weightName">Gross Weight</label>
                                <input type="text" name="gross_weight" class="form-control" id="weightName" placeholder="Gross Weight">
                                @error('gross_weight')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="productimage">Product Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="productimage" name="product_img[]" multiple>
                                        <label class="custom-file-label" for="productimage">Choose file</label>
                                    </div>
                                    @error('product_img')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="productvideo">Product Video</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="productvideo" name='product_video'>
                                        <label class="custom-file-label" for="productvideo">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection
@section('scripts')
<script>
$(function () {

    $('#quickForm').validate({

        ignore: [],

        rules: {
            categroy_id: { required: true },
            product_name: { required: true },
            sku: { required: true },
            colour: { required: true },
            metal_type: { required: true },
            metal_finish: { required: true },
            gross_weight: { required: true, number: true },

            "product_img[]": {
                required: true,
                extension: "jpg|jpeg|png|webp"
            },

            product_video: {
                extension: "mp4|avi|mov"
            }
        },

        messages: {
            categroy_id: "Please select category name",
            product_name: "Enter product name",
            sku: "Enter SKU",
            colour: "Enter colour",
            metal_type: "Enter metal type",
            metal_finish: "Enter metal finish",
            gross_weight: {
                required: "Enter weight",
                number: "Only numbers allowed"
            },
            "product_img[]": {
                required: "Upload at least one image",
                extension: "Only JPG, PNG allowed"
            },
            product_video: {
                extension: "Only MP4, AVI, MOV allowed"
            }
        },

        errorElement: 'span',

        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');

            if (element.attr("type") === "file") {
                element.closest('.form-group').append(error);
            } else {
                element.closest('.form-group').append(error);
            }
        },

        highlight: function (element) {
            $(element).addClass('is-invalid');
        },

        unhighlight: function (element) {
            $(element).removeClass('is-invalid');
        },

        submitHandler: function(form) {
            let btn = $('#submitBtn');

            btn.prop('disabled', true);

            btn.html(`
                <span class="spinner-border spinner-border-sm"></span> 
                Processing...
            `);

            form.submit();
        }
    });

    $('#productimage').on('change', function () {
        $(this).valid();
    });

});
</script>

@endsection