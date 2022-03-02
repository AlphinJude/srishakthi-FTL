
convertDate();

function convertDate() {
    var month = new Array();
    month[0] = "January";
    month[1] = "February";
    month[2] = "March";
    month[3] = "April";
    month[4] = "May";
    month[5] = "June";
    month[6] = "July";
    month[7] = "August";
    month[8] = "September";
    month[9] = "October";
    month[10] = "November";
    month[11] = "December";

    var d = new Date();
    var month = month[d.getMonth()];
    var date = d.getDate();
    var year = d.getFullYear();
    document.getElementById("date").innerHTML = date + ' ' + month + ', ' + year;
}

function calculatePrice() {
    var price, quantity, total;
    price = parseInt(document.getElementById("price").value);
    quantity = parseInt(document.getElementById("quantity").value);
    total = price * quantity;
    document.getElementById("total").value = "₹ " + total;
}

function addStockItem() {
    // Get last id 
    var lastname_id = $('.tr_input input[type=text]:nth-child(1)').last().attr('id');
    var split_id = lastname_id.split('_');

    // New index
    var index = Number(split_id[1]) + 1;


    // Create row with input elements
    var html = "<tr class='tr_input'><td><div class='input-box'><input type='text' id='chemical_name_"+index+"' placeholder='Chemical name' name='chemical_name_"+index+"' required></div></td><td><div class='input-box'><input type='number' id='price_"+index+"' placeholder='Rate per kg' name='price_"+index+"' autocomplete='off' required></div></td><td><div class='input-box'><input type='number' id='quantity_"+index+"'  placeholder='Quantity' name='quantity_"+index+"' autocomplete='off' required></div></td><td><div class='input-box'><input type='text' id='itemtotal_"+index+"' name='itemtotal_"+index+"' style= 'padding: 0; text-align: center;' disabled></div></td></tr>";
    // Append data
    $('tbody').append(html);
};


function addNewChemical() {
    document.getElementById("add-chemical").style.display = "block";
}

function addChemicalRow(){
    $("<tbody>").load("../php/add-chemical.php", function() {
        $("#add-chemical-table").append($(this).html());
     });	
}

function closeAddChemical(){
    document.getElementById("add-chemical").style.display = "none";
}

function uploadChemical(){
    document.getElementById("upload-chemical").style.display = "block";
}

function closeUploadChemical(){
    document.getElementById("upload-chemical").style.display = "none";
}

function addNewClient() {
    document.getElementById("add-client").style.display = "block";
}

function addClientRow(){
    $("<tbody>").load("../php/add-client.php", function() {
        $("#add-client-table").append($(this).html());
     });	
}

function closeAddClient(){
    document.getElementById("add-client").style.display = "none";
}

function addNewTest() {
    document.getElementById("add-test").style.display = "block";
}

function addTestRow(){
    $("<tbody>").load("../php/add-test.php", function() {
        $("#add-test-table").append($(this).html());
     });	
}

function closeAddTest(){
    document.getElementById("add-test").style.display = "none";
}

function addNewSupplier() {
    document.getElementById("add-supplier").style.display = "block";
}

function addSupplierRow(){
    $("<tbody>").load("../php/add-supplier.php", function() {
        $("#add-supplier-table").append($(this).html());
     });	
}

function closeAddSupplier(){
    document.getElementById("add-supplier").style.display = "none";
}

function displayLogoutWarning() {
    document.getElementById("logout-warning").style.display = "flex";
}

function closeLogoutWarning() {
    document.getElementById("logout-warning").style.display = "none";
}