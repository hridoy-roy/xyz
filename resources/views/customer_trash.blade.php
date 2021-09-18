@extends('layouts.main')
@push('title')
    <title>Customer Trash</title>
@endpush
@section('main_section')
<button class="btn btn-primary btn-lg"><a class="text-light" href="{{route('customaes')}}" role="button">All Customer</a></button>
<button  class="btn btn-success btn-lg" ><a class="text-light" href="{{route('customaes.trash')}}" role="button">Go  To Trash</a></button>
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
            <a href="{{Route('customers.permanent', ['id' => $customer->customer_id])}}"><button class="btn btn-danger">Delete</button></a>
            <a href="{{Route('customers.restore', ['id' => $customer->customer_id])}}"><button class="btn btn-primary">Restore</button></a>
          </td>
        </tr>
          @endforeach
    </tbody>
  </table>
@endsection