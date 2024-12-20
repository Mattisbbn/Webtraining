

<?php
require_once("class/user.php");
require_once("controller/mainController.php");
?>

<aside class=" d-flex">
    <div class="d-flex flex-column ps-4 pe-4"> 
        <?php
        
        $userType = $currentUser->getUserType();
        
        
        if($userType === "admin"){      
        echo'<h5 class="ms-2 mb-3 mt-4 fw-bold">Admin</h5>
        <a href="#accounts" class="p-2 mt-2 mb-2 rounded-3 navbuttons fw-500 active"><i class="uil uil-user"></i> Comptes</a>
        <a href="#classes"class="p-2 mt-2 mb-2 rounded-3 navbuttons fw-500 "><i class="uil uil-graduation-cap"></i> Classes</a>
        <a href="#subjects"class="p-2 mt-2 mb-2 rounded-3 navbuttons fw-500 "><i class="uil uil-layer-group"></i> Matières</a>
        <a href="#lessons"class="p-2 mt-2 mb-2 rounded-3 navbuttons fw-500 "><i class="uil uil-book-open"></i> Cours</a>
        <a href="#signatures"class="p-2 mt-2 mb-2 rounded-3 navbuttons fw-500 "><i class="uil uil-edit-alt"></i> Signatures</a>
        ';
        }elseif($userType === "teacher"){
            echo'
            <h5 class="ms-2 mb-3 mt-4 fw-bold">Animateur</h5>
            <a href="#sign" class="p-2 mt-2 mb-2 rounded-3 navbuttons fw-500 active"><i class="uil uil-edit-alt"></i> Signatures</a>
            ';
        }elseif($userType === "student"){
            echo'
            <h5 class="ms-2 mb-3 mt-4 fw-bold">Élève</h5>
            <a href="#calendar" class="p-2 mt-2 mb-2 rounded-3 navbuttons fw-500 active"><i class="uil uil-schedule"></i> Calendrier</a>
            ';
            
        }
        
    ?>

    <form class="d-flex p-2 secondary-color rounded-3 mt-2 mb-2" method="post">
    <p><?php echo($currentUser->getUsername()) ?></p>
        <button name="logout" type="submit"><i class="uil uil-signout"></i></button>
    </form>
    </div>



</aside>
