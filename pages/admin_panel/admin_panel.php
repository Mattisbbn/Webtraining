<?php

fetchAllDb($pdo, "classes");
require_once("sql/fetchAccounts.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


?>

<section id="panel_section">
    <div class="d-flex ">
        <div class="col-1 container-fluid "></div>
        <div id="panel_container" class="mt-2 p-2 col-10 rounded-4">
            <h1 class="text-center mb-2 mt-2 rounded-4">Panel </h1>
            <div>
                <button class="panel_buttons m-1 p-1 rounded-3">Classes</button> <button id="addClassButton" class="panel_buttons m-1 p-1 rounded-3" type="submit">Ajouter une classe</button>


                <div class="col-10 col-sm-8 col-lg-4 rounded-3" id="classPopup">
                    <div class="d-flex align-center justify-content-center ">
                        <h1 class="text-center m-auto ms-10">Ajouter une classe </h1>
                        <h1 class="mb-0 position-absolute end-0  "><i id="closeClass" class="uil uil-times"></i></h1>
                    </div>
                    <form class="d-flex flex-column justify-content-center " method="post">
                        <input name="className" class="panel_buttons m-1 p-2 rounded-3" placeholder="Nom de la classe" type="text">
                        <input name="classNumber" placeholder="Nombre d'éleves" class="panel_buttons m-1 p-2 rounded-3" type="number"  id="class_number">
                        <button class="panel_buttons m-1 p-2 rounded-3" type="submit">Ajouter la classe</button>
                    </form>
                </div>

                
                <div class="d-flex align-items-center">
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
                                echo "<td class='class_icons'>";
                                echo '<form method="post">';
                                echo '<input type="hidden" name="rowID" value="' . $class[0] . '">';
                                echo '<button  name="delete" type="submit"><i class="uil uil-trash-alt"></i></button>';
                                echo '</form>';
                                echo '<i class="uil uil-file-edit-alt"></i>';
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-1 container-fluid"></div>
    </div>
</section>
<script src="pages/admin_panel/admin_panel.js"></script>
<?php

if (isset($_POST["delete"])) {
    deleteDbRow($pdo, "classes", $_POST["rowID"]);
    header("Refresh:0");
    exit();
}


if (isset($_POST["className"]) && isset($_POST["classNumber"])) {
    addDbRowClasse($pdo,$_POST["className"],$_POST["classNumber"]);
    header("Refresh:0");
    exit();
}


?>
<!-- <div class="d-flex">

<div class="col-1 container-fluid "></div>

<div class="col-1 container-fluid "></div>


</div> -->

