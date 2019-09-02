<?php
      $total ='13';
      
      $s20182019 = 's20182019';

      $getSup = DB::getInstance()->query("
        SELECT * FROM tblsupervisors
        WHERE session = ?
        ORDER BY RAND()
        LIMIT $total",
      array(
      'session' =>$s20182019
      ));

      if($getSup->count())                 {

      foreach ($getSup->results() as $getSup) {
  
            echo'<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-center text-uppercase mb-1">'.$getSup->title .' '. $getSup->surname .' '. $getSup->firstname .'</div>';
?>


<?php
      $Csup_id=$getSup->sup_id;
        echo'
          <div class="h6 mb-0  text-center text-gray-800">';
        
        $supCount = DB::getInstance()->query(" 
              SELECT matric_no from tblsiwes
              where sup_id= ?
              AND session=  ?", array(
                    'sup_id' =>$Csup_id,
                    'session' =>$s20182019
              ));

         $totSup = $supCount->count();
        echo'<a href="view-siwes-allotees.php?Csup_id='.$Csup_id.'&&session='.$s20182019.'&&sup_name='.$getSup->title .' '. $getSup->surname .' '. $getSup->firstname .'">No Of SIWES Students : <b>'. $totSup .'</b></a>';

                    echo'
           </div>'
?>


<?php
            $Psup_id=$getSup->sup_id;
            echo'
            <div class="h6 mb-0  text-center  text-gray-800">';
            $PsupCount = DB::getInstance()->query(" 
            SELECT matric_no from tblprojectseminar
            where sup_id= ?
            AND session=  ?", array(
            'sup_id' =>$Psup_id,
            'session' =>$s20182019
            ));
            $totPSup = $PsupCount->count();
            echo'<a href="view-project-allotees.php?Psup_id='.$Psup_id.'&&session='.$s20182019.'&&sup_name='.$getSup->title .' '. $getSup->surname .' '. $getSup->firstname .'">No Of Project/Seminar Students : <b>'. $totPSup .'</b></a>';

            echo'
   </div>

                    </div>
                    <div class="col-auto">

                    </div>
                  </div>
                </div>
              </div>
            </div>';
            }
}?>