## TEKEN RUIT

###### (4 punten)

- Maak in index.php in deze map een functie met naam "getDiamond" die een ruit teruggeeft van n grootte

- Maak daarbij gebruik van spatie+underscore+spatie ( \_ ) om witruimte weer te geven en een spatie+asterisk+spatie ( \* ) om de ruit op te bouwen.

- Het absolute middelpunt van de ruit toont spatie+X+spatie ( X ) in plaats van spatie+asterisk+spatie

- Elke rij van de ruit toont een oneven aantal asterisks

- Een voorbeeld van een ruit met grootte n=15, waarbij de langste rij 15 asterisks bevat, zie je hieronder:

```
  _ _ _ _ _ _ _ * _ _ _ _ _ _ _
  _ _ _ _ _ _ * * * _ _ _ _ _ _
  _ _ _ _ _ * * * * * _ _ _ _ _
  _ _ _ _ * * * * * * * _ _ _ _
  _ _ _ * * * * * * * * * _ _ _
  _ _ * * * * * * * * * * * _ _
  _ * * * * * * * * * * * * * _
  * * * * * * * x * * * * * * *
  _ * * * * * * * * * * * * * _
  _ _ * * * * * * * * * * * _ _
  _ _ _ * * * * * * * * * _ _ _
  _ _ _ _ * * * * * * * _ _ _ _
  _ _ _ _ _ * * * * * _ _ _ _ _
  _ _ _ _ _ _ * * * _ _ _ _ _ _
  _ _ _ _ _ _ _ * _ _ _ _ _ _ _
```

- n is een optionele parameter, de standaardwaarde bedraagt 5

- n moet steeds een geheel getal zijn groter dan 3, anders wordt de standaardwaarde gebruikt

- de functie toont zelf niets, maar heeft een String als return value.

- Schrijf de code zo performant mogelijk, hou rekening met leesbaarheid en documenteer waar nodig!

- Succes!
