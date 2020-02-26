

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
                    <h3>ADD TIMETABLE FOR :</h3>
                </div>

            </div>
        </div>
        


         <!-- Modal -->
   
                    <form action="addtimeslot.php" method="POST">
                   
                     <div class="form-group">
                        <label for="tdepartment">Select Department</label>

                        <select class="form-control" id="tdepartment" name="TDP" required>
                        <?php


                    include 'connection.php';
                    $sql="select name from department";

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
                        <label for="semester">Select Semester</label>

                        <select class="form-control" id="semester" name="SEM" required>
                            <option selected disabled>Select</option>
                            <option value="FY">FY</option>
                            <option value="SY">SY</option>
                            <option value="TY">TY</option>
                        </select>
                    </div>
                        
                        <div >
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>

                </div>

    <script>
function getvalue() {
    $("#tdepartment").on("change",function() {
        var value=$(this).val();
        return value;
    })
}


</script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>

</html>