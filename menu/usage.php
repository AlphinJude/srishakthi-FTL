<!DOCTYPE html>
<?php
    // session_start();
?>
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
                    <div class="title">Usage Entry</div>
                    <p id="date" style="margin: 0 30px; text-align: right; font-weight:500;"></p>
                    <form action="../php/insert-usage.php" method="POST">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Chemical</th>
                                    <th>In Stock</th>
                                    <th>Test</th>
                                    <th>Client</th>
                                    <th>Required Quantity</th>
                                </tr>
                            </thead>
                            <tbody id="usage-table">
                                <tr class='tr_input'>
                                    <td>
                                    <div class="input-box">
                                        <input type="text" id="chemical_id_1"  placeholder="Chemical ID" name="chemical_id[]" hidden> 
                                    </div>
                                    <div class="input-box">
                                        <input type="text" id="chemical_name_1" class="sugg-chemical" placeholder="Chemical name" name="chemical_name[]" autocomplete='off' required> 
                                    </div>
                                    </td>
                                    <td>
                                        <div class="input-box">
                                            <input type="text" id="in_stock_1" name="in_stock" disabled>
                                        </div>
                                    </td>
                                    <td>
                                    <div class="input-box">
                                        <input type="text" id="test_id_1" placeholder="Test ID" name="test_id[]" hidden> 
                                    </div>
                                    <div class="input-box">
                                        <input type="text" id="test_name_1" class="sugg-test" placeholder="Test name" name="test_name" autocomplete='off' required>
                                        </div>
                                    </td>
                                    <td>
                                    <div class="input-box">
                                        <input type="text" id="client_id_1"  placeholder="Client ID" name="client_id[]" hidden> 
                                    </div>
                                    <div class="input-box">
                                        <input type="text" id="client_name_1" class="sugg-client" placeholder="Client name" name="client_name" autocomplete='off' required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-box">
                                            <input type="number" id="quantity_1"  placeholder="Required Quantity" name="quantity[]"  autocomplete='off' required>
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
                    $(document).ready(function(){
                        $(document).on('keydown', '.sugg-chemical', function() {
                            var id = this.id;
                            // console.log(id);
                            var splitid = id.split('_');
                            var index = splitid[2];
                            
                            // Initialize jQuery UI autocomplete
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
                                    $(this).val(ui.item. label); // display the selected text
                                    var chemid = ui.item.value; // selected value
                                    document.getElementById('chemical_id_'+index).value = chemid;
                                    
                                    return false;
                                },
                            });
                        });

                        $(document).on('keydown', '.sugg-test', function() {
                            // console.log("keydown");
                            var id = this.id;
                            // console.log(id);
                            var splitid = id.split('_');
                            var index = splitid[2];
                            
                            // Initialize jQuery UI autocomplete
                            $( '#'+id ).autocomplete({
                                source: function( request, response ) {
                                    $.ajax({
                                        url: "../php/autocomplete-test.php",
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
                                    $(this).val(ui.item. label); // display the selected text
                                    var testid = ui.item.value; // selected value
                                    document.getElementById('test_id_'+index).value = testid;
                        
                                    return false;
                                },
                            });
                        });

                        $(document).on('keydown', '.sugg-client', function() {
                            var id = this.id;
                            // console.log(id);
                            var splitid = id.split('_');
                            var index = splitid[2];
                            
                            // Initialize jQuery UI autocomplete
                            $( '#'+id ).autocomplete({
                                source: function( request, response ) {
                                    $.ajax({
                                        url: "../php/autocomplete-client.php",
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
                                    $(this).val(ui.item. label); // display the selected text
                                    var chemid = ui.item.value; // selected value
                                    document.getElementById('client_id_'+index).value = chemid;
                        
                                    return false;
                                },
                            });
                        });

                        $('#add-item').click(function(){
                            // Get last id 
                            var lastname_id = $('.tr_input input[type=text]:nth-child(1)').last().attr('id');
                            var split_id = lastname_id.split('_');

                            // New index
                            var index = Number(split_id[2]);

                            // Create row with input elements
                            var name=document.getElementById('chemical_name_'+index).value;
                            var price=document.getElementById('quantity_'+index).value;

                            if(name!='' && price !=''){
                                var newindex=index+1;
                                var html = '<tr class="tr_input"><td><div class="input-box"><input type="text" id="chemical_id_'+newindex+'"  placeholder="Chemical ID" name="chemical_id[]" hidden></div><div class="input-box"><input type="text" id="chemical_name_'+newindex+'" class="sugg-chemical" placeholder="Chemical name" name="chemical_name[]" autocomplete="off" required></div></td><td><div class="input-box"><input type="text" id="in_stock_'+newindex+'" name="in_stock" disabled></div></td><td><div class="input-box"><input type="text" id="test_id_'+newindex+'" placeholder="Test ID" name="test_id[]" hidden></div><div class="input-box"><input type="text" id="test_name_'+newindex+'" class="sugg-test" placeholder="Test name" name="test_name" autocomplete="off" required></div></td><td><div class="input-box"><input type="text" id="client_id_'+newindex+'"  placeholder="Client ID" name="client_id[]" hidden></div><div class="input-box"><input type="text" id="client_name_'+newindex+'" class="sugg-client" placeholder="Client name" name="client_name" autocomplete="off" required></div></td><td><div class="input-box"><input type="number" id="quantity_'+newindex+'"  placeholder="Required Quantity" name="quantity[]"  autocomplete="off" required></div></td></tr>';
                            }

                            // Append data
                            $('tbody').append(html);
                        });
                    });

                    $(document).change(function(){
                        // console.log("ijvsi");
                        var lastname_id = $('.tr_input input[type=text]:nth-child(1)').last().attr('id');
                        var split_id = lastname_id.split('_');

                        // New index
                        var index = split_id[2];
                        var temp = 'chemical_name_'+ index;
                        var x=document.getElementById('chemical_id_'+index).value;
                        $("#"+temp).blur(function(){
                            $.ajax({url: '../php/get-stock.php',
                                    type: 'POST',
                                    data: 
                                    {
                                        search: x
                                    },})
                            .done(function(response){
                                document.getElementById('in_stock_'+index).value=response.toString().split('"')[1];
                            })
                        });
                        
                        var temp1='quantity_'     +index;
                        
                        $("#"+temp1).blur(function(){
                            var stock=parseFloat(document.getElementById('in_stock_'+index).value);
                            var quantity=parseFloat(document.getElementById(temp1).value);

                            if ( quantity > stock){
                                alert("Enter Minimum value than the In-Stock values");
                                document.getElementById(temp1).value='';
                            }
                        });
                    });
                    
                </script>
        <?php
    // }
    //     else
    //         header("Location:../index.html");
?>
    </body>
</html>