<?php 
require_once("model/fetchClass.php");
require_once("model/calendar.php");
$userId = $currentUser->getUserID();
$UserClassID = fetchUserClass($pdo, $userId);
?>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script src="public/script/calendar.js"></script>
<script>
    const events = <?php echo fetchUserClass($pdo, $userId);?>;
</script>



<div class="d-flex rounded-3 border-0">
    <div class="col-10 m-auto rounded-3 border-0 " id='calendar'></div>
</div>