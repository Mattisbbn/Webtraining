
<?php 
require_once("controller/calendar.php");
require_once("model/fetchClass.php");
require_once("class/user.php");
$userId = $currentUser->getUserID();
$UserClassID = fetchUserClass($pdo, $userId);
?>
<div class="white rounded-3 col-8 d-flex flex-column mt-4 m-auto">
    <table>
        <thead>
            <tr class="rounded-3">
                <th class="p-3">Matière</th>
                <th class="p-3">Date de départ</th>
                <th class="p-3">Durée</th>
                <th class="p-3">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $lessons = $calendarModel->fetchCalendar($UserClassID);
            foreach($lessons as $lesson): ?> 
            <tr>
                <td><?php echo($lesson["name"]) ?></td>
                <td><?php echo($lesson["start_datetime"]) ?></td>
                <td><?php echo($lesson["lesson_duration"]) . " H" ?></td>
                <td>    
                    <form>
                        <button name="sign" <?php if($lesson["call_status"] !== "started"){echo "disabled";}?> value="<?php echo($lesson["id"])?>">Signer</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>