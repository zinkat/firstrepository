<?php ob_start();?>
<div id="tableau">

<table>
<tr>
<th>id abonne</th>
<th>Nom</th>
<th>Email</th>
<th>Abonnement</th>

</tr>

<?php
$row = $stmt->fetch()?>
 <tr>
 <td> <?php echo $row["idabonne"];?> </td> 
 <td> <?php echo utf8_encode($row["nom"]);?></td>
 <td>  <?php echo $row["email"];?></td>
 <td><?php echo $row["abonnement"];?></td> 
    
 </tr>

</table>

</div>
<?php $content = ob_get_clean(); ?>
<?php  include("template.php");?>