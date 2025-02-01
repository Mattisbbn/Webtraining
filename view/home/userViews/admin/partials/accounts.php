
<div class="tables_container">
        <table class="mt-4 m-auto tables">
            <thead class="primary-color">
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Classe</th>
                    <th>Rôle</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $users = $userActions->fetchUsers();
                foreach ($users as $user):
                ?>
                    <tr class="secondary-color">
                        <td><?php echo $user["username"] ?></td>
                        <td><?php echo $user["email"] ?></td>
                        <td>
                            <form method="post" id="editClass_<?php echo $user['id']; ?>">
                                <select 
                                <?php if ($user["role"] == "admin" || $user["role"] == "teacher") {
                                            echo ("disabled");
                                        }   ?> class="third-color rounded-3 border-0 m-1 p-2" name="editClass" onchange="this.form.submit();">

                                    <?php
                                    $classes = $database->fetchAllTable("classes"); 
                                    if ($user["class_name"] == null) {
                                        echo "<option selected value='null'>Sélectionner une classe</option>";
                                    } else {
                                        echo "<option value='null'>Sélectionner une classe</option>";
                                        echo "<option value='' selected>{$user["class_name"]}</option>";
                                    }

                                    foreach ($classes as $class) {
                                        if ($class["name"] != $user["class_name"]) {
                                            echo "<option value='{$class["id"]}'>{$class["name"]}</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                            </form>
                        </td>
                        <td><?php echo $user["role"] ?></td>

                        <td>
                            <div class='d-flex justify-content-center'>
                                <form class='m-0' method='post'>
                                    <input type='hidden' name='UserIdToDelete' value='<?php echo $user["id"] ?>'>
                                    <button class='p-0' type='submit'>
                                        <i class='uil uil-trash-alt'></i>
                                    </button>
                                </form>
                                
                            </div>
                        </td>
                    </tr>
                  
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="d-flex flex-column m-auto justify-content-center mb-4">
        <div>
            <button class="m-1 secondary-color p-2 rounded-3 addAccountButton openPanelPopup">Ajouter un compte</button>
            <button class="m-1 secondary-color p-2 rounded-3 ms-0">Sauvegarder</button>
        </div>

        <form class="d-none pannelDiv flex-column  " method="post">
            <select class="secondary-color rounded-3 border-0 m-1 p-2" name="userRole">
                <option value="student">Étudiant</option>
                <option value="teacher">Professeur</option>
                <option value="admin">Administrateur</option>
            </select>

            <input name="userName" placeholder="Nom" class="secondary-color  m-1 p-2 rounded-3" type="text" required>
            <input name="userEmail" placeholder="Email" class="secondary-color  m-1 p-2 rounded-3" type="email" required>
            <input name="userPassword" placeholder="Mot de passe" class="secondary-color  m-1 p-2 rounded-3" type="password" required>

            <div class="d-flex">
                <button class=" w-50 secondary-color  closePannelButton m-1 p-2 rounded-3"><i id="closeClass" class="uil uil-times color-white"></i></button>
                <button class=" w-50 secondary-color  m-1 p-2 rounded-3" type="submit"><i class="uil uil-check"></i></button>
            </div>

        </form>
    </div>