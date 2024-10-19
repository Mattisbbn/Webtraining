<?php
if (isset($_POST["deleteClass"])) {
    deleteDbRow($pdo, "classes", $_POST["rowID"]);
    header("Refresh:0");
    exit();
}

if (isset($_POST["className"])) {
    addDbRowClasse($pdo, $_POST["className"]);
    header("Refresh:0");
    exit();
}
?>

<div class="d-flex mt-2 flex-column">
    <div class="d-flex panel_header flex-column align-items-center justify-content-center">
        <h3 class="text-center">Classes</h3>
    </div>
    <div class=" flex-column d-flex justify-content-center align-items-center ">

        <div class="class_edit_buttons">
            <button class="ms-1 addAccountButton mb-2 panel_buttons p-2 rounded-3" type="submit">Ajouter une classe</button>
            <button class="me-1 mb-2 panel_buttons p-2 rounded-3">Sauvegarder</button>



            <div class="d-none pannelDiv">
            <form class="d-flex flex-column justify-content-center " method="post">
                <input name="className" class="panel_buttons m-1 p-2 rounded-3" placeholder="Nom de la classe" type="text">
                <div class="d-flex">
                <button class=" w-50 panel_buttons closePannelButton m-1 p-2 rounded-3"><i id="closeClass" class="uil uil-times color-white"></i></button>
                <button class=" w-50 panel_buttons m-1 p-2 rounded-3" type="submit"><i class="uil uil-check"></i></button>
                </div>
            </form>
        </div>
        </div>

        

        <table class="tables">
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
                foreach ($classes as $class): ?>
                    <tr>
                        <td><?php echo $class[0] ?></td>
                        <td><?php echo $class[1] ?></td>
                        <td>0</td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <form class='m-0' method='post'>
                                    <input type='hidden' name='rowID' value=<?php echo $class[0]; ?>>
                                    <button class='p-0' name='deleteClass' type='submit'>
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
</div>