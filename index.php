<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <div class="row d-flex justify-content-center align-items-center" style="min-height: 50vh;">
        <div class="col-md-5">
            <div class="box shadow bg-light p-4">
                <h1 class="text-center mt-3">Currency Converter</h1>
                <div class="mt-4">
                <form method="POST">
    <div class="form-group mb-3">
      <label>Amount:</label>
      <input type="number" class="form-control" name="amount" autocomplete="off" required>
    </div>
    <div class="form-group mb-3">
      <label>From:</label>
      <select class="form-control" name="from" required>
        <option value="">Select currency</option>
        <option value="USD">US Dollar</option>
        <option value="EUR">Euro</option>
        <option value="GBP">British Pound</option>
        <option value="GBP">Indian Rupee</option>
      </select>
    </div>
    <div class="form-group mb-3">
      <label>To:</label>
      <select class="form-control" name="to" required>
        <option value="">Select currency</option>
        <option value="USD">US Dollar</option>
        <option value="EUR">Euro</option>
        <option value="GBP">British Pound</option>
        <option value="GBP">Indian Rupee</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary w-100">Convert</button>
  </form>
</div>
</div>
</div>
</div>
  <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $amount = $_POST['amount'];
      $from = $_POST['from'];
      $to = $_POST['to'];
      $url = "https://api.exchangerate-api.com/v4/latest/$from";
      $data = file_get_contents($url);
      $exchangeRates = json_decode($data, true)['rates'];
      $rate = $exchangeRates[$to];
      $result = $amount * $rate;
      echo "<p class='text-center mt-5'><strong>Result:</strong> $result $to</p>";
    }
  ?>
</div>    
</body>
</html>
