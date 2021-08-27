<!DOCTYPE html>
<html>
    <head>
        <title>Chemicals</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round"
            rel="stylesheet">
    </head>
    <body>
        <div class="wrapper">
            <header class="page-header">
                <nav>
                    <h2>Company</h2>
                    <ul>
                        <li>
                            <span onclick="location.href='update-stock.php';">Update Stock</span>
                          </li>
                       <li>
                            <span onclick="location.href='usage.php';">Usage Entry</span>
                        </li> 
                       <li>
                           <span onclick="location.href='report.php';">Report</span>
                        </li> 
                    </ul>
                </nav>
            </header>
            <div class="page-container">
                <div class="container">
                    <div class="title">Update Stock</div>
                    <form action="http://localhost/insert.php" method="POST">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Chemical</th>
                                <th>Rate Per Kilogram</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="input-box">
                                        <input type="text" placeholder="Chemical name" name="chemical_name" required> 
                                    </div>
                                </td>
                                <td>
                                    <div class="input-box">
                                        <input id="price" type="number" placeholder="Rate per kg" name="price" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-box">
                                        <input id="quantity" type="number" onfocusout="calculatePrice()" placeholder="Quantity" name="quantity" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-box">
                                        <input id="total" type="text" value="" style=" padding: 0; text-align: center;" disabled>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="buttons-row">
                        <div class="button"> 
                            <button>
                               Add Item
                            </button>
                        </div>
                        <div class="button">
                            <button type="submit" onclick="calculatePrice()" value="">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
                    
                </div>
            </div>
        </div>
        <script>
            function calculatePrice() {
                var price, quantity, total;
                price = parseInt(document.getElementById("price").value);
                quantity = parseInt(document.getElementById("quantity").value);
                total = price * quantity;
                document.getElementById("total").value = "₹ " + total;
            }
        </script>
    </body>
</html>