# Changelog plugin Jeedom : Prénoms du jour

> **IMPORTANT**
>
> S'il n'y a pas d'information sur la mise à jour, c'est que celle-ci concerne uniquement la mise à jour de documentation, de traduction ou de texte.

## 23/04/2024 (version béta - publiée)

- Mise à jour locale des bases de données des prénoms
- Prise en charge des diacritiques via l'ajout d'un paramètre dans les équipements créés suite à la demande suivante sur le [Forum Jeedom > Pas d’accents plugin “prénoms du jour”](https://community.jeedom.com/t/pas-daccents-plugin-prenoms-du-jour/120026). <!--Plus d'information sur la notion de "diacritique" dans la [faq de la documentation](https://jeanrobertjs.github.io/jeedom_namesoftheday/fr_FR/#faq).-->Plus d'information sur la notion de "diacritique" dans la [faq de la documentation](https://github.com/jeanrobertjs/jeedom_namesoftheday/blob/beta/docs/fr_FR/index.md#faq).

**Remarque importante :**
Tous les diacritiques seront pris en charge dans les équipemeents avec le paramètre Format de prénoms "avec diacritriques".

Par conséquent, faites attention lors des futures mises à jour du plugin, si vous n'utilisez qu'un seul équipement avec un format de prénoms _avec diacritriques_ dans vos conditions de scénarios/scripts.

**Contournement possible :**
Créer 2 équipements : l'un avec diacritriques et l'autre sans. Celui avec _avec diacritiques_ pourrait être utilisé pour l'affichage ou dans les intéractions vocales, et l'autre _sans diacritiques_ dans vos conditions de scénarios/scripts.

## 18/12/2023 (version publique sur le market Jeedom)

- Changement de nom du dépôt Github

## 21/11/2023

- Montée de la version minimum du core de Jeedom requise pour le plugin maintenu à jour : Core v4.0 minimum
- Une branche dédiée aux cores jeedom v3 subsiste pour la rétrocompatibilité mais ne bénéficiera pas des mises à jour de fonctionnalités futures

## 31/10/2023

- Mise à jour locale de la base de données des prénoms

## 09/11/2022

- Première version publiée sur le market Jeedom

## 27/10/2022

- Version publique en béta.

## Voir la documentation

<!--Voir la page dédiée [ici](https://jeanrobertjs.github.io/jeedom_namesoftheday/fr_FR/).-->
Voir la page dédiée [ici](https://github.com/jeanrobertjs/jeedom_namesoftheday/blob/beta/docs/fr_FR/index.md).