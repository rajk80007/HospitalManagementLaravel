<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div align="center" style="padding-top:100px;">
                <table>
                    <tr style="border: 1px solid white;">

                        <th style="padding:10px;">Doctor Name</th>
                        <th style="padding:10px;">Phone</th>
                        <th style="padding:10px;">Speciality</th>
                        <th style="padding:10px;">Room No.</th>
                        <th style="padding:10px;">Image</th>
                        <th style="padding:10px;">Delete</th>
                        <th style="padding:10px;">Update</th>

                    </tr>
                    @foreach($data as $doctor)

                    <tr align="center" style="border: 1px solid white;">
                        <td>{{$doctor->name}}</td>
                        <td>{{$doctor->phone}}</td>
                        <td>{{$doctor->speciality}}</td>
                        <td>{{$doctor->room}}</td>
                        <td><img height="80" width="80" src="doctorimage/{{$doctor->image}}" alt=""></td>
                        <td><a class="btn btn-danger" href="{{url('deletedoctor', $doctor->id)}}" onclick= "confirm('Are you sure, you want to delete this doctor?')">Delete</a></td>
                        <td><a class="btn btn-primary" href="{{url('updatedoctor', $doctor->id)}}">Update</a></td>
                    </tr> 
                    @endforeach
                </table>
            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>