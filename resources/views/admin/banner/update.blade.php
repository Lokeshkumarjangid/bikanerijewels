@extends('admin.layouts.app')

@section('title', 'Banner Edit')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Banner Edit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Banner</li>
                </ol>
            </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-primary">

                <form action="{{ route('banner.update',$banner->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        {{-- Desktop Banner --}}
                        <div class="form-group">
                            <label>Desktop Banner (863*360)</label>
                            <input type="file" name="banner_img_web" class="form-control" accept="image/*">
                    
                            <label class="mt-2">Existing Desktop Images</label>
                            <div class="d-flex flex-wrap">
                                <div class="mr-2 mb-2 text-center">

                                    <img src="{{ asset('storage/'.$banner->banner_img_web) }}"
                                        style="height:70px; width:150px; object-fit:cover; border-radius:6px;"
                                        onerror="this.src='https://via.placeholder.com/70'">

                                </div>
                            </div>
                        </div>

                        {{-- Mobile Banner --}}
                        <div class="form-group">
                            <label>Mobile Banner (450 × 600)</label>
                            <input type="file" name="banner_mob_web" class="form-control" accept="image/*">
                            
                            <label class="mt-2">Existing Mobile Images</label>
                            <div class="d-flex flex-wrap">
                                <div class="mr-2 mb-2 text-center">

                                    <img src="{{ asset('storage/'.$banner->banner_img_mob) }}"
                                        style="height:100px; width:100px; object-fit:cover; border-radius:6px;"
                                        onerror="this.src='https://via.placeholder.com/70'">

                                </div>
                            </div>
                        </div>

                        {{-- Sort Order --}}
                        <div class="form-group">
                            <label>Sort Order</label>
                            <input type="number" name="sort_order" class="form-control" value="{{$banner->sort_order}}">
                           
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>

            </div>

        </div>
    </section>

@endsection