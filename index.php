<!doctype html>
<html lang="en">

<head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">



 <title>Hello, world!</title>
</head>

<body>

 <div class="px-4 py-5 my-5 text-center">
  <h1 class="display-5 fw-bold">Update modal</h1>
  <div class="col-lg-6 mx-auto">
   <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most
    popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive
    prebuilt components, and powerful JavaScript plugins.</p>
   <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#studentaddmodal">
     Launch demo modal
    </button>
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



















 <!-- Option 1: Bootstrap Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>