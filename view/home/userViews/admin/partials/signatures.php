
<table class="m-auto">
    <thead>
        <tr>
            <th>Signé par</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php 
        $signatures = $signaturesActions->fetchSignatures();
        foreach($signatures as $signature):
        ?>
        <tr>
            <td><?php echo($signature["username"]); ?></td>
            <td>
                <form method="get">
                    <button name="viewSignature" value="<?php echo($signature["id"]); ?>">Voir la signature</button>
                </form>
            </td>
        </tr>

        <?php  endforeach;?>
    </tbody>



</table>

<?php 
if(isset($_GET['viewSignature'])){
    require_once("view/home/userViews/admin/modals/signatureModal.php");
}

?>
