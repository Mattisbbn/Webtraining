



<div class="white border rounded-3 p-3 position-absolute top-50 start-50 ms-5 translate-middle">

    <div class="d-flex justify-content-center">
        <h2 class="text-center fw-bold">Appel</h2>
        <form method="post">
            <button name="close-popup"><h3>X</h3></button>
        </form>
    </div>
    <table>
        <thead>
            <tr class="rounded-3">
                <th class="p-3">Prénom</th>
                <th class="p-3">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php $students = fetchUsersFromLesson($pdo, $call_id);
                foreach ($students as $student): ?>
                    <td class="p-3"><?php echo ($student["username"]); ?></td>
                    <td class="p-3">action</td>
                <?php endforeach; ?>
            </tr>
        </tbody>
    </table>

    <form method="post">
       <button name="validate-call" value="<?php echo($_GET["call"]) ?>">Valider l'appel</button>
    </form>
</div>