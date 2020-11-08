# Requêtes SQL

## Pokemon

> Récupère toutes les infos sur tous les pokémons

```sql
SELECT * FROM pokemon;
```

> Récupère toutes les infos d'un pokémon dont l'id est passée dans l'url

```sql
SELECT * FROM pokemon WHERE id = {pokemon_id};
```

> Récupère tous les pokemons d'un type en particulier dont l'id est passée dans l'url

```sql
SELECT p.numero, p.nom
FROM pokemon p
INNER JOIN pokemon_type pt
ON p.numero = pt.pokemon_numero
INNER JOIN `type` t
ON pt.type_id = t.id
WHERE t.id = {$type_id};
```

> Récupère toutes les infos de tous les pokemons appartenant à un type dont l'id est passé dans l'url

```sql
SELECT p.*
FROM pokemon p
INNER JOIN pokemon_type pt
ON p.numero = pt.pokemon_numero
INNER JOIN `type` t
ON pt.type_id = t.id
WHERE t.id = {$type_id};
```

> Récupère toutes les infos d'un pokemon dont l'id est passé dans l'url + son type

```sql
SELECT p.*, t.name
FROM pokemon p
INNER JOIN pokemon_type pt
ON p.numero = pt.pokemon_numero
INNER JOIN `type` t
ON pt.type_id = t.id
WHERE p.id = {$pokemon_id};
```

## Type

> Récupérer toutes les infos de tous les types 

```sql
SELECT *
FROM `type`;
```