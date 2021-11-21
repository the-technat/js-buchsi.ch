## Installation
- Domain js-buchsi.ch bei Cyon registrieren
- Domain auf Webhosting einrichten, Domain `js-buchsi.ch` zeigt auf `~/public_html/js-buchsi.ch`
- SSL Certs abholen mit dem One-Click
- SSL-Redirect einrichten mit dem Häckchen

## Webroot 
Auf den Webserver verbinden und ins Webroot wechseln.

Mit git das Repo herunterladen:
```bash
git clone https://git.technat.cloud/technat/js-buchsi.ch.git .
```
### File Permissions
Source: https://www.smashingmagazine.com/2014/05/proper-wordpress-filesystem-permissions-ownerships/
Coming soon: https://getkirby.com/docs/guide/security#file-permissions
Cyon: https://www.cyon.ch/support/a/datei-berechtigungen-unter-linux

Cyon braucht eine shared Server konfiguration wo der Webserver als  `technatc` läuft (PHP files auch).  Wir könnend die Permissions also folgendermassen setzten:
```bash
chown technatc:nobody ./js-buchsi.ch # bereits durch cyon gesetzt, kann nicht verändert werden
chmod 750 js-buchsi.ch # bereits durch cyon gesetzt, kann nicht verändert werden

cd js-buchsi.ch
chown technatc:technatc -R ./ # alles gehört mir und da der Webserver als ich läuft wird als Gruppe auch ich gesetzt, spielt nicht so eine rolle

find . -type f -exec chmod 644 {} + # nobody und meine Gruppe dürfen lesen, ich und eben der Webserver dürfen lesen und schreiben

find . -type d -exec chmod 755 {} + # nobody und meine Gruppe dürfen lesen und ins Verzeichnis wechseln, ich und der Webserver haben lese, schreibe und change rechte

## Kirby speziell:
cd site/accounts
find . -type d -exec chmod 700 {} + # Dort liegen die accounts drin, da gibts nur für mich und php rechte
find . -type f -exec chmod 600 {} + # Die files in den accounts müssen ebenfalls nur von mir und php verändert werden

cd site/config
find . -type d -exec chmod 700 {} + # Config dirs, da gibts nur für mich und php rechte
find . -type f -exec chmod 600 {} + # config files die nur von mir und php verändert werden

# falls Lizenz vorhanden
chmod 400 site/config/.license
```

## Admin User anlegen
Wenn man die Seite nun zum ersten mal aufruft, wird man von einer Login Maske begrüsst welche einem auffordert einen Admin Account anzulegen. Dieser sowie alle anderen Accounts sind vom Git Repository ausgenommen und müssen jeweils neu hinzugefügt werden.

## Lizenz aktivieren
Die Lizenz ist vom Git Repository ausgeschlossen, sie muss manuell hinterlegt werden. Dies kann ebenfalls im Admin Panel gemacht werden.
