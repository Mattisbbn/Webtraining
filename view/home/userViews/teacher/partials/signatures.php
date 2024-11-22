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
                    <form method="get">
                        <button <?php if($event["call_status"] == !null){ echo("disabled");} ?>
                            name="call" value="<?php echo($event['id'])?>" type="submit">Lancer l'appel</button>
                    </form>
                </td>
            </tr>
      <?php endforeach;?>
    </tbody>
</table>
<?php

if(isset($_GET["call"])){
    require_once("view/home/userViews/teacher/popups/signatures.php");
};







require_once("controller/signatures.php");

?>