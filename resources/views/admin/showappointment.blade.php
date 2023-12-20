

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

                <th style="padding:10px;">Patient Name</th>
                <th style="padding:10px;">Patient Email</th>
                <th style="padding:10px;">Phone</th>
                <th style="padding:10px;">Doctor Name</th>
                <th style="padding:10px;">Date</th>
                <th style="padding:10px;">Message</th>
                <th style="padding:10px;">Status</th>
                <th style="padding:10px;">Approve</th>
                <th style="padding:10px;">cancel</th>
                <th style="padding:10px;">Send Mail</th>
            </tr>

            @foreach($data as $appoint)

            <tr align="center" style="border: 1px solid white;">
                <td>{{$appoint->name}}</td>
                <td>{{$appoint->email}}</td>
                <td>{{$appoint->phone}}</td>
                <td>{{$appoint->doctor}}</td>
                <td>{{$appoint->date}}</td>
                <td>{{$appoint->message}}</td>
                <td>{{$appoint->status}}</td>
                <td><a href="{{url('approved', $appoint->id)}}" class = "btn btn-success">
                    Approve
                </a></td>
                <td><a href="{{url('cancelled', $appoint->id)}}" class = "btn btn-danger">
                    Cancel
                </a></td>
                <td><a href="{{url('emailview', $appoint->id)}}" class = "btn btn-primary">
                    Send Mail
                </a></td>
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