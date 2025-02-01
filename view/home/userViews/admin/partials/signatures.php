<form method="post">
    <select class="third-color rounded-3 border-0 m-1 p-2 fetchSignaturesForm" name="fetchSignatures" onchange="this.form.submit();">
        <option value='all'>Toutes les classes</option>
        <?php foreach($classes as $class){echo("<option value='{$class['id']}'>{$class['name']}</option>");}?>
    </select>
</form>

<table class="m-auto">
    <thead>
        <tr>
            <th class="p-1">Signé par</th>
            <th class="p-1">Action</th>
        </tr>
    </thead>

    <tbody>
        <?php 

        if(isset($_POST['fetchSignatures'])){
            $signatureId = $_POST['fetchSignatures'];
            $signatures = $signaturesActions->fetchSignaturesByClass($signatureId);
        }else{
            $signatures = $signaturesActions->fetchSignatures();
        }

        foreach($signatures as $signature): ?>
        <tr class="border-bottom">
            <td class="p-1" ><?php echo($signature["username"]); ?></td>
            <td class="p-1">
                <form method="get">
                    <button class="rounded-3 primary-color p-2" name="viewSignature" value="<?php echo($signature["id"]); ?>">Voir la signature</button>
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