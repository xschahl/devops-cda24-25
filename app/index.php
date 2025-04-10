<?php
include 'connect.php';

$connection = getConnectionStatus();
$countries = getCountries(25);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pays du Monde - Demo DevOps</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Liste des Pays</h1>
            <p class="subtitle">Demo DevOps CDA 2024-2025</p>
        </header>
        
        <div class="status-bar <?php echo $connection['status']; ?>">
            <div class="status-indicator"></div>
            <p><?php echo $connection['message']; ?></p>
        </div>
        
        <?php if($countries['status'] === 'success'): ?>
            <div class="data-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ISO</th>
                            <th>Pays</th>
                            <th>Nom courant</th>
                            <th>ISO3</th>
                            <th>Code numérique</th>
                            <th>Code téléphonique</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($countries['data'] as $country): ?>
                        <tr>
                            <td><?php echo $country['id']; ?></td>
                            <td><?php echo $country['iso']; ?></td>
                            <td><?php echo $country['name']; ?></td>
                            <td><?php echo $country['nicename']; ?></td>
                            <td><?php echo $country['iso3'] ?: '-'; ?></td>
                            <td><?php echo $country['numcode'] ?: '-'; ?></td>
                            <td><?php echo $country['phonecode']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="error-message">
                <p><?php echo $countries['message']; ?></p>
            </div>
        <?php endif; ?>
        
        <footer>
            <p>&copy; <?php echo date('Y'); ?> - CDA DevOps - Tous droits réservés</p>
        </footer>
    </div>
    
    <?php closeConnection(); ?>
</body>
</html>
