<html>
	<head>
		<title>
		</title>
		<style>
			table,tr,td
			{
border: 2px  solid;
border-collapse: collapse;
padding:10px;
margin:10px;

			}
		</style>
	</head>
	<body>
		<form action="" method="post">
		<table>
		<tr>
			<td>First Name</td>
			<td>LastName</td>
			<td>Username</td>
			<td>password</td>
            <td>mobile</td>
			<td>email</td>
            <td>Status</td>

			
		</tr>
		<?php
		if($n->num_rows()>0)
		{
			foreach($n->result() as $row)
			{
        ?>
        <tr>
        	<td>
        		<?php echo $row->firstname;?></td>
        		<td>
        			<?php echo $row->lastname;?></td>
        			<td>
        				<?php echo $row->username;?></td>
                            <td>
                            <?php echo $row->mobile;?></td>
                            <td>
                            <?php echo $row->email;?></td>
                
                            <?php
                                if($row->status==1)
                                {
                                    ?>
                                    <td>Approved</td>
                                    <td><a href="<?php echo base_url()?>main/rejectdetai/<?php echo $row->id;?>">Reject</a></td>
                                    <?php 
                                }
                                elseif($row->status==2)
                                {
                                    ?>

                                    <td><a href="<?php echo base_url()?>main/approvedetai/<?php echo $row->id;?>">Approve</a></td>
                                    <td>Rejected</td>
                                    <?php
                                    }
                                        else
                                        {
                                            ?>

.                               <td>
                    
                        <a href="<?php echo base_url()?>main/approvedetai/<?php echo $row->id;?>">approve</a>
                    </td>
                                    <td>
                            <a href="<?php echo base_url()?>main/rejectdetai/<?php echo $row->id;?>">reject</a></td>
                            </tr>
                                <?php

        					}
                        }
                    }
                        ?>
	</table>
</form>
</body>
</html>
