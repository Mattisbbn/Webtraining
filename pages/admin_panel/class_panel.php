<?php

if (isset($_POST["delete"])) {
    deleteDbRow($pdo, "classes", $_POST["rowID"]);
    header("Refresh:0");
    exit();
}


if (isset($_POST["className"]) && isset($_POST["classNumber"])) {
    addDbRowClasse($pdo, $_POST["className"], $_POST["classNumber"]);
    header("Refresh:0");
    exit();
}
?>

<div id="class_panel" class="d-flex mt-2 flex-column">
    <div class="d-flex panel_header flex-column align-items-center justify-content-center">
        <h3 class="text-center">Classes</h3>
    </div>


    <div class="col-10 col-sm-8 col-lg-4 rounded-3" id="classPopup">
        <div class="d-flex align-center justify-content-center ">
            <h1 class="text-center m-auto ms-10">Ajouter une classe </h1>
            <h1 class="mb-0 position-absolute end-0  "><i id="closeClass" class="uil uil-times"></i></h1>
        </div>
        <form class="d-flex flex-column justify-content-center " method="post">
            <input name="className" class="panel_buttons m-1 p-2 rounded-3" placeholder="Nom de la classe" type="text">
            <input name="classNumber" placeholder="Nombre d'éleves" class="panel_buttons m-1 p-2 rounded-3" type="number" id="class_number">
            <button class="panel_buttons m-1 p-2 rounded-3" type="submit">Ajouter la classe</button>
        </form>
    </div>

    <div class=" flex-column d-flex justify-content-center align-items-center ">

        <div class="class_edit_buttons">
            <button id="addClassButton" class="mb-2 panel_buttons p-2 rounded-3" type="submit">Ajouter une classe</button>
            <button id="editClassButton" class="mb-2 panel_buttons p-2 rounded-3">Sauvegarder</button>
        </div>
        <table id="classes_table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Nombre d'éleves</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $classes = fetchAllDb($pdo, "classes");
                foreach ($classes as $class) {
                    echo ("<tr>");
                    echo ("<td>{$class[0]}</td>");
                    echo ("<td>{$class[1]}</td>");
                    echo ("<td>{$class[2]}</td>");
                    echo "<td>";
                    echo "<div class='d-flex justify-content-center'>";
                    echo '<form class="m-0" method="post">';
                    echo '<input type="hidden" name="rowID" value="' . $class[0] . '">';
                    echo '<button class="p-0" name="delete" type="submit"><i class="uil uil-trash-alt"></i></button>';
                    echo '</form>';
                    echo '<i class="uil uil-file-edit-alt"></i>';
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>