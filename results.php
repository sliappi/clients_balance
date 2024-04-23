<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h1>Results</h1>
            </div>
            <div class="col" style="text-align:right;">
                <?php
                if(basename($_SERVER['PHP_SELF']) != 'index.php') {
                    echo "<a href='index.php' class='btn btn-primary'>Back</a>";
                }
                ?>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <form id="categoryForm" action="#" method="post">
                    <div class="mb-3">
                        <label for="categoryFilter" class="form-label"><strong>Category</strong></label>
                        <select name="categoryFilter" id="categoryFilter" class="form-select">
                            <option value="">All Categories</option>
                            <?php
                            include 'db.php';

                            $sql = "SELECT * FROM categories";
                            $result = mysqli_query($conn, $sql);

                            while($row = mysqli_fetch_assoc($result)) {
                                $selected = ($_POST['categoryFilter'] == $row['cat_id']) ? 'selected' : '';
                                echo "<option value='" . $row['cat_id'] . "' $selected>" . $row['description'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Company Name</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($_POST['categoryFilter']) && !empty($_POST['categoryFilter'])) {
                            $categoryFilter = $_POST['categoryFilter'];
                            $sql = "SELECT companies.name AS company_name, companies.amount, categories.description AS category_description
                                    FROM companies
                                    INNER JOIN categories ON companies.cat_id = categories.cat_id
                                    WHERE categories.cat_id = '$categoryFilter'";
                        } else {
                            $sql = "SELECT companies.name AS company_name, companies.amount, categories.description AS category_description
                                    FROM companies
                                    INNER JOIN categories ON companies.cat_id = categories.cat_id";
                        }

                        $result = mysqli_query($conn, $sql);

                        $totalAmount = 0;

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['category_description'] . "</td>";
                                echo "<td>" . $row['company_name'] . "</td>";
                                echo "<td>" . $row['amount'] . "</td>";
                                echo "</tr>";
                                
                                $totalAmount += $row['amount'];
                            }
                        } else {
                            echo "<tr><td colspan='3'>No records found</td></tr>";
                        }

                        echo "<tr><td colspan='2' class='text-end'><strong>Total Amount:</strong></td><td>$totalAmount</td></tr>";
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById("categoryFilter").addEventListener("change", function() {
            document.getElementById("categoryForm").submit();
        });
    </script>
</body>
</html>
