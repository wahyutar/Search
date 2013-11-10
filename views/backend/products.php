			<h1><?=$title;?></h1>			
			<!--Script Cari Jadi-->
			
			<br>
			<form action="<?php print site_url();?>backend/products/cari" method=POST>
		
				<input type=text name=CategoryID> 
				
				<select name=ProductName>
					<option>--- Pilih Products ---</option>
					<option>Chang</option>
					<option>Chai</option>
				</select>
				
			<input type=submit value="search">
			
			</form>	

			
			<a href="<?php print site_url();?>backend/products"> <b>Tampil Semua Products</b></a>
			
			
			<br/>
			<br/>

			<?php
			   echo anchor(site_url('backend/products/form/insert/'),'Add',' class="input-submit"');	
			  /*fungsi dari untuk untuk fungsi update dan delete   . dengan query ini akan merelay kekontrloller 
			  dan mengakses file yang direlay
			  */
			?>
			<br />
		
		
			<table>
				<tr>
					<th>No</th>
					<th>Actions</th>
					<th>ProductID</th>
				    <th>ProductName</th>
				    <th>SupplierID</th>
					<th>CategoryID</th>
					<th>QuantityPerUnit</th>
					<th>UnitPrice</th>
					<th>UnitsInStock</th>
					<th>UnitsOnOrder</th>
					<th>ReorderLevel</th>
					<th>Discontinued</th>
				</tr>
				<?php
					$no=0;
					foreach($array_products as $row):	
					$id=$row->ProductID;	
					$no++;	
					$css=($no%2==1)? '' : 'class="bg"';
				?>
				<tr <?=$css;?> >
					<td><?=$no;?>.</td>
				    <td><?=anchor(site_url('backend/products/process/delete/'.$id),'[delete]').' | '.
				    	   anchor(site_url('backend/products/form/update/'.$id),'[update]');?></td>				    
				    <td><?=$row->ProductID;?></td>	
					<td><?=$row->ProductName;?></td>
				    <td><?=$row->SupplierID;?></td>
					<td><?=$row->CategoryID;?></td>	
					<td><?=$row->SupplierID;?></td>	
					<td><?=$row->QuantityPerUnit;?></td>	
					<td><?=$row->UnitPrice;?></td>	
					<td><?=$row->UnitsInStock;?></td>	
					<td><?=$row->UnitsOnOrder;?></td>
					<td><?=$row->Discontinued;?></td>	
				</tr>
				<?php  endforeach; ?>
			</table>
			



		