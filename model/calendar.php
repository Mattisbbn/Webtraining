<?php
function fetchCalendar($pdo) {
    $sql = "SELECT subject.name, schedule.start_datetime, schedule.end_datetime
    FROM schedule
    LEFT JOIN subject ON subject.id = schedule.subject_id";

    
  
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $events = [];
    foreach ($results as $row) {
        $events[] = [
            'title' => $row['name'], // Vous pouvez personnaliser le titre ici
            'start' => $row['start_datetime'],
            'end' => $row['end_datetime']
        ];
    }
    
    return json_encode($events);
}
