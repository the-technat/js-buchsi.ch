# Concepts and Logic

## Blueprints
Wenn möglich wird der Default Blueprint verwendet. Er ist so aufgebaut das alle einfacheren Seitenlayoute mit ihm gestaltet werden können.

### Special Blueprints
Spezielle Blueprints werden bisher nur für folgende Seiten verwendet:
- Kalender -> in Abklärung ob man das auch anders machen kann

### File Blueprints
- `header-image` ist ein spezieller Blueprint für Titelbilder.

## Header Images
Das Header Snippet braucht ein Header Image welches es laden kann. Dabei gibt es eine Logik:
- Wenn die jeweilige Seite ein oder mehrere Files vom Typ `header-image` hat wird das erstbeste davon als Header Image genommen
- Wenn das nicht der Fall ist wird zufällig ein Header Image aus den global definierten Header Images genommen

Caveat: Ein Blueprint (z.B der Default Blueprint) muss dem User die Möglichkeit geben ein Header Image zu setzen welches dann vom korrekten Typ ist. Da wir aber eine predefined section für dieses Szenario haben ist es sowohl einfach als auch naheliegen das neue Blueprints das implementieren werden.
