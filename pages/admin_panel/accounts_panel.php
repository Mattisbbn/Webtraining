<?php
if (isset($_POST["deleteStudent"])) {
    deleteDbRow($pdo, "student_accounts", $_POST["studentID"]);
    header("Refresh:0");
    exit();
}

if (isset($_POST["deleteTeacher"])) {
    deleteDbRow($pdo, "teacher_accounts", $_POST["teacherID"]);
    header("Refresh:0");
    exit();
}

if (isset($_POST["deleteAdmin"])) {
    deleteDbRow($pdo, "admin_accounts", $_POST["adminID"]);
    header("Refresh:0");
    exit();
}
?>




<div class="d-flex mt-2 flex-column">
    <div class="d-flex panel_header flex-column align-items-center justify-content-center">
        <h3 class="text-center">Comptes</h3>
    </div>

    <h4 class="text-center text-white">Étudiants</h4>


    <div class="class_edit_buttons m-auto">
            <button id="addStudentButton" class="addAccountButton mb-2 panel_buttons p-2 rounded-3 openPanelPopup" type="submit">Ajouter un étudiant</button>
            <button id="editStudentButton" class="mb-2 panel_buttons p-2 rounded-3">Sauvegarder</button>
    </div>

    <div class="d-none pannelDiv" id="studentPopup">
    <form class="d-flex justify-content-center " method="post">
        <input name="className" class="panel_buttons m-1 p-2 rounded-3" placeholder="Nom de la classe" type="text">
        <input name="classNumber" placeholder="Nombre d'éleves" class="panel_buttons m-1 p-2 rounded-3" type="number" id="class_number">
        <button class="panel_buttons m-1 p-2 rounded-3" type="submit"><i class="uil uil-check"></i></button>
        <button class="panel_buttons closePannelButton m-1 p-2 rounded-3"><i id="closeClass" class="uil uil-times color-white"></i></button>
    </form>
</div>



    <div class="tables_container flex-column justify-content-center align-items-center ">
        <table class="tables">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Mot de passe</th>
                    <th>Type d'utilisateur</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $students = fetchAllDb($pdo, "student_accounts");
                foreach ($students as $student):
                ?>
                    <tr>
                        <td><?php echo $student[0] ?></td>
                        <td><?php echo $student[3] ?></td>
                        <td><?php echo $student[1] ?></td>
                        <td><?php echo $student[2] ?></td>
                        <td><?php echo $student[3] ?></td>

                        <td>
                            <div class='d-flex justify-content-center'>
                                <form class='m-0' method='post'>
                                    <input type='hidden' name='studentID' value='<?php echo $student[0] ?>'>
                                    <button class='p-0' name='deleteStudent' type='submit'>
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

    <h4 class="text-center text-white">Professeurs</h4>


    <div class="class_edit_buttons m-auto">
            <button class=" addAccountButton mb-2 panel_buttons p-2 rounded-3" type="submit">Ajouter un professeur</button>
            <button class="mb-2 panel_buttons p-2 rounded-3">Sauvegarder</button>
    </div>

    <div class="d-none pannelDiv" id="teacherPopup">
    <form class="d-flex justify-content-center " method="post">
        <input name="className" class="panel_buttons m-1 p-2 rounded-3" placeholder="Nom de la classe" type="text">
        <input name="classNumber" placeholder="Nombre d'éleves" class="panel_buttons m-1 p-2 rounded-3" type="number" id="class_number">
        <button class="panel_buttons m-1 p-2 rounded-3" type="submit"><i class="uil uil-check"></i></button>
        <button class="panel_buttons closePannelButton m-1 p-2 rounded-3"><i id="closeClass" class="uil uil-times color-white"></i></button>
    </form>
</div>


    <div  class="tables_container flex-column justify-content-center align-items-center ">
        <table class="tables">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Mot de passe</th>
                    <th>Type d'utilisateur</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $teachers = fetchAllDb($pdo, "teacher_accounts");
                foreach ($teachers as $teacher):
                ?>
                    <tr>
                        <td><?php echo $teacher[0] ?></td>
                        <td><?php echo $teacher[3] ?></td>
                        <td><?php echo $teacher[1] ?></td>
                        <td><?php echo $teacher[2] ?></td>
                        <td><?php echo $teacher[3] ?></td>

                        <td>
                            <div class='d-flex justify-content-center'>
                                <form class='m-0' method='post'>
                                    <input type='hidden' name='teacherID' value='<?php echo $teacher[0] ?>'>
                                    <button class='p-0' name='deleteTeacher' type='submit'>
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



    <h4 class="text-center text-white">Administrateurs</h4>

    <div class="class_edit_buttons m-auto">
            <button class="addAccountButton mb-2 panel_buttons p-2 rounded-3" type="submit">Ajouter un admin</button>
            <button class="mb-2 panel_buttons p-2 rounded-3">Sauvegarder</button>
    </div>


    <div class="d-none pannelDiv" id="adminPopup">
    <form class="d-flex justify-content-center " method="post">
        <input name="className" class="panel_buttons m-1 p-2 rounded-3" placeholder="Nom de la classe" type="text">
        <input name="classNumber" placeholder="Nombre d'éleves" class="panel_buttons m-1 p-2 rounded-3" type="number" id="class_number">
        <button class="panel_buttons m-1 p-2 rounded-3" type="submit"><i class="uil uil-check"></i></button>
        <button class="panel_buttons closePannelButton m-1 p-2 rounded-3"><i id="closeClass" class="uil uil-times color-white"></i></button>
    </form>
</div>

    <div  class="tables_container flex-column justify-content-center align-items-center ">
        <table class="tables">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Mot de passe</th>
                    <th>Type d'utilisateur</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $admins = fetchAllDb($pdo, "admin_accounts");
                foreach ($admins as $admin):
                ?>
                    <tr>
                        <td><?php echo $admin[0] ?></td>
                        <td><?php echo $admin[3] ?></td>
                        <td><?php echo $admin[1] ?></td>
                        <td><?php echo $admin[2] ?></td>
                        <td><?php echo $admin[3] ?></td>

                        <td>
                            <div class='d-flex justify-content-center'>
                                <form class='m-0' method='post'>
                                    <input type='hidden' name='adminID' value='<?php echo $admin[0] ?>'>
                                    <button class='p-0' name='deleteAdmin' type='submit'>
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