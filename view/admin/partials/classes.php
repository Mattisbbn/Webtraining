<div class="d-flex flex-column   m-auto justify-content-center">
    <div>
        <button class="m-1  panel_buttons p-2 rounded-3 addAccountButton openPanelPopup">Ajouter une classe</button>
        <button class="m-1 ms-0 panel_buttons p-2 rounded-3">Sauvegarder</button>
    </div>

    <form class=" d-none pannelDiv flex-column  " method="post">
        <input name="className" placeholder="Nom de la classe" class="panel_buttons m-1 p-2 rounded-3" type="text" required>

        <div class="d-flex">
            <button class=" w-50 panel_buttons closePannelButton m-1 p-2 rounded-3"><i id="closeClass" class="uil uil-times color-white"></i></button>
            <button class=" w-50 panel_buttons m-1 p-2 rounded-3" type="submit"><i class="uil uil-check"></i></button>
        </div>

    </form>
</div>

<table class="tables mt-2 mb-2">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $classes = fetchAllDb($pdo, "classes");
        foreach ($classes as $class):
        ?>
            <tr>
                <td><?php echo $class[1] ?></td>


                <td>
                    <div class='d-flex justify-content-center'>
                        <form class='m-0' method='post'>
                            <input type='hidden' name='classIdToDelete' value='<?php echo $class[0] ?>'>
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