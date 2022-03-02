<div class="container">
    <div class="title">Chemical Report</div>
    <div class="table-responsive">  
        <table id="chemical-table" class="table table-striped table-bordered">
             <thead>
                <tr>
                    <td>Date</td>  
                    <td>Chemical Name</td>  
                    <td>Customer Name</td>
                    <td>Test</td>
                    <td>Quantity Used</td>
                    
                </tr>  
                
            </thead>  
            <?php  
                include("config.php");
                $query = "select cu.date as Date,cl.chem_name chname,cli.client_name cname,t.test_name tname,sum(cu.quantity_used) quantity from chem_used cu
                join chem_list cl
                on cl.chem_id=cu.chem_id
                join client_list cli
                on cli.client_id=cu.client_id
                join tests t
                on t.test_id=cu.test_id
                group by cu.date,cu.chem_id,cu.client_id
                order by cu.date";
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_array($result))  
                {  
                    echo '  
                    <tr>
                        <td>'.$row["Date"].'</td>
                        <td>'.$row["chname"].'</td>  
                        <td>'.$row["cname"].'</td> 
                        
                        <td>'.$row["tname"].'</td>
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
    $('#chemical-table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>