@extends('layouts.app')
@section('title', 'Add Employee')
@section('content')
    <div class="row mt-3" id="basic-table">
        <div class="col-12 col-md-9 mx-auto">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center all-card-sec mb-2 mb-lg-0">
                    <h4 class="card-title all-tp-heading" style="float: left">Add Customer</h4>

                    <a href="{{ route('employee.index') }}" class="btn all-quick-ride-btn" > Back</a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form method="post" action="{{ route('updatePassword', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div class="form-row">
                                <div class="row">
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-1 mb-lg-2">
                                            <label for="password" class="label required">Password</label>
                                            <input type="text" class="form-control all-edit-control" id="password" name="password" placeholder="Password" value="{{ old('password') }}">
                                            @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn glow position-relative mt-1 mb-1" style="background-color: #18a08a; color: #fff"> Submit <i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection