<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Info Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 50px;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
        .phpinfo pre {
            margin: 0; 
            font-family: monospace;
        }
        .phpinfo a:link {
            color: #009; 
            text-decoration: none; 
            background-color: #fff;
        }
        .phpinfo a:hover {
            text-decoration: underline;
        }
        .phpinfo table {
            border-collapse: collapse;
            width: 100%;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .phpinfo table th, .phpinfo table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .phpinfo table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .phpinfo table tr:hover {
            background-color: #ddd;
        }
        .phpinfo table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">System Info Dashboard</a>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>System Information</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        ob_start();
                        phpinfo();
                        $pinfo = ob_get_contents();
                        ob_end_clean();

                        // Clean up the phpinfo() output and embed it in the page
                        $pinfo = preg_replace('%^.*<body>(.*)</body>.*$%ms','$1',$pinfo);
                        echo "<div class='phpinfo'>$pinfo</div>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
