            <?php
				$cartselect="SELECT * FROM purchase where cust_id='$_SESSION[cid]' AND purchasestatus='Pending'";
			  	$res=mysqli_query($con,$cartselect);
				if(mysqli_num_rows($res)  >= 1)
				{
			?>
        	<table width="680px" cellspacing="0" cellpadding="5">
                   	  <tr bgcolor="#ddd">
                        	<th width="220" align="left">Image </th> 
                        	<th width="180" align="left">Product Name </th> 
                       	  	<th width="100" align="center">Quantity </th> 
                        	<th width="60" align="right">Price </th> 
                        	<th width="60" align="right">Total </th> 
                        	<th width="90"> </th>
                            
                      </tr>
                      <?php
					  while($result=mysqli_fetch_array($res))
					  {
						  $cartselect1="SELECT * FROM products	 where prod_id='$result[prod_id]'";
						  $res1=mysqli_query($con,$cartselect1);
						  $result1=mysqli_fetch_array($res1);
					  ?>
                    	<tr>
                        	<td><img src="productimage/<?php echo $result1[images]?>" width="200" height="150" alt="image 1" /></td> 
                        	<td><?php echo $result1[prodname] ?></td> 
                            <td align="center"><input type="text" value="<?php echo $result[qty]; ?>" style="width: 40px; text-align: right" /> </td>
                            <td align="right"><?php echo $result[price]; ?></td> 
                            <td align="right"><?php  echo $result[qty]* $result[price]; ?></td>
                            <td align="center"><a href="viewcart.php?delid=<?php echo $result[purch_id]; ?>"><img src="images/remove_x.gif" alt="remove" /><br />Remove</a> </td>
						</tr>
                       <?php
					   	$price = $price + $result[price];
					   }
					   ?>
                        <tr>
                        	<td colspan="3" align="right"  height="30px"></td>
                            <td align="right" style="background:#ddd; font-weight:bold"> Total </td>
                            <td align="right" style="background:#ddd; font-weight:bold">Rs. <?php echo $price; ?> </td>
                            <td style="background:#ddd; font-weight:bold"> </td>
						</tr>
					</table>
                    <p style="float:right; width: 215px; margin-top: 20px;"><a href="checkout.html"><strong>Proceed to checkout</strong></a></p>
                    <p style="float:right; width: 215px; margin-top: 20px;"><a href="productslist.php"><strong>Continue shopping</strong></a></p>
                      <?php
				}
				else
				{
				?>
                   <p><h2>No items found in the cart</h2></p>
                <?php
				}
				?>