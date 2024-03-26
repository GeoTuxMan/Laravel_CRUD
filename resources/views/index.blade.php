<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Laravel 10 -  Ajax & DataTables -  CRUD</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" >

</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CRUD Operations: Laravel 10 + Modal + Ajax </h2>
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#employee-modal">Add Employee</button>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope='col'>Id</th>
                    <th scope='col'>Name</th>
                    <th scope='col'>Email</th>
                    <th scope='col'>Address</th>
                    <th scope='col'>Created at</th>
                    <th class='text-right'>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee )
                  <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->created_at }}</td>
                    <td>
                        <a href="#" class="btn btn-success editbtn">Edit</a>
                        <a href="#" class="btn btn-success deletebtn">Delete</a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="employee-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Employee</h5>

            </div>
            <div class="modal-body">
                <form id="EmployeeForm" name="EmployeeForm" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-12">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required="">
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="btn-save">Save changes</button></div>
        </div>
    </form>
    </div>
</div>
  <!-- end modal -->

<!-- Edit Modal -->
<div class="modal fade" id="edit-employee-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Employee</h5>

            </div>
            <div class="modal-body">
                <form id="EditEmployeeForm" name="EmployeeForm" class="form-horizontal">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Id</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="id" name="id" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="name2" name="name2"  required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-12">
                            <input type="email" class="form-control" id="email2" name="email2"  required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="address2" name="address2" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Created At</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="created_at" name="created_at" required="">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="btn-save">Update changes</button></div>
        </div>
    </form>
    </div>
</div>
  <!-- end modal -->

  <!-- delete modal -->
  <div class="modal fade" id="delete-employee-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Employee</h5>

            </div>
            <div class="modal-body">
                <form id="DeleteEmployeeForm" name="EmployeeForm" class="form-horizontal">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <input type="hidden" name="id" id="delete_id">
                    <p> You want to delete this data ?</p>




            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="btn-save">Delete</button>
            </div>

    </form>
    </div>
</div>
</div>
</div>
<!-- end delete -->
<script src="https://code.jquery.com/jquery-3.7.1.js"  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="  crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $('.deletebtn').on('click', function() {
        $('#delete-employee-modal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);
        $('#delete_id').val(data[0]);
    });

    $('#DeleteEmployeeForm').on('submit', function(e){
        e.preventDefault();

        var id = $('#delete_id').val();

        $.ajax({
              type:"DELETE",
              url:"/employeedelete/"+id,
              data:$('#DeleteEmployeeForm').serialize(),
              success: function (response) {
                console.log(response);
                $('#delete-employee-modal').modal('hide');
                alert('Data Deleted');
                location.reload();
              },
              error: function(error){
                console.log(error);
                alert("data not deleted");
              }
            });
    });
</script>
<script>
 $(document).ready( function () {
    $('.editbtn').on('click', function() {
        $('#edit-employee-modal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);
        $('#id').val(data[0]);
        $('#name2').val(data[1]);
        $('#email2').val(data[2]);
        $('#address2').val(data[3]);
        $('#created_at').val(data[4]);
    });

    $('#EditEmployeeForm').on('submit', function(e){
        e.preventDefault();

        var id = $('#id').val();

        $.ajax({
              type:"PUT",
              url:"/employeeupdate/"+id,
              data:$('#EditEmployeeForm').serialize(),
              success: function (response) {
                console.log(response);
                $('#edit-employee-modal').modal('hide');
                alert('Data Updated');
                location.reload();
              },
              error: function(error){
                console.log(error);
                alert("data not updated");
              }
            });
    })
 });
</script>
<script type="text/javascript">
    $(document).ready( function () {


        $('#EmployeeForm').on('submit', function(e){
            e.preventDefault();
            $.ajax({
              type:"POST",
              url:"/employeeadd",
              data:$('#EmployeeForm').serialize(),
              success: function (response) {
                console.log(response);
                $('#employee-modal').modal('hide');
                $('#EmployeeForm')[0].reset();
                alert('Data Saved');
                location.reload();
              },
              error: function(error){
                console.log(error);
                alert("data not saved");
              }
            });
        });


    });
</script>
</body>
</html>
