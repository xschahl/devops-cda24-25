FROM nginx:alpine

# Installation des outils nécessaires
RUN apk add --no-cache bash

# Copie des fichiers de l'application
COPY src/ /usr/share/nginx/html/

# Ajout d'un timestamp aux fichiers CSS pour forcer le rafraîchissement
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Configuration nginx
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Permissions correctes
RUN chmod -R 755 /usr/share/nginx/html

# Utilisation de notre script de démarrage
CMD ["/start.sh"]