<!DOCTYPE html>
<html>
<head>
    <title>Form Processor</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .result { background: #f0f0f0; padding: 20px; border-radius: 5px; margin: 20px 0; }
        .warning { color: red; font-weight: bold; }
        .field { margin: 10px 0; }
    </style>
</head>
<body>
    <h1>Form Processing Results</h1>
    
    <div class="result">
        <h2>Submitted Data:</h2>
        
        <div class="field">
            <strong>Name:</strong> 
            <?php echo htmlspecialchars($_GET['name'] ?? 'Not provided'); ?>
        </div>
        
        <div class="field">
            <strong>Password:</strong> 
            <span class="warning">
            <?php echo htmlspecialchars($_GET['password'] ?? 'Not provided'); ?>
            </span>
            <br><small class="warning">⚠️ Password is visible in URL!</small>
        </div>
        
        <div class="field">
            <strong>Book Price (Hidden Field):</strong> 
            $<?php echo htmlspecialchars($_GET['book_price'] ?? 'Not provided'); ?>
            <br><small>This was a hidden field that could be modified</small>
        </div>
        
        <?php if(isset($_GET['user_id'])): ?>
        <div class="field">
            <strong>User ID (Hidden Field):</strong> 
            <?php echo htmlspecialchars($_GET['user_id']); ?>
        </div>
        <?php endif; ?>
    </div>

    <h3>Security Analysis:</h3>
    <ul>
        <li>All data is visible in the browser address bar</li>
        <li>Hidden fields can be easily modified by attackers</li>
        <li>Passwords should NEVER use GET method</li>
        <li>Current URL: <?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?></li>
    </ul>

    <p><a href="javascript:history.back()">← Back to Form</a></p>
</body>
</html>
