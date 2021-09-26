## Installation
- Domain js-buchsi.ch bei Cyon registrieren
- Domain auf Webhosting einrichten, Domain `js-buchsi.ch` zeigt auf `~/public_html/js-buchsi.ch`
- Subdomain `dev.js-buchsi.ch` zeigt auf `~/public_html/dev.js-buchsi.ch`
- SSL Certs abholen mit dem One-Click
- SSL-Redirect einrichten mit dem Häckchen

### Kirby Files
Von [hier](https://getkirby.com/docs/guide/quickstart) das plainkit auf den Server ins Webroot herunterladen und entpacken. Die Zip Datei kann danach gelöscht werden.

Für profis:
```
sshfs technat.cyon.site:/home/technatc/public_html/ ~/workspace/public_html/
cd ~/workspace/public_html/js-buchsi.ch
wget https://github.com/getkirby/plainkit/archive/main.zip
unzip main.zip -d ./
rm main.zip
mv plainkit-main/* .
mv plainkit-main/.* .
rm -rf plainkit
```

Note: sshfs und unzip auf dem gemounteten Verzeichnis ist relativ langsam, nimm besser einen Kaffee mit.

Damit die Installation nun im Browser abgeschlossen werden kann muss noch die Option gesetzt sein das man die Installation auf via Internet machen darf. Das `site/config` Verzeichnis muss noch erstellt werden:

```
mkdir -p site/config
```

Und dann die Config:

`/home/technatc/public_html/js-buchsi.ch/site/config/config.php`:
```
<?php
return [
  'panel' =>[
    'install' => true
  ]
];
```

### File Permissions
Source: https://www.smashingmagazine.com/2014/05/proper-wordpress-filesystem-permissions-ownerships/
Coming soon: https://getkirby.com/docs/guide/security#file-permissions
Cyon: https://www.cyon.ch/support/a/datei-berechtigungen-unter-linux

Cyon braucht eine shared Server konfiguration wo der Webserver als  `technatc` läuft (PHP files auch).  Wir könnend die Permissions also folgendermassen setzten:
```
chown technatc:nobody ./js-buchsi.ch # bereits durch cyon gesetzt, kann nicht verändert werden
chmod 750 js-buchsi.ch # bereits durch cyon gesetzt, kann nicht verändert werden

cd js-buchsi.ch
chown technatc:technatc -R ./ # alles gehört mir und da der Webserver als ich läuft wird als Gruppe auch ich gesetzt, spielt nicht so eine rolle

find . -type f -exec chmod 644 {} + # nobody und meine Gruppe können lesen, ich und eben der Webserver dürfen lesen und schreiben

find . -type d -exec chmod 755 {} + # nobody und meine Gruppe dürfen lesen und ins Verzeichnis wechseln, ich und der Webserver haben lese, schreibe und change rechte

## Kirby speziell:
cd site/accounts
find . -type d -exec chmod 700 {} + # Dort liegen die accounts drin, da gibts nur für mich und php rechte
find . -type f -exec chmod 600 {} + # Die files in den accounts müssen ebenfalls nur von mir und php verändert werden

mkdir -p site/config
cd site/config
chmod 700 ./
touch config.php
chmod 600 config.php

# falls Lizenz vorhanden
chmod 400 site/config/.license
```

### Finish Installation
Als letztes kann nun das Admin Panel aufgerufen werden. Beim ersten Aufruf muss noch der erste Admin User erstellt werden. Danach ist Kirby ready to go.

Die URL:  `https://js-buchsi.ch/panel`

## Konfiguration

### Lizenz
Die Lizenz ist auf `web@js-buchsi.ch` gelöst und wurde auf der Haupt Kirby Installation eingelöst.

### Fonts
Fonts sind im `assets` Ordner unter Fonts flach abgelegt. Ein fonts.css File definiert alle nötigen Fonts in woff und woff2

### CSS
css Files sind im `assets/css` abgelegt. Es existiert ein `index.css` welches auf jeder Seite geladen wird. Zusätzlich wird jeweils aus dem Unterordner `templates` das zum Site Template passende css geladen.

## Update

## Backup
