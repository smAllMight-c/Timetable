<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIMETABLE VIEWER</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="project.css">
    <script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
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



    <form action="viewtimetable.php" method="post">
    <div align="center" style="margin-top: 30px">
        <select name="select_department" class="list-group-item">
            
            <?php


                    include 'connection.php';
                    $sql="select name from department";
                         $ret=pg_query($db,$sql);
                         if(!$ret) {
                       echo pg_last_error($db);
                         exit;
                             } 
                         $string = '<option selected disabled>Select Department</option>';
                    while($row = pg_fetch_row($ret)) {
                      $string .='<option value="'.$row[0].'">'.$row[0].'</option>';
                     }
                         echo $string;
                         pg_close($db);
                        ?>

        </select>
       
    </div>
    <div align="center" style="margin-top: 20px">
        <select name="select_semester" class="list-group-item">
            <option selected disabled>Select Semester</option>
            <option value="FY">FY</option>
            <option value="SY">SY</option>
            <option value="TY">TY</option>
        </select>
        <button type="submit"  class="btn btn-success btn-lg" style="margin-top: 5px">VIEW TIMETABLE
        </button>
    </div>

</form>

     


       <!-- Table -->

       <div class="container">
           <div class="row">
               <table class="table table-bordered table-dark"> 
                   <thead >
                    

                    <th style="text-align:center" scope="col">DAYS</th> 
                    <?php
                    
                     include 'connection.php';

                    if(isset($_POST['select_department']) && isset($_POST['select_semester'])) {
                         $dept=$_POST['select_department'];
                         $sem=$_POST['select_semester'];

                        $dq="select did from department where name='$dept'";
                        $dr=pg_query($db,$dq);
                        $did = pg_fetch_row($dr);

                         $sql="select timeslot from allot where  did=$did[0] and semester='$sem' and day='Monday'";
                         $t=pg_query($db,$sql);
                        $ts=pg_fetch_all($t);
                        for($i=0;$i<count($ts);$i++)
                        {
                            $t= $ts[$i]['timeslot'];
                            echo "<th style=\"text-align:center\" scope=\"col\">$t</th>";
                        }
                     
                     
                     
                     
                       }
                    ?>

                   </thead>



                    <tbody id="myTable">
                  
                    <?php
                    
                    include 'connection.php';

                   if(isset($_POST['select_department']) && isset($_POST['select_semester'])) {
                        $dept=$_POST['select_department'];
                        $sem=$_POST['select_semester'];
                        $days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
                       $dq="select did from department where name='$dept'";
                       $dr=pg_query($db,$dq);
                       $did = pg_fetch_row($dr);

                        $sql="select timeslot from allot where  did=$did[0] and semester='$sem' and day='Monday'";
                        $t=pg_query($db,$sql);
                       $ts=pg_fetch_all($t);
                       for($j=0;$j< count($days);$j++)
                       {
                        echo "<tr><th>$days[$j]</th>";
                       for($i=0;$i<count($ts);$i++)
                       {
                           $t= $ts[$i]['timeslot'];
                           $s="select sid from allot where did=$did[0] and semester='$sem' and day='$days[$j]' and timeslot='$t'";
                           $st=pg_query($db,$s);
                           $sid=pg_fetch_row($st);
                           $sq= "select sname from subjects where sid=$sid[0]";
                           $sqt=pg_query($db,$sq);
                           $sname=pg_fetch_row($sqt);
                           echo "<td style=\"text-align:center\" scope=\"row\">$sname[0]</td>";
                       }
                       echo "</tr>";
                       }
                    
                    
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
              <h4 class="modal-title" id="myModalLabel" style="color: white;">Add Subject</h4>
            </div>
            <div class="modal-body">
                <form action="addsubjectform.php" method="POST">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="subjectcode">Subject Code</label>
                            <input type="text" class="form-control" id="subjectcode" name="SC" placeholder="Subject Code ...">
                        </div>


                        <label for="subjectname">Subject's Name</label>
                        <input type="text" class="form-control" id="subjectname" name="SN"
                               placeholder="Subject's Name ...">
                    </div>

                    
                    <div class="form-group">
                        <label for="tdepartment">Department</label>

                        <select class="form-control" id="tdepartment" name="TDP" required >
                        <?php


                    include 'connection.php';
                    $sql=<<<EOF
                    select name from department;
                    EOF;

                         $ret=pg_query($db,$sql);
                         if(!$ret) {
                       echo pg_last_error($db);
                         exit;
                             } 
                         $string = '<option selected disabled>Select</option>';
                    while($row = pg_fetch_row($ret)) {
                      $string .='<option value="'.$row[0].'">'.$row[0].'</option>';
                     }
                         echo $string;
                         pg_close($db);
                        ?>
                            
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="semester">Semester</label>

                        <select class="form-control" id="semester" name="SEM" required>
                            <option selected disabled>Select</option>
                            <option value="FY">FY</option>
                            <option value="SY">SY</option>
                            <option value="TY">TY</option>
                        </select>
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
function myFunction() {
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