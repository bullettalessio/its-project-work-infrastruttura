# ITS Umbria Academy - Project Work Infrastruttura & DevOps

**Membri del Gruppo:** Alessio, Zakaria, Francesco, Mattia  
**Tema:** Infrastruttura Web Containerizzata, Risoluzione DNS Autoritativa e Automazione Backup su Ubuntu Linux.

## 📂 Contenuto del Repository
- `docker-compose.yml` : File di orchestrazione per Docker (Web, MySQL, phpMyAdmin, Technitium DNS, Portainer).
- `backup.sh` : Script Bash per l'automazione dei dump di sicurezza del database pianificato via Cronjob.
- `docs/` : Timeline di progetto (40 ore) e analisi dei costi (On-Premise vs Cloud AWS RDS).
- `slides/` : Presentazione ufficiale del progetto per la LIM.

## 🚀 Istruzioni di Avvio Rapido
1. Clona il repository sulla Macchina Virtuale:
   ```bash
   git clone https://github.com/bullettalessio/its-project-work-infrastruttura
   cd project_work
