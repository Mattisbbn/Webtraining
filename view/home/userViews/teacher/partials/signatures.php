<?php require_once("controller/signatures.php");


?>

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
        
        <?php
        $teacherCalendar = $teacherModel->fetchTeacherCalendar($userId);
        
        foreach($teacherCalendar as $lesson):  ?>
            <tr>
                <td class="p-3"><?php echo($lesson['name']) ?></td>
                <td class="p-3"><?php echo($lesson['class_name']) ?></td>
                <td class="p-3"><?php echo($lesson['start_datetime']) ?></td>
                <td class="p-3"><?php echo($lesson['lesson_duration']) /60 ?> H</td>
                <td class="p-3">
                    <form action="?call=<?php echo $lesson["id"]?>" method="post">
                        <?php 

                        if($lesson["call_status"] == null){
                           echo "<button name='start-call' value='{$lesson["id"]}'>Déclencher l'appel</button>";
                           echo "<input type='hidden' name='call-class-id' value='{$lesson["class_id"]}'>";
                           $call_status = null;

                        }elseif($lesson["call_status"] === "started"){
                            echo " <a href='?call={$lesson['id']}'>Voir l'appel</a>";
                            $call_status = "started";
                        
                        }elseif($lesson["call_status"] === "finished"){
                            echo("<p>L'appel est fini</p>");
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

if(isset($_GET["call"])){
    $call_id = $_GET["call"];
    require_once("view/home/userViews/teacher/modal/signatures.php");
};
