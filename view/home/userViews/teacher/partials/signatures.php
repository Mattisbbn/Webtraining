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
            <tr>
                <td class="p-3"><?php echo($event['name']) ?></td>
                <td class="p-3"><?php echo($event['class_name']) ?></td>
                <td class="p-3"><?php echo($event['start_datetime']) ?></td>
                <td class="p-3"><?php echo($event['lesson_duration']) ?> H</td>
                <td class="p-3">
                    <form method="post">
                        <button <?php if($event["call_status"] == !null){ echo("disabled");} ?>
                            name="start-call" value="<?php echo($event['id'])?>" type="submit">Lancer l'appel</button>
                    </form>
                    <form method="post">
                            <button value="<?php echo($event['id'])?>" name="cancel-call">Annuler l'appel</button>
                            <button value="<?php echo($event['id'])?>" name="confirm-call">Valider l'appel</button>
                    </form>
                </td>
            </tr>
      <?php endforeach;?>
    </tbody>
</table>
<?php require_once("view/home/userViews/teacher/popups/signatures.php");?>


<?php
require_once("controller/signatures.php");
require_once("view/home/userViews/teacher/popups/signatures.php");






?>