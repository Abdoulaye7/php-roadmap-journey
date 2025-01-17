# Roadmap PHP (sans Framework)

## Introduction
Ce roadmap est conçu pour apprendre le langage PHP de manière progressive, sans l'utilisation de frameworks. Il est structuré pour passer des bases aux concepts avancés en PHP.

## Table des matières
1. [Introduction au PHP](#1-introduction-au-php)
2. [Les bases de PHP](#2-les-bases-de-php)
3. [Les formulaires et les données utilisateur](#3-les-formulaires-et-les-données-utilisateur)
4. [Les bases de données en PHP](#4-les-bases-de-données-en-php)
5. [Programmation Orientée Objet (POO)](#5-programmation-orientée-objet-poo)
6. [Interagir avec des API](#6-interagir-avec-des-api)
7. [Gestion des sessions et des cookies](#7-gestion-des-sessions-et-des-cookies)
8. [Sécurisation et authentification](#8-sécurisation-et-authentification)
9. [Tests unitaires et débogage](#9-tests-unitaires-et-débogage)
10. [Déploiement d'une application PHP](#10-déploiement-dune-application-php)
11. [Améliorations continues](#11-améliorations-continues)

---

## 1. Introduction au PHP
Avant de commencer à programmer avec PHP, tu dois installer PHP et un serveur web local comme **XAMPP**, **WAMP**, ou **Laragon**. 

---

## 2. Les bases de PHP
Apprends la syntaxe de base et les concepts fondamentaux :

- **Variables et types de données** : `string`, `int`, `float`, `array`, etc.
- **Opérateurs** : arithmétiques, logiques, de comparaison.
- **Contrôle de flux** :
  - Conditions : `if`, `else`, `switch`.
  - Boucles : `for`, `while`, `foreach`.
- **Fonctions** :
  - Déclaration de fonctions, paramètres et valeurs de retour.
  - Fonctions intégrées de PHP pour les chaînes, les tableaux, etc.
- **Gestion des fichiers** :
  - Lire, écrire et manipuler des fichiers (CSV, JSON, texte).

---

## 3. Les formulaires et les données utilisateur
Apprends à gérer les formulaires HTML et à interagir avec PHP :

- **Créer et traiter des formulaires HTML** : `GET`, `POST`.
- **Valider et sécuriser les données utilisateur**.
- **Protéger contre les injections SQL**.
- **Manipulation des données soumises**.

---

## 4. Les bases de données en PHP
Apprends à interagir avec une base de données MySQL via PHP :

- **Se connecter à une base de données MySQL avec PDO ou MySQLi**.
- **Effectuer des requêtes SQL** : `SELECT`, `INSERT`, `UPDATE`, `DELETE`.
- **Préparer des requêtes SQL pour éviter les injections SQL**.
- **Afficher les résultats de requêtes SQL dans une page PHP**.

---

## 5. Programmation Orientée Objet (POO)
Apprends les concepts de base de la programmation orientée objet :

- **Création de classes et d'objets**.
- **Propriétés et méthodes**.
- **Héritage** : Créer des classes dérivées.
- **Encapsulation et Abstraction** : Utilisation de `private`, `protected`, `public`.
- **Polymorphisme** et **Interfaces**.
- **Gestion des exceptions** avec `try/catch`.

---

## 6. Interagir avec des API
Apprends à consommer des API RESTful externes et à créer une API en PHP :

- **Consommer une API externe avec `cURL`**.
- **Utilisation de `file_get_contents()` pour récupérer des données**.
- **Créer une API REST en PHP** : gérer les méthodes `GET`, `POST`, `PUT`, `DELETE`.
- **Retourner des réponses au format JSON**.

---

## 7. Gestion des sessions et des cookies
Apprends à gérer l'état de l'utilisateur dans une application PHP :

- **Sessions PHP** :
  - Démarrer et gérer des sessions avec `$_SESSION`.
  - Stocker et récupérer des données dans des sessions.
- **Cookies** :
  - Créer et lire des cookies avec `setcookie()`.
  - Manipuler les cookies de manière sécurisée.

---

## 8. Sécurisation et authentification
Apprends à sécuriser les applications PHP et à gérer l'authentification des utilisateurs :

- **Sécurisation des mots de passe** avec `password_hash()` et `password_verify()`.
- **Prévenir les attaques XSS et CSRF**.
- **Gestion de l'authentification** : Système de connexion et inscription des utilisateurs.
- **Gérer les autorisations d’accès** (par rôle, permissions, etc.).

---

## 9. Tests unitaires et débogage
Apprends à tester ton code et à le déboguer efficacement :

- **Tests unitaires avec PHPUnit** :
  - Écrire des tests pour la logique métier et la gestion des données.
- **Déboguer avec Xdebug** :
  - Installer et configurer Xdebug.
  - Analyser les erreurs et debugger ton code PHP.

---

## 10. Déploiement d'une application PHP
Apprends à déployer ton application PHP sur un serveur de production :

- **Préparer l'application pour la production**.
- **Sécuriser les informations sensibles** (base de données, fichiers de configuration).
- **Déployer l’application sur un hébergeur web** : DigitalOcean, OVH, ou un hébergeur spécialisé PHP.
- **Utiliser Git** pour la gestion de versions et le déploiement continu.

---

## 11. Améliorations continues
Enfin, pour rester à jour et améliorer tes compétences, voici quelques conseils :

- **Contribuer à des projets open-source** sur GitHub.
- **Lire des livres et des blogs PHP**.
- **Participer à des conférences PHP** (comme PHPCon).
- **Explorer des nouvelles fonctionnalités PHP** avec chaque nouvelle version (par exemple, PHP 8.x).

---

## Conclusion
Ce roadmap PHP est conçu pour t’aider à progresser étape par étape. Commence avec les bases et avance vers des concepts plus avancés comme la POO et la gestion des bases de données. Lorsque tu maîtriseras ces sujets, tu seras prêt à créer des applications robustes et sécurisées.

---

## Ressources
- [Documentation officielle de PHP](https://www.php.net/docs.php)
- [PHP: The Right Way](https://phptherightway.com/)
- [PHP Manual](https://www.php.net/manual/en/)
