# 🍽️ NetPFE - Gestion des Projets de Fin d'Études
Une application web complète réalisée avec Symfony pour la gestion des projets de fin d'études (PFE), destinée aux étudiants, encadrants et administrateurs.

Projet développé dans le cadre d’une évaluation universitaire.

---

## 🌟 Fonctionnalités

### 👨‍🍳Gestion complète des projets, étudiants et encadrants
- **Projets** : Création avec titre/description, stockage en base de données, recherche/affichage et modification/suppression
- **Étudiants** : Enregistrement avec données personnelles (nom, prénom, date de naissance, téléphone, email), stockage, consultation et mise à jour/suppression
- **Encadrants** : Création avec informations professionnelles (nom, prénom, spécialité, email, téléphone, disponibilité), stockage, recherche et modification/suppression

### 🔧 Relations entre entités
- Un projet peut avoir 0 ou 1 étudiant
- Un étudiant peut avoir un ou plusieurs projets
- Un projet peut avoir 0 ou 1 encadrant
- Un encadrant peut avoir 0 ou plusieurs projets

---

## 🚀 Technologies Utilisées

- **Backend** : Symfony 6
- **Frontend** : Bootstrap 5, HTML/CSS, Twig
- **Base de données** : MySQL/PostgreSQL
- **ORM** : Doctrine

---

## 📋 Prérequis

- PHP 8.0+
- Composer
- Symfony CLI
- Git (pour cloner le repo)

---

## 🛠️ Installation

1. **Cloner le dépôt**
```bash
git clone https://github.com/ton-username/netpfe.git
cd netpfe
```
2. Installer les dépendances
   ```bash
   composer install
   ```

3. Configurer la base de données dans le fichier .env
```bash
  DATABASE_URL="mysql://user:password@127.0.0.1:3306/netpfe?serverVersion=8.0
```
4. Créer la base de données et appliquer les migrations
```bash
  php bin/console doctrine:database:create
  php bin/console make:migration
  php bin/console doctrine:migrations:migrate
```
5. Lancer le serveur de développement
```bash
  symfony server:start
```

4. Accédez à l'application à l'adresse [http://localhost:8000](http://localhost:8000)


## 📊 Modèles de la Base de Données

Le système utilise Doctrine ORM avec les entités suivantes:

**Projet**: Représente un projet de fin d'études avec son titre et sa description.

**Etudiant**: Représente un étudiant avec son nom, prénom, date de naissance, téléphone et email.

**Encadrant**: Représente un encadrant académique avec son nom, prénom, spécialité, email, téléphone et disponibilité.



