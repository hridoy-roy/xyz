@extends('layouts.main')
@push('title')
    <title>Home</title>
@endpush
@section('main_section')

@php
    $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
@endphp
<h1 class="text-center pt-4">{{$title}} Form<span class="badge badge-primary">New</span></h1>

<pre>

  @php
      // print_r($cust);
  @endphp
</pre>

{{-- <form action="{{url('/')}}/customer" method="POST" class="row g-3 my-0 mx-auto container pt-5" > --}}
<form action="{{$url}}" method="POST" class="row g-3 my-0 mx-auto container pt-5" >
  @csrf
    <div class="col-md-6">
      <label for="inputEmail4" class="form-label">Customer Name</label>
      <input type="text" class="form-control" name="name" placeholder="Customer Name" value="{{$custo->name}}">
    </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" value="{{$custo->email}}">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Point</label>
    <input type="text" class="form-control" name="points" value="{{$custo->points}}">
  </div>

  <div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" name="address" value="{{$custo->address}}">
  </div>

  <div class="col-md-6">
    <label class="form-label">Country</label>
    <select class="form-select" name="country">
      @foreach ($countries as  $country)
      @if (!is_null($custo->country))
       $country = $custo->country;
      @endif
      <option value="{{$country}}">{{ $country }}</option>
      @endforeach
      
    </select>
  </div>
  <div class="col-md-3">
    <label for="inputState" class="form-label">State</label>
    <input type="text" class="form-control" name="state" value="{{$custo->state}}">
  </div>
  <div class="col-md-3">
    <label for="inputZip" class="form-label">City</label>
    <input type="text" class="form-control" name="city" value="{{$custo->city}}">
  </div>

  {{-- <div class="col-md-3">
    <div class="form-check">
      <input type="checkbox" class="form-check-input" name="status">
      <label class="form-check-label" for="gridCheck">
        Active
      </label>
    </div>
  </div> --}}
  <fieldset class="col-md-3">
    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="M" 
        {{$custo->gender == "M" ? "checked" : ""}}
        >
        <label class="form-check-label">
         M
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="F"
        {{$custo->gender == "F" ? "checked" : ""}}>
        <label class="form-check-label">
          F
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="O"
        {{$custo->gender == "O" ? "checked" : ""}}
        >
        <label class="form-check-label">
          O
        </label>
      </div>
    </div>
  </fieldset>

  <div class="col-md-3">
    <label class="form-label">DOB</label>
    <input type="date" class="form-control" name="dob" value="{{$custo->dob}}">
  </div>
  <div class="col-md-12">
    <button type="submit" class="w-100 btn btn-primary">Submit</button>
  </div>
</form>
@endsection
