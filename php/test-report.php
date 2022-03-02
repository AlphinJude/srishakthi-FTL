<div class="container">  
    <div class="title">Test Report</div>
    <div class="table-responsive">  
        <table id="test-table" class="table table-striped table-bordered">  
            <thead>  
                <tr>  
                    <td>Test Name</td>
                    <td>Chemical Name</td>
                    <td>Quantity Used</td> 
                </tr>  
            </thead>  
            <?php  
                include("config.php");
                $query = "select test_name, chem_name , sum(quantity_used) quantity from chem_list c
                            join chem_used cu
                            on cu.chem_id=c.chem_id
                            join tests t
                            on t.test_id=cu.test_id
                            group by cu.test_id,t.test_id";
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_array($result))  
                {  
                    echo '  
                    <tr> 
                        <td>'.$row["test_name"].'</td> 
                        <td>'.$row["chem_name"].'</td>  
                        <td>'.$row["quantity"].'</td>    
                    </tr>  
                    ';  
                }  
            ?>  
        </table>  
    </div>  
</div>      

<script>    
    $(document).ready(function() {
    $('#test-table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>

