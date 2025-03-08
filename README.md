# SaveSmart

SaveSmart est une application de gestion financière personnelle conçue pour aider les utilisateurs à mieux gérer leurs finances de manière simple et efficace. Ce projet combine l'utilisation du framework Laravel et une gestion agile du développement.

## Fonctionnalités

### Fonctionnalités de base (S1) :
- Inscription et authentification sécurisée des utilisateurs.
- Gestion multi-utilisateurs sous un même compte familial.
- Suivi des revenus, dépenses et objectifs financiers via des formulaires CRUD.
- Visualisation graphique des finances (tableaux et diagrammes).
- Catégories personnalisables (Alimentation, Logement, Divertissement, Épargne).

### Fonctionnalités avancées (S2) :
- Création et suivi d'objectifs d’épargne.
- Affichage de la progression des économies.
- Algorithme d’optimisation budgétaire basé sur des règles logiques.
- Intégration de la méthode 50/30/20 (Besoins 50% / Envies 30% / Épargne 20%).
- Export des données en PDF ou CSV.

## Technologies utilisées
- Laravel (PHP)
- MySQL
- Blade (Template Engine Laravel)
- Chart.js (Visualisation des données)
- PHPUnit (Tests unitaires et fonctionnels)

## Installation

1. Cloner le dépôt :
   ```bash
   git clone https://github.com/votre-utilisateur/savesmart.git
   cd savesmart
   ```

2. Installer les dépendances :
   ```bash
   composer install
   npm install
   ```

3. Configurer l'environnement :
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Modifier le fichier `.env` pour configurer la base de données.

4. Exécuter les migrations et seeders :
   ```bash
   php artisan migrate --seed
   ```

5. Lancer le serveur de développement :
   ```bash
   php artisan serve
   ```

Accéder à l'application via `http://127.0.0.1:8000`

## Tests

Exécuter les tests unitaires et fonctionnels avec :
```bash
php artisan test
```
![image](https://github.com/user-attachments/assets/e744eb10-af76-4728-9568-175d9c4c1991)

![image](https://github.com/user-attachments/assets/f3444101-5559-41e8-98f8-14d15250e5f6)


