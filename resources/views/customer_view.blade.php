@extends('layouts.main')
@push('title')
    <title>Home</title>
@endpush
@section('main_section')

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Gender</th>
        <th scope="col">Address</th>
        <th scope="col">Country</th>
        <th scope="col">City</th>
        <th scope="col">Status</th>
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
              echo ($customer['city']);
          @endphp
          </pre> --}}
        <tr>
          <th scope="row">{{$customer['customer_id']}}</th>
          <td>{{$customer['customer_name']}}</td>
          <td>{{$customer['email']}}</td>
          <td>{{$customer['gender']}}</td>
          <td>{{$customer['address']}}</td>
          <td>{{$customer['country']}}</td>
          <td>{{$customer['city']}}</td>
          <td>{{$customer['status']}}</td>
        </tr>
          @endforeach
    </tbody>
  </table>
@endsection