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
                    <div class="title">Report</div>
                    <div class="input-box">
                        <label>Generate report based on</label>
                        <select name="report">
                            <option value="select">Select what should be the report based on</option>
                            <option value="chemical">Chemical</option>
                            <option value="client">Client</option>
                            <option value="test">Test</option>
                        </select>
                    </div>
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Chemical</th>
                                <th>Total In</th>
                                <th>Total Used</th>
                                <th>Remaining</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="input-box">
                                        <input type="text" value="Zinc" disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-box">
                                        <input type="text" value="100" style=" padding: 0; text-align: center;" disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-box">
                                        <input type="text" value="70" placeholder="70" style=" padding: 0; text-align: center;" disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-box">
                                        <input type="text" value="30" style=" padding: 0; text-align: center;" disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input-box">
                                        <input type="text" placeholder="Chemical name">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-box">
                                        <input type="text" placeholder="Rate per kg">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-box">
                                        <input type="text" placeholder="Quantity">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-box">
                                        <input type="text" value="₹ 0" disabled style=" padding: 0; text-align: center;">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="button">
                        <input type="button" onclick="location.href='user-details.html';" value="Update"/>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>