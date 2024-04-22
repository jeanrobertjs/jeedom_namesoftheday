# Changelog plugin Jeedom : Prénoms du jour

> **IMPORTANT**
>
> S'il n'y a pas d'information sur la mise à jour, c'est que celle-ci concerne uniquement la mise à jour de documentation, de traduction ou de texte.

## 24/04/2024 (beta)

Prise en charge des diacritiques (accents, tréma, cédille...) via l'ajout d'une configuration dans les équipements créés suite à la demande suivante [Forum Jeedom > Pas d’accents plugin “prénoms du jour”](https://community.jeedom.com/t/pas-daccents-plugin-prenoms-du-jour/120026).

**Remarque importante :**
Tous les diacritiques seront pris en charge dans les équipemeents avec un format de prénoms "avec diacritriques" actif.

Par conséquent, faites attention lors des futures mises à jour du plugin, si vous n'utilisez que cette version "avec diacritriques" dans vos conditions de scénarios/scripts.

Plus d'information sur la notion de "diacritique" dans la [faq de la documentation](https://jeanrobertjs.github.io/jeedom_namesoftheday/fr_FR/).

**Contournement possible :**
Créer 2 équipements : l'un avec diacritriques et l'autre sans.
Le premier avec diacritiques pourrait être utilisé pour l'affichage ou dans les intéractions vocales, et le second sans diacritiques dans vos conditions de scénarios/scripts.

## 18/12/2023

Changement de nom du dépôt Github

## 21/11/2023

Montée de la version minimum du core de Jeedom requise pour le plugin maintenu à jour : Core v4.0 minimum

Une branche dédiée aux cores jeedom v3 subsiste pour la rétrocompatibilité mais ne bénéficiera pas des mises à jour futures.

## 31/10/2023

Mise à jour locale de la base de données des prénoms.

## 09/11/2022

Première version publiée sur le store.

## 27/10/2022

Version publique en béta.

## Documentation

Voir la page dédiée [ici](https://jeanrobertjs.github.io/jeedom_namesoftheday/fr_FR/).
