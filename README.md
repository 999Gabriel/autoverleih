
INFI Projekt
Pflichtenheft für das Autoverleih-System-Projekt

1. Zielsetzung des Projekts
Hauptziel:
Entwicklung eines umfassenden Autoverleih-Systems, das Kunden die Möglichkeit bietet, Fahrzeuge online zu mieten, sowie die Verwaltung dieser Vermietungen effizient und transparent für das Unternehmen gestaltet.

Nebenziele:
- Erstellung einer Website auf der unteranderem Bilder der Autos vorgezeigt werden.
- Für die Website verwende ich XAMPP. Dann wird der HTML Code geschrieben und mit php die Daten aus der Datenbank rausgelesen. 
- Bereitstellung eines einfach zu bedienenden Online-Reservierungssystems für Endkunden.
- Automatisierung der Verwaltung von Fahrzeugdaten und Kundeninformationen.

2. Anforderungen
Technologische Anforderungen:
- Programmiersprache: Java
- Datenbankmanagement: Nutzung von MySQL..
- ORM-Technologie: Hibernate für die Abbildung von Objektdaten in die Datenbank.
- JSON-Bibliotheken: Jackson oder Gson für den Datenexport und -import.

Software-Anforderungen:
- Entwicklungsumgebung: IntelliJ IDEA
- Versionskontrolle: Git, gehostet auf GitHub.
- docker
- maven (optional, inkludiert in IntelliJ)

3. Datenbankstruktur
Tabellen:
- Kunden 
- Autos 
- Buchungen
- Kunden_Autos 

4. Systemfunktionalitäten
- Kundenmanagement: Erfassung und Verwaltung von Kundeninformationen.
- Fahrzeugmanagement: Aufnahme neuer Fahrzeuge ins System und Verwaltung des Fahrzeugstatus.
- Buchungsmanagement: Durchführung und Verwaltung von Autovermietungen.

5. Zeitplan
Das Projekt soll bis zum 6. Juni 2024 abgeschlossen sein. Dies beinhaltet die Phasen der Planung, Entwicklung, Testing und Implementierung.

6. Verwendung
- starten: docker compose up (in Terminal)
- gestartet wird: Datenbank und Webseite
- Webseite auf: localhost:8080
- DatabaseManager Klasse verwaltet die Datenbank und ihre Daten. Darin werden auch die sqls für die Eintragung der Daten per DAOs geschreiben. 
- 

7. Meilensteine
- Projektstart: Mai 2024
- Vollständige Implementierung und Deployment: Mai 2024
- Projektabschluss und Übergabe: Juni 2024
