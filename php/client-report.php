<div class="container">  
    <div class="title">Client Report</div>
    <div class="table-responsive">  
        <table id="client-table" class="table table-striped table-bordered">  
            <thead>  
                <tr>  
                    <td>Client Name</td>
                    <td>Chem Name</td>
                    <td>Quantity</td> 
                </tr>  
            </thead>  
            <?php  
                include("config.php");
                $query = "select client_name, chem_name , sum(quantity_used) quantity from chem_list c
                            join chem_used cu
                            on cu.chem_id=c.chem_id
                            join client_list cl
                            on cl.client_id=cu.client_id
                            group by cu.client_id,cu.chem_id";
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_array($result))  
                {  
                    echo '  
                    <tr> 
                        <td>'.$row["client_name"].'</td> 
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
    $('#client-table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>