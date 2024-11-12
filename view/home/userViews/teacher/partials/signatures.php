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
        <?php foreach($teacherCalendar as $event):  ?>
            <tr class="navbuttons">
                <td class=" p-3"><?php echo($event['name']) ?></td>
                <td class=" p-3"><?php echo($event['class_name']) ?></td>
                <td class=" p-3"><?php echo($event['start_datetime']) ?></td>
                <td class=" p-3"><?php echo($event['lesson_duration']) ?> H</td>
                <td class=" p-3">
                    <form method="post">
                        <button
                        <?php if($event["call_status"] == !null){
                            echo("disabled");
                        } ?>
                        name="start-call" value="<?php echo($event['id'])?>" type="submit">Lancer l'appel</button>
                    </form>
                </td>
            </tr>
           
      <?php endforeach; ?>
       
    </tbody>
</table>

<div>
    <form method="post">
        <button name="cancel-call">Annuler l'appel</button>
        <button name="confirm-call">Valider l'appel</button>
    </form>
</div>

<?php

if(isset($_POST['start-call'])){
$scheduleId = $_POST['start-call'];
changeCallStatus($pdo,$scheduleId,"start");
header("Refresh:0");
}

