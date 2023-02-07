## SOORTEN DB

###### (12 punten)

- importeer lokaal 230130_soorten.sql in je database (zie submap /sql).

- Maak steeds gebruik van PDO bij interacties met je lokale database.

- toon alle "soorten" in tabelvorm in index.php met kolommen naam, categorie en aantal views.

- Voeg 3 links toe die toelaten de tabel sorteren op respectievelijk naam (alfabetisch), categorie (alfabetisch) en aantal views (van hoog naar laag).

- Voeg een dropdown (met submit knop) toe met (alfabetisch gerangschikte) categorieën toe die toelaat om de tabel te filteren volgens categorie.

- Maak van elke soort-naam een link naar detail.php die de detailpagina toont van die soort.

- Telkens wanneer de detailpagina van een soort geladen wordt, wordt het aantal views van deze soort in de tabel met 1 verhoogd.

- Op de detailpagina tonen we opnieuw naam, categorie en aantal views.

- Daaronder toon je overzichtelijk de zoekresultaten voor de desbetreffende naam op Wikipedia. Maak daarvoor gebruik van volgende endpoint: https://nl.wikipedia.org/w/api.php?action=query&list=search&srsearch=Ijsvogel&format=json (in dit geval voor de ijsvogel).

- Schrijf de code zo performant mogelijk, hou rekening met leesbaarheid en documenteer waar nodig!

- Succes!

- BONUS:
  - genereer via apiflash.com een screenshot van de pagina waarnaar het eerste zoekresultaat verwijst.
  - Hou deze screenshot lokaal bij in de map /img onder de naam [soort id].png
