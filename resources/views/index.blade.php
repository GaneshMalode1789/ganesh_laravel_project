<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(isset($data))
        <form class="p-2" action="{{url('/update')}}/{{$id}}" method="post" enctype="multipart/form-data">
        @else
        <form class="p-2" action="{{url('/store')}}" method="post" enctype="multipart/form-data">
        @endif
        @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Employee Name</label>
                <input required type="text" class="form-control" id="name" name="name" value="{{old('name')}}@if(isset($data)){{$data['name']}}@endif" placeholder="Employee Name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input required type="text" class="form-control" id="address" name="address" value="{{old('address')}}@if(isset($data)){{$data['address']}}@endif" placeholder="Address">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input required type="email" class="form-control" id="email" name="email" value="{{old('email')}}@if(isset($data)){{$data['email']}}@endif" placeholder="Email address">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Phone</label>
                <input required type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}@if(isset($data)){{$data['phone']}}@endif" placeholder="Phone">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Date of Birth</label>
                <input required type="date" class="form-control" id="dob" name="dob" max="2010-12-31" value="{{old('dob')}}@if(isset($data)){{$data['dob']}}@endif" placeholder="Date of Birth">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Employee Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/png, image/jpg" placeholder="Employee Image">
            </div>
            <a href="{{url('/')}}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>