<div class="secondary-color rounded-3 p-3 position-absolute top-50 start-50 ms-5 translate-middle">

<h2 class="text-center fw-bold">Appel</h2>

<table>
    <thead>
        <tr class="rounded-3">
            <th class="p-3">Prénom</th>
            <th class="p-3">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr class="">
            <?php $students = fetchLessonsStudents($pdo,$event["class_id"]);
            foreach($students as $student):?> 
            <td class="p-3"><?php echo($student["username"]);?></td>
            <td class="p-3"></td>
            <?php endforeach; ?>
        </tr>
    </tbody>
</table>
</div>