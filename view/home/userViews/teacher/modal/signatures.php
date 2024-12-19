<div class="white border rounded-3 p-3 position-absolute top-50 start-50 ms-5 translate-middle">

    <div class="d-flex justify-content-center">
        <h2 class="text-center fw-bold">Appel</h2>
        <form method="post">
            <button name="close-popup"><h3>X</h3></button>
        </form>
    </div>

    <?php 
    
    if($call_status == null){
        require_once "view/home/userViews/teacher/modal/status/null.php";
    }elseif($call_status == "started"){
        require_once "view/home/userViews/teacher/modal/status/started.php";
    }elseif($call_status == "finished"){
        require_once "view/home/userViews/teacher/modal/status/finished.php";
    }
    ?>

</div>