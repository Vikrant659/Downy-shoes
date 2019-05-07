@extends('layouts.alayout')

@section('content')
<div class="content-page">
<!-- Start content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">Edit categories</h4>

                    <div class="row">
                        <div class="col-12">
                            <div class="p-20">
                                <form class="form-horizontal" role="form" method = "POST" action = "{{url('/admin/updatecat/'.$category->id)}}" id = "editcatform">
                                @csrf
                               
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Category</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" placeholder="Enter category here" name = "category_name" value = "{{ $category->category }}">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Description</label>
                                        <div class="col-10">
                                            <input type = "textarea"  placeholder = "Enter category description here" class="form-control" name = "category_description" value = "{{ $category->description }}" >
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

     $('#editcatform').validate({
    rules: {
        category_name:{
            required: true
        },
        category_description: {
            required: true,
            minlength: 3,
            maxlength: 55,
        },
        }
    });
});
</script>
@endsection