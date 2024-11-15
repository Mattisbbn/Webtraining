<?php
function fetchUser($pdo,$user_type,$email){
    $sql = "SELECT id,role,email,password,username FROM users WHERE role = :userType AND email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userType', $user_type);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
}// Retourne l'utilisateur si son adresse email et son role sont trouvés dans la bdd

