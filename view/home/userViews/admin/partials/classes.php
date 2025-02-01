<div class="tables_container">
        <table class="mt-4 m-auto tables">
            <thead class="primary-color">
                <tr>
                    <th>Nom</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
            
                foreach ($classes as $class):
                ?>
                    <tr class="secondary-color">
                        <td><?php echo $class["name"] ?></td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <form class='m-0' method='post'>
                                    <input type='hidden' name='classIdToDelete' value='<?php echo $class["id"] ?>'>
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

        <form class=" d-none pannelDiv flex-column  " method="post">
        <input name="className" placeholder="Nom de la classe" class="secondary-color m-1 p-2 rounded-3" type="text" required>

        <div class="d-flex">
                <button class=" w-50 secondary-color closePannelButton m-1 p-2 rounded-3"><i id="closeClass" class="uil uil-times color-white"></i></button>
                <button class=" w-50 secondary-color m-1 p-2 rounded-3" type="submit"><i class="uil uil-check"></i></button>
        </div>
    </form>
    </div>