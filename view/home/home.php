<section d-flex>

<h1 class="text-center">Calendrier</h1>



<table>
<thead>
    <th class='third-color'>Heure</th>
    <th></th>
</thead>
<thead>
    <?php 
   for ($i = 8; $i <= 17; $i++) {
    echo("<tr><td class='third-color'><h4>" . sprintf("%02d:00", $i)."</h4></td>
    <td>ff <td>
    </tr>");
    if($i < 24){
        echo("<tr><td class='third-color'><h4>" . sprintf("%02d:30", $i)."</h4></td>");
    }
 
}
    ?>
  
</thead>
</table>

</section>
<div class="d-flex" id="home_hour"><p class=" d-flex hour"></p></div>
<script src="view/home/home.js"></script>