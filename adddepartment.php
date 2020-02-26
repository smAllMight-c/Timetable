<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIMETABLE VIEWER</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
    <link rel="stylesheet" href="project.css">
</head>
<body>
    
    <!-- Navbar -->

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-c" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a href="#" class="navbar-brand"><i class="fas fa-graduation-cap"></i> KVN NAIK </a> -->
            </div>

            <div class="collapse navbar-collapse" id="navbar-c">
                <ul class="nav navbar-nav">
                    <li><a href="adddepartment.php"><i class="fas fa-school"></i> ADD DEPARTMENTS</a></li>
                    <li><a href="addteacher.php"><i class="far fa-id-card"></i> ADD TEACHERS</a></li>
                    <li><a href="addsubject.php"><i class="fas fa-book"></i> ADD SUBJECTS</a></li>
                    <li><a href="addclassroom.php"><i class="fas fa-chalkboard"></i> ADD CLASSROOM</a></li>
                    <li><a href="addtime.php"><i class="fas fa-chalkboard"></i> ALLOT</a></li>
                    <li><a href="viewtimetable.php"><i class="fas fa-table"></i> TIMETABLE</a></li>
                </ul>

                <ul class="navbar-nav nav navbar-right">

                    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>

                </ul>

            </div>

        </div>

    </nav>


    <!-- NAVBAR END -->



    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="content">
                    <input type="file" name="file" id="file">
                     <button class="btn btn-primary btn-lg">IMPORT EXCEL</button>
                </div>

            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div id="content">
                    <button class="btn btn-success btn-lg " data-toggle="modal" data-target="#myModal"> ADD DEPARTMENT</button>
                </div>

            </div>
        </div>
        
       <div class="row">
            <div class="col-lg-12">
                <div id="content">
                    <h3>Department Information</h3>
                </div>

            </div>
       </div>

       <div class="search__container">
            <div id="content">
                <input class="search__input" id="myInput" onkeyup="myFunction()" type="text" placeholder="Search">

            </div>
            </div>
      
       <!-- TABLE -->
       <div>
           <div class="row">
               <table class="table table-bordered table-dark"> 
                   <thead >
                    <th scope="col">Department No.</th>
                    <th scope="col">Department Name</th>
                    <th scope="col">Action</th>


                   </thead>


                   <tbody id="myTable">
                   <?php
                   include 'connection.php';

                 $sql = "Select * from department" ;
                    $ret = pg_query($db, $sql);
                if (!$ret) {
                     echo pg_last_error($db);
                        exit;
                        }
                while ($row = pg_fetch_row($ret)) {
                    echo "<tr><th scope=\"row\">{$row[0]}</th>
                    <td>{$row[1]}</td>
                   <td>
                   <button class=\"btn btn-danger btn-sm\" id=\"$row[0]\"> Delete</button> </td>
                    </tr>\n";
                }
   
                    ?>
                   </tbody>
               </table>
           </div>
       </div>


       <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog " role="document">
          <div class="modal-content" >
            <div class="modal-header" style="background: #2c3e50">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
              <h4 class="modal-title" id="myModalLabel" style="color: white;">Add Department</h4>
            </div>
            <div class="modal-body">
                <form action="adddepartmentform.php" method="POST">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="DNO">Department No</label>
                            <input type="text" class="form-control" id="departmentno" name="DNO" placeholder="Department No ...">
                        </div>


                        <label for="departmentname">Department's Name</label>
                        <input type="text" class="form-control" id="departmentname" name="DN"
                               placeholder="Department's Name ...">
                    </div>

                    <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
                    
                    
                </form>
            </div>
            
          </div>
        </div>










    </div>


    <script>
        $(document).ready(function(){
        $("td button").click(function(){
            var show_id=$(this).attr('id');

            if(confirm("Are you sure you wish to delete?")) {
                $.ajax({
                    type:"POST",
                    url:"deletedepartment.php",
                    data: {show_id},
                    success:function() {
                        location.reload();
                    },
                    error:function(){
                        alert("Deletion Failed");
                    }
                })
            }
            
        });
        });
    </script>



    
    <script>
function myFunction() {
  // Declare variables
  $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
}
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    
</body>
</html>