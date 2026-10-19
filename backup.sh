#!/bin/bash
BACKUP_DIR="/home/vmalessiob/project_work/backups"
DATE=$(date +%Y%m%d_%H%M%S)
CONTAINER_NAME="project_work-db-1"
DB_NAME="mio_database"
DB_USER="root"
DB_PASS="rootpassword"

# Esegue il backup tramite mysqldump all'interno del container
docker exec -i $CONTAINER_NAME mysqldump -u$DB_USER -p$DB_PASS $DB_NAME > "$BACKUP_DIR/backup_$DATE.sql"

# (Opzionale) Elimina i backup più vecchi di 7 giorni per non riempire il disco
find $BACKUP_DIR -type f -name "*.sql" -mtime +7 -exec rm {} \;
