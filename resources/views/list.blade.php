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
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    <div class="container">
        <div class="row py-2">
            <div class="col-md-8">
                <a class="btn btn-primary btn-sm" href="{{url('/create')}}">Add Employee</a>
            </div>
            <div class="col-md-3 text-right">
                <input type="text" id="search" name="search" placeholder="Search here....">
            </div>
            <div class="col-md-1 text-right">
                <button class="btn btn-success btn-sm">Search</button>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Employee Id</th>
                    <th>Employee Name</th>
                    <th>Address</th>
                    <th>Email Address</th>
                    <th>Phone</th>
                    <th>Date of Birth</th>
                    <th>Employee Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($data) && count($data) > 0)
                @foreach($data as $key => $value)
                <tr>
                    <td>{{$value['id']}}</td>
                    <td>{{$value['name']}}</td>
                    <td>{{$value['address']}}</td>
                    <td>{{$value['email']}}</td>
                    <td>{{$value['phone']}}</td>
                    <td>{{$value['dob']}}</td>
                    <td><img height="20" width="20" src="{{ asset('uploads') }}/{{$value['image']}}" /></td>
                    <td><a href="{{url('edit')}}/{{$value['id']}}">Edit</a></td>
                    <td><a href="{{url('delete')}}/{{$value['id']}}">Delete</a></td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td class="text-center" colspan="9">No Record Found</td>
                </tr>
                @endif
            </tbody>
        </table>
        {!! $data->links() !!}
    </div>
    <script>
        $("#search").on("blur", function() {
            var name = $(this).val();
            if(name != "") {
                window.location.href="{{url('/')}}/employee/search/"+name;
            }
        });
    </script>
</body>

</html>