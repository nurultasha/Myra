<?php

include("connection.php"); //to create connection
session_start(); //to start connection

if(isset($_POST["Save"])){ //get data when button is clicked

    //Validation 
    $id = $_POST["secNumber"]; //assign secID inserted as id
    
    $sql2 = "SELECT * FROM section where sec_num = '".$id."'"; //sql statement to search id in section table
    $qry = mysqli_query($conn, $sql2); //performs a sql query against a database
    $row = mysqli_num_rows($qry); //to retrieves the number of rows after do sql and check if id available
    
    if($row > 0){ //output if id available 
        // check existing section number
        //$statement = $conn->prepare('SELECT * FROM section WHERE sec_num = '$id'');
        //$statement->execute([$id => $data['sec_num']]);

        //$statement = "SELECT * FROM section WHERE sec_num = '$id'";
        //$qry = mysqli_query($conn,$statement);
        //$data = mysqli_num_rows($qry);

        /*header('Location: section.php');
        ?>
            <script type="text/javascript">
            alert("Already inserted section number <?php $row['sec_num']; ?>");//(Section number <'?php echo $row['sec_num']; ?>) already exists. Please choose a new section number to be inserted.");
            window.location.href = "sections.php";
            </script>
        <?php */
        //$sectionNumber = $row['sec_num'];
        
        ?>

            <script type="text/javascript">
                var secNum = "<?php echo $id; ?>"
                alert("Already inserted section number (Section" + secNum + ") already exists. Please choose a new section number to be inserted.")
                window.location.href = "sectionsAdd.php"
            </script>;
        <?php
        
        
        //echo 'Inserted section number already exists.';
        //header("Location: sections.php"); //go to sectionsAdd
        // header('Location: section.php');

        //echo "Data already exists";
        //echo $id; //display available id
        //exit;
    }else{ //process if id not available

        //$secno = $_POST["SecID"]; //put SecID value into secno from sectionsAdd
        $secnumber = $_POST["secNumber"]; //put SecNumber value into secnumber
        $sectionMalay = $_POST["SecTitleMalay"]; //put SecTitleMalay value into sectionMalay
        $sectionEng = $_POST["SecTitleEng"]; //put SecTitleEng value into sectionEng
        $id = $_SESSION['USER_ID'];
    
        $sql = "INSERT INTO section (sec_ID, sec_num, secTitleMalay,secTitleEng,USER_ID) values (0,'$secnumber', 
        '$sectionMalay', '$sectionEng', '$id')"; //insert all data into section
    
        if(mysqli_query($conn,$sql)){ //if do sql query insert data
    
            header("Location: sections.php"); //go to sectionsAdd
          
        }else{
            echo "error"; //if not
        }


    }
}
?>