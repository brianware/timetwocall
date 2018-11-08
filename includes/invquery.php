 <?php
 if(isset($_POST['barcode'])){
 
    include_once 'includes/mssql-config.php';
    $connectionInfo = array( "Database"=>MSDATABASE, "UID"=>MSUSER, "PWD"=>MSPASSWORD);
    $conn = sqlsrv_connect( MSHOST, $connectionInfo);
 
            if( $conn === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
    $barcode = $_POST['barcode'];
    $sql =  "SELECT TOP 1000 i.Invt_Code,i.Invt_Name,sum(x.INTran_Quantity) AS Intran_Quantity,x.INTran_UnitCost FROM dbo.Inventory i INNER JOIN (SELECT t.Inventory,b.INBatch_TranDate,b.Oid,t.INTran_Quantity,t.INTran_UnitCost FROM dbo.INTran t INNER JOIN dbo.INBatch b ON t.INBatch = b.Oid)x ON i.Oid = x.Inventory INNER JOIN (SELECT y.Inventory,max(y.INBatch_TranDate) max_date FROM (SELECT t.Inventory,b.INBatch_TranDate FROM  dbo.INTran t INNER JOIN  dbo.INBatch b ON t.INBatch = b.Oid)y GROUP BY y.Inventory)z ON z.Inventory=x.Inventory AND z.max_date=x.INBatch_TranDate WHERE i.Invt_Code LIKE ? or i.Invt_Name LIKE ? GROUP BY i.Invt_Code , i.Invt_Name , x.INTran_UnitCost;";
    $params = array("%".$barcode."%" , "%".$barcode."%");
    $options =  array( "Scrollable" => 'static' );
    $stmt = sqlsrv_query( $conn, $sql, $params, $options );
    if( $stmt === false) {
         die( print_r( sqlsrv_errors(), true) );
      
    }    else {
   
            
    
            if (!sqlsrv_num_rows($stmt)) {
                          
              echo "<span style='color:red;'>$barcode </span><span>not found</span>";
            } else {
                echo "<table>"; // start a table tag in the HTML
                echo "<tr><th>Item No</th><th>Item Name</th><th>Quantity</th><th>Unit Cost</th></tr>";
                while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){   //Creates a loop to loop through results
                    echo "<tr><td>" . $row['Invt_Code'] . "</td><td>" . $row['Invt_Name'] . "</td><td>" . $row['Intran_Quantity'] . "</td><td>" . $row['INTran_UnitCost'] . "</td></tr>";  //$row['index'] the index here is a field name
                }
                
                echo "</table>"; //Close the table in HTML
                sqlsrv_free_stmt( $stmt);
                            
            }
    }
 }
 
 
  
 
 
 
?>