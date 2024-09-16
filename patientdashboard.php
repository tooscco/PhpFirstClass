<?php
 require 'patientconnect.php';
 session_start();
 echo $_SESSION['appointment_id'];
 $id= $_SESSION['appointment_id'];

 $query="SELECT * FROM appointment_table WHERE appointment_id=$id ";
 $dbconnect=$connect->query($query);
 $user=$dbconnect->fetch_assoc();
//  print_r($user['firstName']);

if(isset($_POST['submit'])){
    $title= $connect->real_escape_string($_POST['title']);
    $description= $connect->real_escape_string($_POST['description']);

    $query="INSERT INTO `note_table` (`appointment_id`, `title`, `text`) VALUES ('$id' , '$title', '$description' )";

    $dbconnect=$connect->query($query);  
    if(!$dbconnect){
        echo "Data not Inserted:".$connect->error;
    }
    else{
        echo "Data inserted successfully";
    }


    
}
$query="SELECT * FROM note_table WHERE appointment_id=$id";
$dbconnect=$connect->query($query);
$notes=$dbconnect->fetch_all(MYSQLI_ASSOC);

// print_r($notes);

$profile=$user['picture'];
$editnote = [];

if(isset($_POST['submit_id'])){
    echo $_SESSION['note_id']= $_POST['note_id'];
    $edit=$_SESSION['note_id'];
    $query="SELECT * FROM note_table WHERE note_id =$edit ";
    $dbnote=$connect->query($query);
    // print_r($dbnote);
    if($dbnote->num_rows>0){
        $editnote=$dbnote->fetch_assoc();
        $showModal = true;
        // print_r($editnote);
    }
    else{
        echo "Data not found";
        $showModal = false;
    }

}

if(isset($_POST['submit_note'])){
    $edit=$_SESSION['note_id'];
    $titlesec=$connect->real_escape_string($_POST['titletwo']);
    $descriptionsec=$connect->real_escape_string($_POST['descriptiontwo']);

    $query="UPDATE `note_table` SET `title`= '$titlesec' , `text`= '$descriptionsec' WHERE `note_id` =$edit";
    $dbcon=$connect->query($query);
    if($dbcon){
        echo 'working';
    }
    else{
        echo 'not working';
    }
}


if(isset($_POST['submit_del'])){
    $del = intval($_POST['note_id']);
    $query="DELETE FROM `note_table` WHERE `note_id`= $del  ";
    $dbcon=$connect->query($query);
    if($dbcon){
        echo 'Note deleted successfully';
    }
    else{
        echo 'Failed to delete note:'.$connect->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div>
        <p>Welcome <span> <?php echo $user['firstName']?> </span></p>
    </div>
    <div class='row d-flex justify-content-between'>
    <div class='col-4 ms-5 ps-5 mt-5'>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method='POST' class='m-2 row'>
        <input type="text" placeholder='Title' class='form-control mb-4 shadow-none' name='title' required>
        <textarea placeholder='Description' name='description' class='form-control shadow-none mb-3' rows='15' cols='30' required></textarea>
        <input type="submit" name='submit' value='save' class='btn btn-primary'>
        </form>

<!-- Modal -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content w-75 h-75">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Note</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" placeholder="Title" class="form-control mb-4 shadow-none" name="titletwo" value="<?php echo isset($editnote['title']) ? htmlspecialchars($editnote['title']) : ''; ?>" required>
                    <textarea placeholder="Description" name="descriptiontwo" class="form-control shadow-none mb-3" rows="9" cols="30" required><?php echo isset($editnote['text']) ? htmlspecialchars($editnote['text']) : ''; ?></textarea>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="submit_note" class="btn btn-primary" value="Save changes">
                </div>
            </div>
        </div>
    </div>
</form>

<?php if (isset($showModal) && $showModal): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {});
            myModal.show();
        });
    </script>
<?php endif; ?>

    </div>
    <div class='col-4'>
        <h5>Profile Picture</h5>
        <div>
            <?php
            echo "<img src='uploads/".$profile."' alt='image' style='width:150px;height:150px; border-radius:50%; margin:10px;'>"; ?>
        </div>
    </div>
    </div>

    <div class='row ms-5 ps-5 mt-5'>
        <div class='col-8 '>
            <div <?php if(count($notes)<1):?> >
                <p>Empty notes</p>
                <?php endif; ?>
            </div>
            <table class='table table-striped' <?php if(count($notes)>0) ?> >
                <tr>
                    <th>S/N</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php foreach ($notes as $index=> $note):?>
                <tr>
                    <td><?php echo htmlspecialchars ($index+1) ; ?></td>
                    <td><?php echo htmlspecialchars ($note['title']); ?></td>
                    <td><?php echo htmlspecialchars ($note['text']); ?></td>
                    <td>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input type="hidden" name="note_id" value="<?php echo $note['note_id']; ?>">
                        <button type="submit" name="submit_id" class="btn btn-success">Edit</button>
                        </form>
                    </td>
                    <td>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" style="display:inline;">
                <input type="hidden" name="note_id" value="<?php echo $note['note_id']; ?>">
                <input type="submit" name="submit_del" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this note?');">
            </form>
        </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <div class='ms-5 ps-5'>
        <form action="picture.php" method='POST' enctype='multipart/form-data'>
            <input type="file" name="picture">
            <input type="submit" name='submit' value='Upload'>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>