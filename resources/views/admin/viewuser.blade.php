@extends('layouts.alayout')

@section('content')
 
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">User Management</h4>
                       
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>


<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            @if(\Session::has('success'))
            <div class="alert alert-succes">
                <p> {{ \Session::get('success') }}</p>
            </div>
            @endif
            <h4 class="m-t-0 header-title"><b>Users in the database</b></h4>
              <table class="table table-striped add-edit-table" id="datatable-editable">
                <thead>
                <tr>
                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">ID</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Name</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Email</th>
                     <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Created at</th>
                      <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Updated at</th>
                   
                    
                   
                </tr>
                </thead>
                <tbody>
                @foreach($users as $rows)
                <tr class="gradeX">
                    <td>{{$rows['id']}}</td>
                    <td>{{$rows['name']}}</td>
                    <td>{{$rows['email']}}</td>
                    <td>{{$rows->created_at->format('d-m-20y h:m:s')}}</td>
                    <td>{{$rows->updated_at->format('d-m-20y h:m:s')}}</td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div> 
       
  

@endsection