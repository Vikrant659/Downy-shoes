@extends('layouts.alayout')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <!-- Page-Title -->
            
<div class="row">
<h3>Category search:</h3>
<form action="{{url('/admin/viewcategory')}}" role="search" method = "GET">
<input style="
    position: relative;
    left: 10px;
    bottom: 5px;
" type="text" placeholder="Search..." class="form-control" name="search"><span>
<button style="
    position: relative;
    left: 231px;
    bottom: 43px;
" class="btn btn-light" type="submit"><i class="fa fa-search"></i></button>
</form></span>
    <div class="col-sm-12">
        <div class="card-box">
            @if(\Session::has('success'))
            <div class="alert alert-succes">
                <p> {{ \Session::get('success') }}</p>
            </div>
            @endif
            <h4 class="m-t-0 header-title"><b>Category Table</b></h4>
              <table class="table table-striped add-edit-table" id="datatable-editable">
                <thead>
                <tr>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Name</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Detail</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Action</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $rows)
                <tr class="gradeX">
                    <td>{{$rows->category}}</td>
                    <td>{{$rows->description}}</td>
                    <td><a style="padding: 4px 7px 2px 9px;"href="{{url('/admin/editcategory',$rows->id)}}" class="btn btn-primary fa fa-edit"></a> 
             <form method="post" class="delete_form" action="{{url('/admin/destroycat',$rows->id)}}">
              {{ csrf_field() }}
             <input type = "hidden" name = "_method" value = "DELETE" />
             <button style="padding: 2px 11px 4px 9px;border-radius: 5px;background-color: #ef5350;color: white;margin-left:1px; border:none" type ="submit" class ="fa fa-trash"></button>
                </form> 
                </td>
                <td>
                @if($rows->status == 1)
                    <button class="btn btn-primary statusBtn" data-status="{{$rows->status}} " value="{{$rows->id}}">Active</button>
                @else
                    <button class="btn btn-warning statusBtn" data-status="{{$rows->status}} " value="{{$rows->id}}">Deactive</button>
                @endif 
                </td>
                
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$categories->links()}}
        </div>
    </div>
</div> 
<script>
    $(document).ready(function(){
     $('.statusBtn').click(function(){
               var url = "{{route('changeCategory')}}";
               var id= $(this).val();
               var status = $(this).data('status');
               var msg = (status== 0)? 'Activate' : 'Deactivate';
               if(confirm("Are you sure to "+ msg))
               {
                    $.ajax({
                        type: 'get',
                        url: url,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: {"id":id,"status":status},
                        success: function(data) {
                            if(data.status){
                                location.reload();
                            }
                        },
                        error: { }
                    });
                }
           });
    });


</script>
@endsection