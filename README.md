# 🧰 DevOutils

[![Latest Version on Packagist](https://img.shields.io/packagist/v/devoutils/devoutils.svg)](https://packagist.org/packages/devoutils/devoutils)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)
[![PHP Version](https://img.shields.io/badge/PHP-^8.2-blue.svg)](https://www.php.net/)
[![Laravel](https://img.shields.io/badge/laravel-12-red.svg)](https://laravel.com/)

---

**DevOutils** est un SDK (Software Development Kit) conçu comme une boîte à outils regroupant des fonctions courantes et pratiques pour les développeurs utilisant le framework **Laravel**.  
Il simplifie et standardise certaines tâches fréquentes, notamment la génération de codes de référence, le formatage de dates, et la mise en forme de montants.

---

## 🚀 Installation

Installez le package via Composer :

```bash
composer require devoutils/devoutils
```

---

## 📦 Structure du SDK

Le SDK est composé de trois classes principales :

**1️⃣ CodeGenerator**

*Permet de générer des codes uniques ou structurés.*

🔧 Méthodes :

*codenumber(): Génère un code numérique aléatoire.*

*codeWithPrefix($prefix): Génère un code alphanumérique précédé d’un préfixe personnalisé.*

🧪 Exemple d’utilisation :

```bash
use DevOutils\CodeGenerator;

$code = CodeGenerator::codenumber();           // Résultat : 00001
$ref  = CodeGenerator::codeWithPrefix('0','CLIENT',3);  // Résultat : CLI-00001
```

**2️⃣ Formater**
*Permet de formater une date ou un montant.*

Permet de formater facilement une date dans plusieurs styles utiles pour l'affichage.

🔧 Méthodes :

*NormalDateFormat($date): Format standard  — 19/07/2025*

*FullDateFormat($date): Format complet — Samedi 19 Juillet 2025/19 Juillet 2025*

*TimeFormat($time, $format): Formate une heure selon un format donné*

*RelativeDateFormat($date): Affiche une date relative — il y a 1 minute*

*AmountFormat($date): Formate les montants numériques en une représentation lisible avec une devise — 10.000,00 XOF*

🧪 Exemple d’utilisation :

```bash
use DevOutils\Formater;

echo Formater::NormalDateFormat('2025-07-19');                  // 19-07-2025
echo Formater::FullDateFormat('2025-07-19');                    // Samedi 19 Juillet 2025
echo Formater::FullDateFormat('2025-07-19', 'D MMMM YYYY ');    // 19 Juillet 2025
echo Formater::TimeFormat('14:30:00', 'H\hi');                  // 14:30:00
echo Formater::RelativeDateFormat(now()->subMinutes(5));        // Il y a 5 minutes

echo Formater::AmountFormat('100000');                // 15.000 
echo MoneyFormater::AmountFormat(15000, '', 'XOF');  // 15.000 XOF

//Les devives('€', '$', '£', '¥') ont une affichage spécifique 
echo MoneyFormater::AmountFormat(15000, 2,'€');       // €15.000,00
echo MoneyFormater::AmountFormat(15000, 2,'$');       // $15.000,00
echo MoneyFormater::AmountFormat(15000, 2,'£');       // £15.000,00
echo MoneyFormater::AmountFormat(15000, 2,'¥');       // ¥15.000,00
```

## ✅ Prérequis

*PHP >= 8.2*
*Laravel >= 12*

---

## 📄 Licence

*Ce package est distribué sous la licence MIT.*

---

## 🙌 Contribution

Les contributions sont les bienvenues !

N’hésitez pas à :

*Fork le projet*

*Créer une branche (feature/ma-nouvelle-fonctionnalite)*

*Soumettre une Pull Request*

*Ouvrir une Issue pour signaler un bug ou proposer une amélioration*

---

## 👤 Auteur

*Développé avec ❤️ par Youssouf Soumahoro*
*📧 Contact : [https://github.com/SMH-Software/]*

