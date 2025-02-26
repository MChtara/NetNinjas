
<table class="table">
    <thead>
        <tr>
            <th>id_res</th>
            <th>id_user</th>
            <th>siege</th>
            <th>etat</th>
            <th>id_proj</th>
           <!-- <th>Update</th>
            <th>Delete</th> -->
        </tr>
        </thead>
        <?php
        foreach ($list as $reservation) {
        ?>
   			<tr>
				<td><?php echo $reservation['id_res']; ?></td>
				<td><?php echo $reservation['id_user']; ?></td>
                <td><?php echo $reservation['siege']; ?></td>
                <td><?php echo $reservation['etat']; ?></td>
                <td><?php echo $reservation['id_proj']; ?></td>
        

				<td>
                <a href="imprimerticket.php?id_res=<?php echo $reservation['id_res'] ?>" spellcheck="false">
                      <i class="mdi mdi-printer"></i> 
                    </a>
				<a href="updatereservation.php?id_res=<?php echo $reservation['id_res'] ?>" spellcheck="false">
                      <i class="mdi mdi-tooltip-edit"></i> 
                    </a>
				<a href="deletereservation.php?id_res=<?php echo $reservation['id_res'] ?>">
                      <i class="mdi mdi-trash-can"></i> 
                    </a></td>
			</tr>
        <?php
        }
        ?>
    </table>