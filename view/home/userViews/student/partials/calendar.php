
<?php 
require_once("model/calendar.php");
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
        $lessons = fetchClassCalendar($pdo,$UserClassID);
        
        foreach($lessons as $lesson): ?> 
        <tr>
            <td><?php echo($lesson["name"]) ?></td>
            <td><?php echo($lesson["start_datetime"]) ?></td>
            <td><?php echo($lesson["lesson_duration"]) . " H" ?></td>
            <td><a href="?sign=<?php echo($lesson["id"]) ?>">Signer</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</div>


<?php 

if(isset($_GET["sign"])){
require_once("view/home/userViews/student/modal/sign_modal.php");
}