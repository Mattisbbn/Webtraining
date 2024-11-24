<table class="mt-4 m-auto">
    <thead>
        <tr class="rounded-3">
            <th class="p-3">Matière</th>
            <th class="p-3">Classe</th>
            <th class="p-3">Date de départ</th>
            <th class="p-3">Durée</th>
            <th class="p-3">Action</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($teacherCalendar as $lesson):  ?>
            <tr>
                <td class="p-3"><?php echo($lesson['name']) ?></td>
                <td class="p-3"><?php echo($lesson['class_name']) ?></td>
                <td class="p-3"><?php echo($lesson['start_datetime']) ?></td>
                <td class="p-3"><?php echo($lesson['lesson_duration']) ?> H</td>
                <td class="p-3">
                    <form action="?call=<?php echo $lesson["id"]?>" method="post">
                        <?php 
                        
                      
                        
                        if($lesson["call_status"] == null){
                           echo "<button name='start-call' value='{$lesson["id"]}'>Déclencher l'appel</button>";
                        }elseif($lesson["call_status"] === "started"){
                            echo "<button name='cancel-call' value='{$lesson["id"]}'>Annuler l'appel</button>";
                        }
                        
                        
                        ?>
                      
                        <input type="hidden" name="action" value="start">
                    </form>
                
                </td>
            </tr>
      <?php endforeach;?>
    </tbody>
</table>
<?php



if(isset($_POST['start-call'])){
    $scheduleId = $_POST['start-call'];
    changeCallStatus($pdo,$scheduleId,"start");
    header("Refresh:0");
    }


 if(isset($_POST['cancel-call'])){
        $scheduleId = $_POST['cancel-call'];
        changeCallStatus($pdo,$scheduleId,"cancel");
        header("Location: ./");
    }
    


if(isset($_GET["call"])){
    require_once("view/home/userViews/teacher/popups/signatures.php");
};

require_once("controller/signatures.php");

?>