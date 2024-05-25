@extends('layouts.app', [
'namePage' => 'Users Management',
'class' => 'sidebar-mini',
'activePage' => 'users',
])

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{__(" Add User")}}</h5>
                </div>
                <div class="card-body">
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <form method="POST" action="{{ route('user.store') }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label for="name">{{__(" Name")}}</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter name">
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label for="username">{{__(" Username")}}</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        placeholder="Username">
                                    @include('alerts.feedback', ['field' => 'username'])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label for="email">{{__(" Email")}}</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Email">
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label for="roles">{{__(" Roles")}}</label>
                                    <select class="form-control select2bs4" style="width: 100%;" id="roles"
                                        name="roles">
                                        @foreach($roles as $v)
                                        <option value="{{ $v }}" selected="selected">{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label for="password">{{__(" Password")}}</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password">
                                    @include('alerts.feedback', ['field' => 'password'])
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label for="password_confirmation">{{__(" Confirm Password")}}</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="Confirm Password">
                                    @include('alerts.feedback', ['field' => 'password_confirmation'])
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <button type="submit" class="btn btn-primary btn-round">{{__('Save')}}</button>
                            <a class="btn btn-secondary btn-round text-white pull-right"
                                href="{{ route('user.index') }}">Back</a>
                        </div>
                    </form>
                </div>
                <!-- end content-->
            </div>
            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- <div class="alert alert-danger">
        <span>
            <b></b> This is a PRO feature!</span>
    </div> -->
    <!-- end row -->
</div>
@endsection