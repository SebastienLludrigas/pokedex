# Dictionnaire de données

## pokemon

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|pokemon_id|INT|PRIMARY KEY, NOT NULL, UNSIGNED|L'identifiant du Pokemon|
|nom|VARCHAR(50)|NOT NULL|Le nom du Pokemon|
|pv|INT|NOT NULL|Les points de vie du Pokemon|
|attaque|INT|NOT NULL|Le niveau d'attaque|
|defense|INT|NOT NULL|Le niveau de défense|
|attaque_spe|INT|NOT NULL|Le niveau d'attaque spéciale|
|defense_spe|INT|NOT NULL|Le niveau de défense spéciale|
|vitesse|INT|NOT NULL|La vitesse|
|numéro|INT|UNSIGNED NOT NULL|Le numéro du Pokemon|

## type

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|type_id|INT|PRIMARY KEY, UNSIGNED, NOT NULL|L'identifiant du Type|
|nom|VARCHAR(50)|NOT NULL|Le nom du Type|
|couleur|TEXT|NULL|La couleur du type|

## pokemon_type

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|pokemon_id|INT|KEY UNSIGNED NOT NULL|L'identifiant du Pokemon|
|type_id|INT|KEY UNSIGNED NOT NULL|L'identifiant du type|
