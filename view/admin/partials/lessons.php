<div class="tables_container">
        <table class="mt-4 m-auto tables">
    <thead class="primary-color">
        <tr>
            <th>Matière</th>
            <th>Classe</th>
            <th>Professeur</th>
            <th>Heure de départ</th>
            <th>Durée</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $shedules = fetchLessons($pdo);
        foreach ($shedules as $shedule):
        ?>
            <tr class="secondary-color">
                <td><?php echo $shedule["name"] ?></td>
                <td><?php echo $shedule["class_name"] ?></td>
                <td><?php echo $shedule["teacher_name"] ?></td>
                <td><?php echo $shedule["start_datetime"] ?></td>
                <td><?php echo $shedule["lesson_duration"] . " h" ?></td>
                <td>
                    <div class='d-flex justify-content-center'>
                        <form class='m-0' method='post'>
                            <input type='hidden' name='eventToDelete' value='<?php echo $shedule["id"] ?>'>
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

<div class="d-flex flex-column   m-auto justify-content-center">
    <div>
        <button class="m-1 secondary-color  p-2 rounded-3 addAccountButton openPanelPopup">Programmer un cours</button>
        <button class="m-1 secondary-color ms-0  p-2 rounded-3">Sauvegarder</button>
    </div>


    <form class=" d-none pannelDiv flex-column" method="post">
        <select class="secondary-color rounded-3 border-0 m-1 p-2" name="subjectOfLesson">
            <?php
            $subjects = fetchAllDb($pdo, "subject");
            foreach ($subjects as $subject) {
                echo "<option value='{$subject['id']}'>{$subject["name"]}</option>";
            }
            ?>
        </select>

        <select class="secondary-color rounded-3 border-0 m-1 p-2" name="classOfLesson">
            <?php
            $classes = fetchAllDb($pdo, "classes");
            foreach ($classes as $class) {
                echo "<option value='{$class['id']}'>{$class["name"]}</option>";
            }
            ?>
        </select>

        <select class="secondary-color rounded-3 border-0 m-1 p-2" name="teacherOfLesson">
            <?php
            $teachers = fetchUserType($pdo, "teacher");
            foreach ($teachers as $teacher) {
                echo "<option value='{$teacher['id']}'>{$teacher["username"]}</option>";
            }
            ?>
        </select>
        <input class="secondary-color rounded-3 border-0 m-1 p-2" type="datetime-local" name="lessonStartDate">
        <input class="secondary-color rounded-3 border-0 m-1 p-2" placeholder="Durée" type="time" value="00:30" name="lessonDuration">


        <div class="d-flex">
            <button class=" w-50 secondary-color closePannelButton m-1 p-2 rounded-3"><i id="closeClass" class="uil uil-times color-white"></i></button>
            <button class=" w-50 secondary-color m-1 p-2 rounded-3" type="submit"><i class="uil uil-check"></i></button>
        </div>

    </form>
</div>



