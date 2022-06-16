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
                        <form method="post" action="{{ route('employee.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="row">
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <div class="form-group col-md-6">
                                        <label for="first_name" class="customer-label required">First Name</label>
                                        <input type="text" class="form-control all-edit-control" id="first_name" name="first_name" placeholder="First Name" value="{{ old('first_name') ? old('first_name') : $user->first_name }}">
                                        @error('first_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="last_name" class="customer-label required">Last Name</label>
                                        <input type="text" class="form-control all-edit-control" id="last_name" name="last_name" placeholder="Last Name" value="{{ old('last_name') ? old('last_name') : $user->last_name }}">
                                        @error('last_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="phone" class="customer-label required">Phone</label>
                                        <input type="text" class="form-control all-edit-control" id="phone" name="phone" placeholder="Phone Number" value="{{ old('phone') ? old('phone') : $user->phone }}">
                                        @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email" class="customer-label required">Email</label>
                                        <input type="email" class="form-control all-edit-control" id="email" name="email" placeholder="Email" value="{{ old('email') ? old('email') : $user->email }}">
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="address" class="label required">Address</label>
                                        <input type="text" class="form-control all-edit-control" id="address" name="address" placeholder="Address" value="{{ old('address') ? old('address') : $user->address }}">
                                        @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="country" class="label required">County</label>
                                        <input type="text" class="form-control all-edit-control" id="country" name="country" placeholder="Country" value="{{ old('country') ? old('country') : $user->country }}">
                                        @error('country')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="state" class="label required">State</label>
                                        <input type="text" class="form-control all-edit-control" id="state" name="state" placeholder="State" value="{{ old('state') ? old('state') : $user->state }}">
                                        @error('state')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="city" class="label required">City</label>
                                        <input type="text" class="form-control all-edit-control" id="city" name="city" placeholder="City" value="{{ old('city') ? old('city') : $user->city }}">
                                        @error('city')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn glow position-relative mt-1 mb-1 " style="background-color: #18a08a; color: #fff"> Submit <i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection