# Concepts and Logic

## Plugins

### Locator
https://getkirby.com/plugins/sylvainjule/locator
https://github.com/sylvainjule/kirby-locator

Wird für den `JS-Nami` und `Lager` blueprint verwendet.

## Blueprints

### Page Blueprints
Wenn möglich wird der Default Blueprint verwendet. Er ist so aufgebaut das alle einfacheren einspaltigen Seitenlayoute mit ihm gestaltet werden können.

Spezielle Blueprints werden bisher nur für folgende Seiten verwendet:
- Kalender

#### Kalender
Mittels Subpages werden Kalendereinträge erstellt. Sie folgen den drei Stadien die jede Kirby Page hat.

Folgendes Problem tut sich damit auf: Alle Kalendereinträge sind in der Navigation sichtbar

### File Blueprints
- `header-image` ist ein spezieller Blueprint für Titelbilder.

## Snippets

### Header

#### Header Images
Das Header Snippet braucht ein Header Image welches es laden kann. Dabei gibt es eine Logik:
- Wenn die jeweilige Seite ein oder mehrere Files vom Typ `header-image` hat wird das erstbeste davon als Header Image genommen
- Wenn das nicht der Fall ist wird zufällig ein Header Image aus den global definierten Header Images genommen

Caveat: Ein Blueprint (z.B der Default Blueprint) muss dem User die Möglichkeit geben ein Header Image zu setzen welches dann vom korrekten Typ ist. Da wir aber eine predefined section für dieses Szenario haben ist es sowohl einfach als auch naheliegen das neue Blueprints das implementieren werden.

### Navigation
Die Navigation hat ein Opt-Out Prinzip. Grundsätzlich werden alle Seiten und eine Reihe an Unterseiten in der Navigation dargestellt. Wenn dies für eine Seite nicht gewünscht ist kann folgendes Feld im entsprechenden Blueprint hinterlegt werden:
```yaml
fields:
  hideFromNav:
    label: "Sichtbarkeit in Navigation"
    help: "Diese Seite von der Navigation ausblenden?"
    type: toggle
    text: 
      - "einblenden"
      - "ausblenden"
```

Folgender Ausschnitt aus dem `nav.php` snippet ermöglicht dies:
```php
<?php if($subitem->hidefromnav()->toBool() === false ): ?>
  <li><a href="<?= $subitem->url() ?>"><?= $subitem->title() ?></a></li>
<?php endif ?>
```