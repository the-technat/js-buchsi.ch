# Installation

## Repository

Die js-buchsi webseite braucht ein privates Repository namens `js-buchsi.ch` mit `develop` als Default Branch.  

Folgende Protections müssen existieren:

- `master`: Push: No One, Merge: Maintainers, Force-Push: no
- `develop`: Push: Maintainers, Merge: Developers and Maintainers, Force-Push: yes

Kreiere zudem ein "Deploy Token" welches Read access aufs Repository hat und hinterlege dies als masked, protected `git_clone_token_user` und `git_clone_token_pass` Variable im CI Bereich.

## Prerequisites

- Domain js-buchsi.ch registrieren
- Domain auf Webhosting einrichten
- Domain `js-buchsi.ch` zeigt auf `~/public_html/js-buchsi.ch/prod/`
- Domain `preview.js-buchsi.ch` zeigt auf `~/public_html/js-buchsi.ch/preview/`
- TLS Zertifikate von Let's Encrypt generieren
- HTTP zu HTTPS Redirect einrichten (Option setzten)
- FTP User anlegen (Berechtigungen auf `~/public_html/js-buchsi.ch`) und Quota von 5GB setzen
- SSH Key generieren und als File variablen `ansible_private_key` und `ansible_public_key` unter CI variabels hinterlegen gehen  

## CD

Im Repo gibt es ein `.gitlab-ci.yml` file mit einer automatischen Deploy Pipeline drin. Sobald die Webspaces bereitstehen und im Inventory das Webhosting richtig angegeben ist, kann mit der Pipeline automatisch ausgerollt werden.

Dabei gilt folgender Grundsatz:

- `develop` -> `https://preview.js-buchsi.ch`
- `master` -> `https://js-buchsi.ch`

Das Playbook `deploy.yml` klont das Repo ins entsprechende Webroot und setzt die Berechtigungen korrekt.

### First run

Wenn man das Playbook das allererste mal auf einen frischen Webspace ausrollt müssen einige Dinge beachtet werden.

Note: Im Admin Panel kann nur der Content verändert werden, deshalb funktioniert der GitOps Approach um die Website zu deployen.

#### Content

Der content vom `content` Ordner ist nicht Teil des Repositories. Das bedeutet das die Webseite standardmässig ohne Inhalt daherkommt. Da der Inhalt auch nicht getracked wird, ist es wichtig diesen zu backupen. Das Playbook bietet die Option ein Backup via Cronjob auf dem selben Server einzurichten.

#### User  

Wenn man die Seite ohne Content zum ersten mal aufruft, wird man von einer Login Maske begrüsst welche einem auffordert einen Admin Account anzulegen. Dies weil User unter `/site/accounts` angelegt werden und dies nicht Teil des Repositories ist.

#### Lizenz

Die Lizenz ist vom Git Repository ausgeschlossen (`/site/config/.license`), sie muss manuell hinterlegt werden. Dies kann im Admin Panel gemacht werden nachdem man den Admin User angelegt hat.
