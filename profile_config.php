<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Konfiguracja Profilu</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <h1>PHINDER</h1>
        <h2>Konfiguracja Profilu</h2>
    </div>
        
    <form method="post" action="update_profile.php" enctype="multipart/form-data">
        <div class="input-group">
          <label>Opis</label>
          <textarea name="description" required></textarea>
        </div>
        <div class="input-group">
          <label>Wiek</label>
          <input type="number" name="age" required>
        </div>
        <div class="input-group">
          <label>Hobby</label>
          <input type="text" name="hobby" required>
        </div>
        <div class="input-group">
          <button type="submit" class="btn" name="update_profile">Zaktualizuj Profil</button>
        </div>
    </form>
</body>
</html>
