 <?php
 if(isset($_POST['barcode'])){
 
    
    $connectionInfo = array( "Database"=>MSDATABASE, "UID"=>MSUSER, "PWD"=>MSPASSWORD);
    $conn = sqlsrv_connect( MSHOST, $connectionInfo);
 
            if( $conn === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
    $barcode = $_POST['barcode'];
    $sql =  "SELECT i.Invt_Code,i.Invt_Name,l.InvtStore_QtyOnHand,l.InvtStore_AvgCost FROM dbo.InventoryStore l INNER JOIN dbo.Inventory i ON i.Oid=l.Inventory WHERE l.InvtStore_Store=? AND i.Invt_Code LIKE ? or i.Invt_Name LIKE ?;";
    $params = array(STOREC,"%".$barcode."%" , "%".$barcode."%");
    $options =  array( "Scrollable" => 'static' );
    $stmt = sqlsrv_query( $conn, $sql, $params, $options );
    if( $stmt === false) {
         die( print_r( sqlsrv_errors(), true) );
      
    }    else {
   
        $num_row =  sqlsrv_num_rows($stmt);
    
            if (!sqlsrv_num_rows($stmt)) {
                          
              echo "<span style='font-size:14px;color:red;'>$barcode </span><span style='font-size:14px;'>not found</span>";
            } else {
                echo "<p style='font-size:14px;'>Showing $num_row results for $barcode </p>";
                echo "<table>"; // start a table tag in the HTML
               
                echo "<tr><th>Item No</th><th>Item Name</th><th>Quantity</th><th>Unit Cost</th></tr>";
                while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){   //Creates a loop to loop through results
                    echo "<tr><td>" . $row['Invt_Code'] . "</td><td>" . $row['Invt_Name'] . "</td><td>" . $row['InvtStore_QtyOnHand'] . "</td><td>" . $row['InvtStore_AvgCost'] . "</td></tr>";  //$row['index'] the index here is a field name
                }
                
                echo "</table>"; //Close the table in HTML
                sqlsrv_free_stmt( $stmt);
                            
            }
    }
 }
 
 
  
 
?>