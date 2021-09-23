@extends('layouts.main')
@push('title')
    <title>Customer Trash</title>
@endpush
@section('main_section')

<nav class="navbar navbar-light bg-light justify-content-between">
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
   
  <div class="d-flex">
    <a class="nav-link btn btn-success mr-3" href="{{route('customaes')}}" role="button">All Customer</a>
  </div>  
</nav>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Gender</th>
        <th scope="col">Address</th>
        <th scope="col">Country</th>
        <th scope="col">DOB</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        {{-- <pre> 
            @php
                print_r($customerView->toArray());
            @endphp
             
        </pre> --}}
       
          @foreach ($customerView as $customer)
          {{-- <pre> 
          @php
              echo ($customer['DOB']);
          @endphp
          </pre> --}}
        <tr>
          <th scope="row">{{$customer['customer_id']}}</th>
          <td>{{$customer['name']}}</td>
          <td>{{$customer['email']}}</td>
          <td>{{$customer['gender']}}</td>
          <td>{{$customer['address']}}</td>
          <td>{{$customer['country']}}</td>
          <td>{{$customer['dob']}}</td>
          @if ($customer['status'] == 1)
          <td><span class="btn btn-success">Active</span></td>  
          @elseif($customer['status'] == 0)
          <td><span class="btn btn-danger">Inactive</span></td>
          @endif
          <td>
            {{-- <a href="{{url('/customer/delete')}}/{{$customer['customer_id']}}"><button class="btn btn-danger">Delete</button></a> --}}
            <a href="{{Route('customers.permanent', ['id' => $customer->customer_id])}}"><button class="btn btn-danger w-100">Delete</button></a>
            <a href="{{Route('customers.restore', ['id' => $customer->customer_id])}}"><button class="btn btn-primary w-100">Restore</button></a>
          </td>
        </tr>
          @endforeach
    </tbody>
  </table>
@endsection