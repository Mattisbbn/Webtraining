<form method="post">
        <table class="mb-5">

            <thead>
                <tr class="rounded-3">
                    <th class="p-3">Prénom</th>
                    <th class="p-3">Présent ?</th>
                </tr>
            </thead>

            <tbody>
                <?php $students = $signaturesModel->fetchUsersFromLesson($_GET["call"]); foreach ($students as $student): ?>
                <tr>
                    <td><?php echo htmlspecialchars($student["username"]); ?></td>
                    <td class="d-flex align-items-center justify-content-center"><input type="checkbox" name="presence[]" value="<?php echo $student['id']?>"></td>
                </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
        <button class="d-flex align-items-center justify-content-center p-3 ps-4 pe-4 secondary-color text-white rounded-3 m-auto" type="submit">Envoyer</button>
</form>