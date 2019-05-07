@extends('layouts.alayout')

@section('content')
<div class="content-page">
<!-- Start content -->
<div class="content">
    <div class="box">

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">Edit Product</h4>

                    <div class="row">
                        <div class="col-12">
                            <div class="p-20">
                                <form enctype="multipart/form-data" class="form-horizontal" role="form" method = "POST" action = "{{url('/admin/update/'.$product->id)}}" id = "editform">
                                @csrf
        
                                <div class = "col-lg-6">
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Name</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" placeholder="Enter name here" name = "name" value =  "{{$product->name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class = "col-lg-6">
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Price</label>
                                        <div class="col-10">
                                            <input type="number" class="form-control" placeholder="Enter price here" name = "price" value =  "{{$product->price}}">
                                        </div>
                                    </div>
                                </div>
                                <div class = "col-lg-6">
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Type</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" placeholder="Enter type here" name = "type" value =  "{{$product->type}}">
                                        </div>
                                    </div>
                                </div>
                                <div class = "col-lg-6">
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">size</label>
                                        <div class="col-10">
                                            <input type="number" class="form-control" placeholder="Enter size here" name = "size" min="1" max="12" size = "20" value =  "{{$product->size}}">
                                        </div>
                                    </div>
                                </div>
                                <div class = "col-lg-6">
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Image</label>
                                        <div class="col-10">
                                            <input type="file" placeholder="Enter the URL" name = "product_image" value =  "{{$product->image}}">
                                        </div>
                                    </div>
                                </div>
                                    
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    

                </div> 
            </div>
                </div>

        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function () {

     $('#editform').validate({
    rules: {
        category_id:{
            required: true
        },
        name: {
            required: true,
            minlength: 3,
            maxlength: 55,
        },
        price: {
            required: true,
            
        },

       type: {
            minlength: 3,
            maxlength: 20,
            required: true
        },
        size: {
            minlength: 1,
            maxlength: 12,
            required: true
        },

        }
     });

});
</script>
@endsection