<?php

if (isset($_POST["deleteClass"])) {
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

<div class="d-flex mt-2 flex-column">
    <div class="d-flex panel_header flex-column align-items-center justify-content-center">
    <h3 class="text-center">Classes</h3>
    </div>

    
    

    <div class=" flex-column d-flex justify-content-center align-items-center ">

        <div class="class_edit_buttons">
            <button class="addAccountButton mb-2 panel_buttons p-2 rounded-3" type="submit">Ajouter une classe</button>
            <button class="mb-2 panel_buttons p-2 rounded-3">Sauvegarder</button>
        </div>
            
        <div class="d-none pannelDiv" id="classPopup">
            
    <form class="d-flex justify-content-center " method="post">
        <input name="className" class="panel_buttons m-1 p-2 rounded-3" placeholder="Nom de la classe" type="text">
        <input name="classNumber" placeholder="Nombre d'éleves" class="panel_buttons m-1 p-2 rounded-3" type="number" id="class_number">
        <button class="panel_buttons m-1 p-2 rounded-3" type="submit"><i class="uil uil-check"></i></button>
        <button class="panel_buttons closePannelButton m-1 p-2 rounded-3"><i id="closeClass" class="uil uil-times color-white"></i></button>
    </form>
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
                        <td><?php echo $class[2] ?></td>
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