#!/bin/bash

# Génération d'un timestamp unique pour invalider le cache
TIMESTAMP=$(date +%s)

# Mise à jour des liens CSS dans tous les fichiers HTML
for file in /usr/share/nginx/html/*.html; do
  sed -i "s/styles\.css/styles.css?v=$TIMESTAMP/g" "$file"
  echo "Applied cache busting to CSS in $file"
done

# Démarrage de nginx en mode foreground
echo "Starting nginx..."
exec nginx -g "daemon off;"
