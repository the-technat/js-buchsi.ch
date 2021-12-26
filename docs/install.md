# Installation

## Repository

Die js-buchsi webseite braucht ein privates Repository namens `js-buchsi.ch` mit `develop` als Default Branch.  

Folgende Protections müssen existieren:

- `master`: Push: No One, Merge: Maintainers, Force-Push: no
- `develop`: Push: Maintainers, Merge: Developers and Maintainers, Force-Push: yes

Zudem braucht es einen SSH Key welcher im Account hinterlegt ist. Der private Teil muss auch als CI Variable typ file `git_ssh_key` präsent sein.
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

Das Playbook `deploy.yml` klont das Repo auf ins entsprechende Webroot und setzt die Berechtigungen korrekt.

### First run

Wenn man das Playbook das allererste mal auf den frischen Workspace ausrollt müssen einige Dinge beachtet werden:

- User: Das Verzeichnis mit den Usern ist im gitignore hinterlegt, beim ersten aufrufen der Seite musst du also einen Admin User anlegen  
- Lizenz: Das Lizenzfile ist ebenfalls im gitignore hinterlegt, nachdem ein Admin User angelegt wurde muss die Lizenz entsprechend hinterlegt werden
- Content: Der content Ordner ist im gitignore hinterlegt. Die deployte Website ist also ohne Content

#### Admin User anlegen

Wenn man die Seite nun zum ersten mal aufruft, wird man von einer Login Maske begrüsst welche einem auffordert einen Admin Account anzulegen. Dieser sowie alle anderen Accounts sind vom Git Repository ausgenommen und müssen jeweils neu hinzugefügt werden.

#### Lizenz aktivieren

Die Lizenz ist vom Git Repository ausgeschlossen, sie muss manuell hinterlegt werden. Dies kann ebenfalls im Admin Panel gemacht werden.
