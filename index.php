<?php 
require_once("partials/head.php");
// require_once("partials/header.php");
require_once("sql/connectToDB.php");
?>
<body>
    <main>
<?php



if(!empty($_GET)) {
    foreach($_GET as $key => $value){
        echo($key);
        if(file_exists("pages/{$key}/{$key}.php")){
            require_once("pages/{$key}/{$key}.php");
        } else {
            require_once("pages/home/home.php");
        }
    }
} else {
    require_once("pages/home/home.php");
}

?>
    </main>
</body>
 <script src="script.js"></script>
</html>