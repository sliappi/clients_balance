<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Company</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h1>Insert Company</h1>
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
                <form method="post" action="save.php" onsubmit="return validateForm()">
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-select">
                            <?php
                            include 'index.php';
                            
                            $sql = "SELECT * FROM categories";
                            $result = mysqli_query($conn, $sql);
                            
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['cat_id'] . "'>" . $row['description'] . "</option>";
                                }
                            } else {
                                echo "<option>No categories found</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="company" class="form-label">Company</label>
                        <input type="text" class="form-control" id="company" name="company">
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="text" class="form-control" id="amount" name="amount">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
    <script>
        function validateForm() {
            var company = document.getElementById("company").value;
            var amount = document.getElementById("amount").value;
            
            if (company.trim() == "") {
                alert("Please enter a company name.");
                return false;
            }
            
            if (amount.trim() == "") {
                alert("Please enter an amount.");
                return false;
            }
            
            return true;
        }
    </script>
</body>
</html>
