<?php require_once("controller/signatures.php");?>

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

                        }elseif($lesson["call_status"] === "started"){
                            echo " <a href='?call={$lesson['id']}'>Voir l'appel</a>";
                        
                        }elseif($lesson["call_status"] === "finished"){
                            echo("<button name='cancel-call' value='{$lesson["id"]}'>Annuler l'appel</button>");
                          
                        }
                        ?>
                       
                        <input type="hidden" name="action" value="start">
                    </form>
                </td>
            </tr>
      <?php endforeach;?>
    </tbody>
</table>

