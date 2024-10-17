


<div class="d-flex mt-2 flex-column justify-content-center align-items-center">
    <div class="d-flex panel_header flex-column align-items-center justify-content-center">
        <h3 class="text-center">Comptes</h3>
    </div>

    <h4 class="text-center text-white">Étudiants</h4>

    <div class="class_edit_buttons">
        <button id="addStudentButton" class=" ms-1 addAccountButton mb-2 panel_buttons p-2 rounded-3 openPanelPopup" type="submit">Ajouter un étudiant</button>
        <button id="editStudentButton" class="me-1 mb-2 panel_buttons p-2 rounded-3">Sauvegarder</button>

        <div class="d-none pannelDiv">
        <form class="d-flex flex-column justify-content-center" method="post">
            <input name="studentName" placeholder="Nom"      class="panel_buttons m-1 p-2 rounded-3"  type="text">
            <input name="studentEmail" placeholder="Email"   class="panel_buttons m-1 p-2 rounded-3" type="text">
            <input name="studentPassword" placeholder="Mot de passe"   class="panel_buttons m-1 p-2 rounded-3" type="password">
            <div class="d-flex">
                <button class=" w-50 panel_buttons closePannelButton m-1 p-2 rounded-3"><i id="closeClass" class="uil uil-times color-white"></i></button>
                <button class=" w-50 panel_buttons m-1 p-2 rounded-3" type="submit"><i class="uil uil-check"></i></button>
            </div>
        </form>
    </div>
    </div>

    

    <div class="tables_container flex-column justify-content-center align-items-center ">
        <table class="tables">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
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


    <div class="class_edit_buttons">
        <button class="ms-1 mb-2 addAccountButton  panel_buttons p-2 rounded-3" type="submit">Ajouter un professeur</button>
        <button class="me-1 mb-2 panel_buttons p-2 rounded-3">Sauvegarder</button>


        <div class="d-none pannelDiv">
        <form class="d-flex flex-column justify-content-center" method="post">
            <input name="teacherName" placeholder="Nom"      class="panel_buttons m-1 p-2 rounded-3"  type="text">
            <input name="teacherEmail" placeholder="Email"   class="panel_buttons m-1 p-2 rounded-3" type="email">
            <input name="teacherPassword" placeholder="Mot de passe"   class="panel_buttons m-1 p-2 rounded-3" type="password">
            <div class="d-flex">
                <button class=" w-50 panel_buttons closePannelButton m-1 p-2 rounded-3"><i id="closeClass" class="uil uil-times color-white"></i></button>
                <button class=" w-50 panel_buttons m-1 p-2 rounded-3" type="submit"><i class="uil uil-check"></i></button>
            </div>
        </form>
        </div>

    </div>

    

    <div class="tables_container flex-column justify-content-center align-items-center ">
        <table class="tables">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>

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
        <button class="ms-1 addAccountButton mb-2 panel_buttons p-2 rounded-3" type="submit">Ajouter un admin</button>
        <button class="me-1 mb-2 panel_buttons p-2 rounded-3">Sauvegarder</button>

        <div class="d-none pannelDiv">
        <form class="d-flex flex-column justify-content-center" method="post">
            <input name="adminName" placeholder="Nom"      class="panel_buttons m-1 p-2 rounded-3"  type="text">
            <input name="adminEmail" placeholder="Email"   class="panel_buttons m-1 p-2 rounded-3" type="email">
            <input name="adminPassword" placeholder="Mot de passe"   class="panel_buttons m-1 p-2 rounded-3" type="password">
            <div class="d-flex">
                <button class=" w-50 panel_buttons closePannelButton m-1 p-2 rounded-3"><i id="closeClass" class="uil uil-times color-white"></i></button>
                <button class=" w-50 panel_buttons m-1 p-2 rounded-3" type="submit"><i class="uil uil-check"></i></button>
            </div>
        </form>
    </div>

    </div>

   

    <div class="tables_container flex-column justify-content-center align-items-center ">
        <table class="tables">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
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



    <?php 
    
    if(isset($_POST["studentName"]) || isset($_POST["studentEmail"]) || isset($_POST["studentPassword"]) ){
        addNewUser($pdo,"student_accounts",$_POST["studentEmail"],$_POST["studentPassword"],$_POST["studentName"]);
    }

    if(isset($_POST["teacherName"]) || isset($_POST["teacherEmail"]) || isset($_POST["teacherPassword"]) ){
        addNewUser($pdo,"teacher_accounts",$_POST["teacherEmail"],$_POST["teacherPassword"],$_POST["teacherName"]);
    }
    
    if(isset($_POST["adminName"]) || isset($_POST["adminEmail"]) || isset($_POST["adminPassword"]) ){
        addNewUser($pdo,"admin_accounts",$_POST["adminEmail"],$_POST["adminPassword"],$_POST["adminName"]);
    }
    
    
    
    ?>