<section class="d-flex flex-column ">
    <h3 class="text-center text-white">Comptes</h3>

    <div class="d-flex flex-column   m-auto justify-content-center">
        <div>
            <button class="m-1  panel_buttons p-2 rounded-3 addAccountButton openPanelPopup">Ajouter un compte</button>
            <button class="m-1 ms-0 panel_buttons p-2 rounded-3">Sauvegarder</button>
        </div>


        <form class=" d-none pannelDiv flex-column  " method="post">
            <select class="panel_buttons rounded-3 border-0 m-1 p-2" name="userRole">
                <option value="student">Étudiant</option>
                <option value="teacher">Professeur</option>
                <option value="admin">Administrateur</option>
            </select>

            <input name="userName" placeholder="Nom" class="panel_buttons m-1 p-2 rounded-3" type="text" required>
            <input name="userEmail" placeholder="Email" class="panel_buttons m-1 p-2 rounded-3" type="email" required>
            <input name="userPassword" placeholder="Mot de passe" class="panel_buttons m-1 p-2 rounded-3" type="password" required>

            <div class="d-flex">
                <button class=" w-50 panel_buttons closePannelButton m-1 p-2 rounded-3"><i id="closeClass" class="uil uil-times color-white"></i></button>
                <button class=" w-50 panel_buttons m-1 p-2 rounded-3" type="submit"><i class="uil uil-check"></i></button>
            </div>

        </form>
    </div>
<div class="tables_container">
    <table class="tables mt-2 ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Classe</th>
                <th>Rôle</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $accounts = fetchAllDb($pdo, "users");
            foreach ($accounts as $account):
            ?>
                <tr>
                    <td><?php echo $account[0] ?></td>
                    <td><?php echo $account[1] ?></td>
                    <td><?php echo $account[2] ?></td>
                    <td>Classe</td>
                    <td><?php echo $account[5] ?></td>

                    <td>
                        <div class='d-flex justify-content-center'>
                            <form class='m-0' method='post'>
                                <input type='hidden' name='UserIdToDelete' value='<?php echo $account[0] ?>'>
                                <button class='p-0' type='submit'>
                                    <i class='uil uil-trash-alt'></i>
                                </button>
                            </form>
                            <i class='uil uil-file-edit-alt'></i>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</section>