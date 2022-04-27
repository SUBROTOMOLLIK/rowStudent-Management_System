@extends('backend.layouts.master')

@section('title')
    All Role - Admin Panel
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
                        <li><span>Dashboard</span></li>
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
            <!-- data table start -->
            <div class="col-12 mt-5">
                <!--Error and Success Message Show End-->
                @include('backend.layouts.partials.success')
                <!--Error and Success Message Show Start-->
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">All Role</h4>
                        <div class="data-tables">
                            <table id="dataTable" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th>SI</th>
                                        <th>Role</th>
                                        <th>Permissions</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$role->name}}</td>
                                            <td>
                                                @foreach ($role->permissions as $permission)
                                                    <span class="badge badge-info p-1 mr-1">{{$permission->name}}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{route('admin.roles.create')}}" role="button" class="btn btn-info btn-sm">create</a>
                                                <a href="{{route('admin.roles.edit', $role->id)}}" role="button" class="btn btn-primary btn-sm">edit</a>

                                                <a class="btn btn-danger btn-sm" href="{{ route('admin.roles.destroy',$role->id) }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('formDelete').submit();">
                                                 {{ __('delete') }}
                                             </a>

                                             <form id="formDelete" action="{{route('admin.roles.destroy',$role->id)}}" method="POST" class="d-none">
                                                @method('delete')
                                                 @csrf
                                             </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- data table end -->

        </div>
    </div>
</div>

@endsection
