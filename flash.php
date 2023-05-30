<!DOCTYPE html>
<html>
<head>
    <title>Anmeldefenster</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('https://cdn.pixabay.com/photo/2017/07/19/17/16/flower-2519771_1280.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }
        
        .container {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            background-color: transparent;
            border: none;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border-radius: 3px;
            border: 1px solid #ccc;
            background-color: hsla(53, 93%, 63%, 0.957);
        }
        
        .btn {
            display: inline-block;
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        
        .btn:hover {
            background-color: #45a049;
        }
        .flash-message {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
            display: none;
            animation: fadeOut 3s ease-in-out;
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                opacity: 0;
                display: none;
            }
        }
    </style>
</head>
<body>
    <?php
    if (isset($_POST['submit'])) {
        // Hier kannst du die Überprüfung des Anmeldeformulars implementieren
        // Wenn die Anmeldung erfolgreich ist, zeige die Flash-Nachricht an
        $flashMessage = 'Sie wurden erfolgreich angemeldet!';
    }
    ?>

    <div class="container">
        <h1>Anmelden</h1>
        <form method="POST">
            <div class="form-group">
                <label for="username">Vorname:</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Nachname:</label>
                <input type="text" id="password" name="password">
            </div>
            <button type="submit" name="submit" class="btn">Anmelden</button>
        </form>

        <?php if (isset($flashMessage)) : ?>
            <div class="flash-message">
                <?php echo $flashMessage; ?>
            </div>
            <script>
        window.addEventListener('DOMContentLoaded', function() {
            var flashMessage = document.querySelector('.flash-message');
            if (flashMessage) {
                flashMessage.style.display = 'block';
                setTimeout(function() {
                    flashMessage.style.display = 'none';
                }, 3000);
            }
        });
    </script>
        <?php endif; ?>
    </div>
</body>
</html>
