
<div class="well"  style="width: 70%">
<table class="table">
  <thead>
  <tr>
  
    <th scope="col">Appointment Date</th>
    <th scope="col">patient Number</th>
    <th scope="col">Status</th>
  </tr>
</thead>
<tbody>

	<tr>
  <?php  


  if(isset($_GET['id'])){


   $appointment = Appointment::find_by_id($_GET['id']);


   	if($appointment){

   		echo "
   					<td>{$appointment->appointment_date}</td>
    				<td>{$appointment->patient_no}</td>
   					<td>{$appointment->status}</td>
   		";

   	}

   }
						?>
					     
					        
  </tr>
</tbody>
</table>
</div>