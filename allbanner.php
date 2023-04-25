<?php include('header.php');?>
<script>
function check() { 
  var x = confirm("Are you about to permamently delete these items. 'Cancel' to stop, 'Ok' to delete.");
  if (x)
      return true;
  else
    return false;
}
</script>
<script type="text/javascript">
$(document).ready( function() {
$("#txtEditor").Editor();                    
});
</script>
        <!--/. NAV TOP  -->
           <?php include('menu.php');?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           View All Inner Page banner
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
				 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Banner Detail
                        </div>
                        <div class="panel-body">
                            <div class="row">
							 
                              <div class="col-lg-12">
                                   <div class="panel panel-default">
                       
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SL NO</th>
                                          	 <th>Second Content</th>
											
											
											 <th>Banner image</th>
										<th>option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									include('config.php');
									$count=0;
									$query="SELECT * FROM banner_table";
									$res=mysql_query($query);
								while($row=mysql_fetch_array($res))	
								{   
								?>
                                    <tr class="odd gradeX">
									<td><?php echo ++$count; ?></td> 
									<td><?php  if(isset($row['banner_table_title'])){echo $row['banner_table_title'];}?></td>
									
					<td><img src="../uploads/<?php  if (isset($row['banner_table_image'])){echo $row['banner_table_image'];}?>"  height="200" width="250"></td>
	<td><a href="updatebannerimage.php?page=<?php echo $row['banner_table_id'];?>&&mod=slide"><button class="btn btn-primary" ><i class="fa fa-edit"></i>Change Image</button></a></td>
                                        </tr>
								<?php  } ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
						                        
<center>                  
  <ul class="pagination">
  <?php

?>          
    <li><a href="allproduct.php?ppage=<?php ?>"><?php ?></a></li>
  
 </ul>
  </center>
                    </div>
					
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
		<?php  include('footer.php');?>
				</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
