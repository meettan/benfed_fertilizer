<!DOCTYPE html>
<html>
<head>
    <title>Choose Columns</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 20px; 
            background: #f9f9f9;
        }
        h3, h4 {
            margin-bottom: 15px;
            color: #333;
        }
        .columns-box {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            width: 280px;
            height: 320px;
            float: left;
            overflow-y: auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .columns-box h4 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 16px;
            color: #007bff;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
        }
        .clear { clear: both; }
        .date-box {
            margin: 15px 10px;
            padding: 10px;
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            width: 580px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .date-box h4 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 16px;
            color: #28a745;
        }
        .date-row {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .date-row label {
            margin: 0;
            font-weight: bold;
        }
        .date-row input {
            width: 130px;
            height: 28px;
            padding: 2px 6px;
            font-size: 14px;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            background: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 15px;
        }
        button:hover { background: #0056b3; }
    </style>
</head>
<body>

<h4>Select Columns for Dynamic Report</h4>

<form method="post" action="<?php echo site_url('fert/rep/generate_report'); ?>">

    <!-- Purchase Columns -->
    <div class="columns-box">
        <h4>Purchase Columns</h4>
        <?php foreach ($purchase_fields as $col): ?>
            <label>
                <input type="checkbox" name="purchase_cols[]" value="<?php echo $col; ?>">
                <?php echo $col; ?>
            </label>
        <?php endforeach; ?>
    </div>

    <!-- Sale Columns -->
    <div class="columns-box">
        <h4>Sale Columns</h4>
        <?php foreach ($sale_fields as $col): ?>
            <label>
                <input type="checkbox" name="sale_cols[]" value="<?php echo $col; ?>">
                <?php echo $col; ?>
            </label>
        <?php endforeach; ?>
    </div>

    <!-- comp Columns -->
    <div class="columns-box">
        <h4>company Columns</h4>
        <?php foreach ($company_fields as $col): ?>
            <label>
                <input type="checkbox" name="company_cols[]" value="<?php echo $col; ?>">
                <?php echo $col; ?>
            </label>
        <?php endforeach; ?>
    </div>

    <div class="clear"></div>

    <!-- Date Range Filter -->
    <div class="date-box">
        <h4>📅 Filter by RO Date (td_purchase.ro_dt)</h4>
        <div class="date-row">
            <label for="from_date">From:</label>
            <input type="date" name="from_date" id="from_date" required>

            <label for="to_date">To:</label>
            <input type="date" name="to_date" id="to_date" required>
        </div>
    </div>

    <button type="submit">Generate Report</button>
</form>

</body>
</html>
