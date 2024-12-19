
<table class="mb-5">

    <thead>
        <tr class="rounded-3">
            <th class="p-3">Prénom</th>
            <th class="p-3">Status</th>
        </tr>
    </thead>

    <tbody>

        <?php $students = $signaturesModel->fetchUsersFromLesson($_GET["call"]); foreach ($students as $student): ?>
        <tr>
            <td class="p-2"><?php echo htmlspecialchars($student["username"]); ?></td>
            <td class="p-2"><?php echo htmlspecialchars($signaturesModel->checkSignatures($student["id"], $_GET["call"])); ?></td>
        </tr>
                <?php endforeach;?>
    </tbody>
</table>

<form  method="post">
    <button name="end-call" value="<?php echo($_GET["call"]) ?>" class="d-flex align-items-center justify-content-center p-3 ps-4 pe-4 secondary-color text-white rounded-3 m-auto" type="submit">Mettre fin à l'appel</button>
</form>

<?php 

if(isset($_POST["end-call"])){
    echo("appel terminé");
}

?>