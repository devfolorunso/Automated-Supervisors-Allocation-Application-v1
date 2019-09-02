<?php require_once 'core/init.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title></title>
  <link rel="shortcut icon" href="src/media/favico.ico" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles-->
</head>
<body>
<?php
$session= input::get('session');
$Psup_id = input::get('Psup_id');
$sup_name = input::get('sup_name');

header("Content-Type: application/vnd.ms-word");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=ProjectSeminarReport.doc");

?>

	 <h2 style="text-align:center; text-transform: uppercase; font-weight: bold; font-size: 18px;" ><b><u>PROJECT/SEMINAR ALLOCATION LIST FOR <?php echo $sup_name;?></u></b></h2>
	 <div class="table-responsive">
       <table border="1" width="100%" cellspacing="2" style="text-transform:uppercase; font-size:16px;">
<?php
 $generatePseminar = DB::getInstance()->query("
              SELECT *
              FROM tblprojectSeminar
              WHERE session = ?
              AND sup_id=?",
              array(
                'session' =>$session,
                'sup_id' => $Psup_id
                ));

                if(!$generatePseminar->count())
                {
            
            echo '<div class="alert alert-warning text-capitalize" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span><marquee>TABLE IS EMPTY!!!  TABLE IS EMPTY!! TABLE IS EMPTY!!TABLE IS EMPTY!!</marquee></div>';
      
                }else
                {
                ?>
                  <thead>
                    <tr>
                      <th>Supervisor</th>
                      <th>Matric</th>
                      <th>Level</th>
                    </tr>
                  </thead>
               <?php
                foreach($generatePseminar->results() as $generatePseminar)
                {
                ?>
                  <tbody>
                    <tr>
    
                     <td style="text-align:center; text-transform: capitalize;">
                        <?php echo $generatePseminar->title .' '. $generatePseminar->surname;?>    
                      </td>
    
                      <td style="text-align:center; text-transform:capitalize;">
                        <?php echo $generatePseminar->matric_no;?>
                      </td>



                     <td style="text-align:center; text-transform:capitalize;">

                      <?php echo $generatePseminar->level .'II ' . $generatePseminar->programme;?>

                    </td>

                    </tr>
                <?php
              }

            } 
  
  
            ?>
                  </tbody>
                </table>
                </div>

</body>
</html>