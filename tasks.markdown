# Cahier des charges - Application web de gestion de classes avec signature en ligne

## 1. Introduction
Ce document présente les spécifications techniques pour la réalisation d'une application web de gestion de classes développée en PHP natif. Cette application permettra aux enseignants et administrateurs de gérer les classes, les élèves, les enseignants et leurs interactions. En plus, elle offrira une fonctionnalité de signature en ligne pour valider certains documents ou actions.

## 2. Objectifs de l'application
L'application doit permettre :
- La gestion des enseignants, des élèves et des classes.
- La gestion des matières et des emplois du temps.
- La gestion des évaluations et des notes des élèves.
- La possibilité pour les enseignants de générer des documents à signer en ligne (par les parents ou les élèves).

## 3. Fonctionnalités principales

### 3.1 Gestion des utilisateurs
#### 3.1.1 Profils d'utilisateurs
- **Administrateur :** gestion globale du système (utilisateurs, classes, matières).
- **Enseignant :** gestion des élèves, des notes, des emplois du temps et création de documents à signer.
- **Élève :** consultation des notes, emploi du temps et soumission de signatures pour certains documents.
- **Parent :** consultation des notes de leurs enfants et possibilité de signature en ligne.

#### 3.1.2 Connexion / Authentification
- Système d'authentification par email et mot de passe.
- Récupération de mot de passe par email.

### 3.2 Gestion des classes
- **Création, modification et suppression** de classes (par l'administrateur).
- **Affectation** des enseignants et des élèves aux classes.
- **Visualisation** de la liste des classes pour chaque enseignant avec leurs élèves respectifs.

### 3.3 Gestion des matières et emploi du temps
- **Ajout et suppression** de matières.
- **Gestion** de l'emploi du temps : assignation des matières aux créneaux horaires pour chaque classe.
- **Visualisation** de l'emploi du temps pour les enseignants et les élèves.

### 3.4 Gestion des évaluations et des notes
- **Création d'évaluations** (par matière) avec notation par l'enseignant.
- **Consultation des notes** par les élèves et leurs parents.
- **Historique des notes** et moyennes générales par élève.

### 3.5 Fonctionnalité de signature en ligne
- **Génération de documents** pour signature (autorisation de sortie, relevés de notes, etc.).
- **Signature électronique** des documents par les élèves ou les parents.
- **Archivage** des documents signés avec possibilité de téléchargement.

## 4. Exigences techniques

### 4.1 Langages de développement
- **Backend :** PHP natif.
- **Frontend :** HTML5, CSS3, JavaScript (bibliothèques autorisées : jQuery ou équivalents légers).
- **Base de données :** MySQL.

### 4.2 Hébergement
- Serveur Apache compatible PHP 7+.
- Base de données MySQL.

### 4.3 Sécurité
- Gestion des sessions pour la sécurité des utilisateurs.
- Cryptage des mots de passe avec une fonction comme `password_hash()`.
- Vérification des signatures numériques avec timestamp pour éviter la falsification.

### 4.4 Compatibilité
- Compatible avec les navigateurs modernes : Chrome, Firefox, Edge.
- Responsive pour une utilisation sur ordinateurs, tablettes et smartphones.

## 5. Interfaces utilisateur

### 5.1 Tableau de bord de l'administrateur
- Vue d'ensemble des classes, enseignants et élèves.
- Gestion des matières et de l'emploi du temps.

### 5.2 Interface enseignant
- Accès à la liste des classes et des élèves.
- Gestion des notes et évaluations.
- Création de documents à signer.

### 5.3 Interface élève/parent
- Consultation des notes et emploi du temps.
- Soumission de signatures en ligne.

## 6. Livrables attendus
- Code source complet de l'application.
- Documentation technique et utilisateur.
- Base de données MySQL avec les tables et relations préconfigurées.

## 7. Délais
- Durée estimée : 3 mois à partir du début du projet.

## 8. Maintenance et support
- Support de base pendant 3 mois après la livraison pour corriger les bugs.
- Possibilité de maintenance évolutive en option (à définir).

## 9. Conclusion
L'objectif de cette application est de fournir un outil complet de gestion des classes et des interactions entre enseignants, élèves et parents, tout en intégrant une fonctionnalité de signature en ligne pour faciliter les validations administratives.