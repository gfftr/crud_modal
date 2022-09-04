<!doctype html>
<html lang="en">

<head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">


 <title>Hello, world!</title>
</head>

<body>

 <div class="px-4 py-5 my-5 text-center">
  <h1 class="display-5 fw-bold">Update modal</h1>
  <div class="col-lg-6 mx-auto">


   <div class="card">
    <h2> PHP CRUD Bootstrap MODAL (POP UP Modal) </h2>
   </div>
   <div class="card">
    <div class="card-body">
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
      ADD DATA
     </button>
    </div>
   </div>



   <div class="card">
    <div class="card-body">


     <?php
     $connection = mysqli_connect("localhost", "root", "");
     $db = mysqli_select_db($connection, 'students');
     $query = "SELECT * FROM student";
     $query_run = mysqli_query($connection, $query);
     ?>


     <table id="datatableid" class="table table-bordered table-dark">
      <thead>
       <tr>
        <th scope="col"> ID</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name </th>
        <th scope="col"> Course </th>
        <th scope="col"> Contact </th>
        <th scope="col"> VIEW </th>
        <th scope="col"> EDIT </th>
        <th scope="col"> DELETE </th>
       </tr>
      </thead>


      <?php
      if ($query_run) {
       foreach ($query_run as $row) {
      ?>

      <tbody>
       <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['fname']; ?> </td>
        <td><?php echo $row['lname']; ?></td>
        <td><?php echo $row['course']; ?> </td>
        <td><?php echo $row['contact']; ?> </td>
        <td>
         <button type="button" class="btn btn-info viewbtn"> VIEW </button>
        </td>
        <td>
         <button type="button" class="btn btn-success editbtn"> EDIT </button>
        </td>
        <td>
         <button type="button" class="btn btn-danger deletebtn"> DELETE </button>
        </td>
       </tr>
      </tbody>

      <?php
       }
      } else {
       echo "No Record Found";
      }
      ?>

     </table>
    </div>
   </div>


  </div>
 </div>









 <!-- Modal -->
 <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
    <div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel">Add Student Data </h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
     </button>
    </div>

    <form action="insertcode.php" method="POST">

     <div class="modal-body">
      <div class="form-group">
       <label> First Name </label>
       <input type="text" name="fname" class="form-control" placeholder="Enter First Name">
      </div>

      <div class="form-group">
       <label> Last Name </label>
       <input type="text" name="lname" class="form-control" placeholder="Enter Last Name">
      </div>

      <div class="form-group">
       <label> Course </label>
       <input type="text" name="course" class="form-control" placeholder="Enter Course">
      </div>

      <div class="form-group">
       <label> Phone Number </label>
       <input type="number" name="contact" class="form-control" placeholder="Enter Phone Number">
      </div>
     </div>
     <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
     </div>
    </form>

   </div>
  </div>
 </div>

 <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
 <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
    <div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel"> Edit Student Data </h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
     </button>
    </div>

    <form action="updatecode.php" method="POST">

     <div class="modal-body">

      <input type="hidden" name="update_id" id="update_id">

      <div class="form-group">
       <label> First Name </label>
       <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter First Name">
      </div>

      <div class="form-group">
       <label> Last Name </label>
       <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Last Name">
      </div>

      <div class="form-group">
       <label> Course </label>
       <input type="text" name="course" id="course" class="form-control" placeholder="Enter Course">
      </div>

      <div class="form-group">
       <label> Phone Number </label>
       <input type="text" name="contact" id="contact" class="form-control" placeholder="Enter Phone Number">
      </div>
     </div>
     <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
     </div>
    </form>

   </div>
  </div>
 </div>





 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>



 <script>
 $().ready(function() {
  $('.editbtn').on('click', function() {
   $('#editmodal').modal('show');

   $tr = $(this).closest('tr');

   var data = $tr.children("td").map(function() {
    return $(this).text();
   }).get();

   $('#update_id').val(data[0]);
   $('#fname').val(data[1]);
   $('#lname').val(data[2]);
   $('#course').val(data[3]);
   $('#contact').val(data[4]);

  });
 })
 </script>

</body>

</html>