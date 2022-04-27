@extends('backend.layouts.master')

@section('title')
    Edit Role - Admin Panel
@endsection
@section('content')
<div class="main-content">
    <!-- header area start -->
    @include('backend.layouts.partials.header')
    <!-- header area end -->
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Dashboard</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="index.html">Home</a></li>
                        <li><span>edit role</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                <div class="user-profile pull-right">
                    <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Kumkum Rai <i class="fa fa-angle-down"></i></h4>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Message</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Log Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
        <!-- basic form start -->
        <div class="col-12 mt-5">
            <!--Error and Success Message Show Start-->
            @include('backend.layouts.partials.message')
            @include('backend.layouts.partials.success')
            <!--Error and Success Message Show Start-->
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Role Edit</h4>
                    <form method="post" action="{{route('admin.roles.update', $role->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Role Name</label>
                            <input type="text" class="form-control" name="name" value="{{$role->name}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Permissions</label>
                            <hr>
                            @foreach ($permissions as $permission)
                            <div class="form-check py-2">
                                <input type="checkbox" class="form-check-input" name="permissions[]" id="permissionCheck{{$permission->id}}" value="{{$permission->name}}" {{$role->hasPermissionTo($permission->name)?'checked':''}}>
                                <label class="form-check-label" for="permissionCheck{{$permission->id}}">{{$permission->name}}</label>
                            </div>
                            @endforeach

                        </div>

                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- basic form end -->
       </div>
    </div>

@endsection




