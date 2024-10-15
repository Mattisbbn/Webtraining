<?php

fetchAllDb($pdo, "classes");
require_once("sql/fetchAccounts.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["currentUser"])) {
    $currentUser = $_SESSION["currentUser"];
} else {
    header('Location: ?login_page');
}

?>

<section id="panel_section">


    <div class="d-flex ">

        <div class="col-1 container-fluid "></div>

        <div id="panel_container" class="mt-2 p-2 col-10 rounded-4">
            <h1 class="text-center mb-2 mt-2 rounded-4">Panel</h1>

            <div>


                <button class="panel_buttons m-1 p-1 rounded-3">Classes</button>
                <div>
                    <table class="rounded-3" id="classes_table">
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

<?php

if (isset($_POST["delete"])) {
    deleteDbRow($pdo, "classes", $_POST["rowID"]);
    header("Refresh:0");
}
