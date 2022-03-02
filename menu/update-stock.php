<!DOCTYPE html>

<html>
    <head>
        <title>Chemicals</title>
        <link rel="stylesheet" href="..\assets\css\style.css">
        <script src="..\assets\js\autocomplete\jquery.min.js"></script>
    </head>
    <body>
        <?php
            // if($_SESSION["username"]) {
                ?>
                <div class="wrapper">
                    <?php include "../php/header.php" ?>
                    <div class="page-container">
                        <div class="container">
                            <div class="title">Update Stock</div>
                            <p id="date" style="margin: 0 30px; text-align: right; font-weight:500;"></p>
                            <form action="../php/insert-stock.php" method="POST">
                                <table class="content-table">
                                    <thead>
                                        <tr>
                                            <th>Chemical</th>
                                            <th>Supplier</th>
                                            <th>Rate Per Kilogram</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody id="stock-table">
                                        <tr class='tr_input'>
                                            <td>
                                            <div class="input-box">
                                                <input type="text" id="chemical_id_1"  placeholder="Chemical ID" name="chemical_id[]" hidden> 
                                            </div>
                                            <div class="input-box">
                                                <input type="text" id="chemical_name_1" class="test-input" placeholder="Chemical name" list="chem_dl_1" name="chemical_name[]" autocomplete="off" autocomplete='off' required>
                                            </div>
                                            </td>
                                            <td>
                                            <div class="input-box">
                                                <input type="text" id="supplier_id_1"  placeholder="Supplier ID" name="supplier_id[]" hidden> 
                                            </div>
                                            <div class="input-box">
                                                <input type="text" id="supplier_name_1" class="supp-input" placeholder="Supplier name" list="supp_dl_1" name="supplier_name[]" autocomplete="off" autocomplete='off' required>
                                            </div>
                                            </td>
                                            <td>
                                            <div class="input-box">
                                                <input type="number" id="price_1" placeholder="Rate per kg" name="price[]" autocomplete='off' required>
                                            </div>
                                            </td>
                                            <td>
                                            <div class="input-box">
                                                <input type="number" id="quantity_1"  placeholder="Quantity" name="quantity[]"  autocomplete='off' required>
                                            </div>
                                            </td>
                                            <td>
                                            <div class="input-box">
                                                <input type="text" id="itemtotal_1" name="itemtotal_1" style=" padding: 0; text-align: center;" disabled>
                                            </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="buttons-row">
                                    <div class="button"> 
                                        <button type="button" id="add-item" name="add-item">
                                        <img src="../assets/icons/add.svg" alt="">
                                            <p>Add Item</p>
                                        </button>
                                    </div>
                                    <p id="total">Total: ₹0</p>
                                    <div class="button">
                                        <button type="submit" name="update" value="">
                                        <img src="../assets/icons/done.svg" alt="">
                                            <p>Update</p>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <script type="text/javascript" src="..\assets\js\main.js"></script>
                <link href = "..\assets\js\autocomplete\jquery-ui.css"
                    rel = "stylesheet">
                <script src = "..\assets\js\autocomplete\jquery-1.10.2.js"></script>
                <script src = "..\assets\js\autocomplete\jquery-ui.js"></script>

                <script>
                    var total=0;
                    var temp;
                    $(document).ready(function(){
                        $(document).on('keydown', '.test-input', function() {
                            var id = this.id;
                            var splitid = id.split('_');
                            var index = splitid[2];
        
                            $( '#'+id ).autocomplete({
                                source: function( request, response ) {
                                    $.ajax({
                                        url: "../php/autocomplete-chemical.php",
                                        type: "POST",
                                        dataType: "json",  
                                        data: {
                                            search: request.term
                                        },
                                        success: function( data ) {
                                            response( data );
                                        }
                                    });
                                },

                                select: function (event, ui) {
                                    $(this).val(ui.item. label);
                                    var chemid = ui.item.value;
                                    document.getElementById('chemical_id_'+index).value = chemid;
                        
                                    return false;
                                },
                            });
                        });

                        $(document).on('keydown', '.supp-input', function() {
                            var id = this.id;
                            var splitid = id.split('_');
                            var index = splitid[2];
                            
                            $( '#'+id ).autocomplete({
                                source: function( request, response ) {
                                    $.ajax({
                                        url: "../php/autocomplete-supplier.php",
                                        type: "POST",
                                        dataType: "json",  
                                        data: {
                                            search: request.term
                                        },
                                        success: function( data ) {
                                            response( data );
                                        }
                                    });
                                },

                                select: function (event, ui) {
                                    $(this).val(ui.item. label); 
                                    var chemid = ui.item.value;
                                    document.getElementById('supplier_id_'+index).value = chemid;
                        
                                    return false;
                                },
                            });
                        });

                        $('#add-item').click(function(){
                            var lastname_id = $('.tr_input input[type=text]:nth-child(1)').last().attr('id');
                            var split_id = lastname_id.split('_');
                            var index = Number(split_id[1]);
                            var name=document.getElementById('chemical_name_'+index).value;
                            var price=document.getElementById('itemtotal_'+index).value;
                            if(name!='' && price !=''){
                                var newindex=index+1;
                                var html = "<tr class='tr_input'><td><div class='input-box'><input type='text' id='chemical_id_"+newindex+"'  placeholder='Chemical ID' name='chemical_id[]' hidden></div><div class='input-box'><input type='text' id='chemical_name_"+newindex+"' class='test-input' placeholder='Chemical name' name='chemical_name[]' autocomplete='off' autocomplete='off' required></div><td><div class='input-box'><input type='text' id='supplier_id_"+newindex+"'  placeholder='Supplier ID' name='supplier_id[]' hidden></div><div class='input-box'><input type='text' id='supplier_name_"+newindex+"' class='supp-input' placeholder='Supplier name' name='supplier_name[]' autocomplete='off' autocomplete='off' required></div></td><td><div class='input-box'><input type='number' id='price_"+newindex+"' placeholder='Rate per kg' name='price[]' autocomplete='off' required></div></td><td><div class='input-box'><input type='number' id='quantity_"+newindex+"'  placeholder='Quantity' name='quantity[]'  autocomplete='off' required></div></td><td><div class='input-box'><input type='text' id='itemtotal_"+newindex+"' name='itemtotal[]' style= 'padding: 0; text-align: center;' disabled></div></td></tr>";
                            }
                            $('tbody').append(html);
                        });
                    });

                    $(document).change(function(){
                        var lastname_id = $('.tr_input input[type=text]:nth-child(1)').last().attr('id');
                        var split_id = lastname_id.split('_');
                        var index = split_id[1];
                        temp=  'quantity_'+ index;
                        $('#'+temp).blur(function() {
                            document.getElementById('itemtotal_'+index).value = document.getElementById('quantity_'+index).value * document.getElementById('price_'+index).value;
                            var x=0;
                            for( var m=1;m<=index;m++){
                                x=x+Number(document.getElementById('itemtotal_'+m).value);
                            }
                            $('#total').html("Total: ₹" + x);
                        });
                        
                    });
                   
                </script>
                <?php
            // }
            // else
            //     header("Location:../");
        ?>
    </body>
</html>