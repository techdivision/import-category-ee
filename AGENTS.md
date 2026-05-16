# AGENTS.md - import-category-ee

## Zweck & Verantwortung

Das `import-category-ee` Modul bietet **EE-spezifische Category Import-Funktionalität**. Es ist ein **Tier 6 Modul** und erweitert `import-category`.

**Hauptverantwortung:**
- EE Category Staging Support
- EE Sequence Actions für Categories
- Repository Pattern für EE Category-Daten
- Observer Pattern für EE Category-Hooks

## Architektur & Design Patterns

### Kern-Klassen
- **EeCategoryRepository**: EE Category Persistierung
- **StagingCategoryRepository**: Staging-Support
- **EeCategoryObserver**: Observer für EE-Hooks

### Verwendete Patterns
- **Observer Pattern**: Für EE-Hooks
- **Repository Pattern**: Für Daten-Persistierung

## Abhängigkeiten

### Externe Pakete
- **Keine**

### TechDivision Dependencies
- **import-ee** ^17.0.0 - EE Functionality
- **import-category** ^22.0.0 - Category Importer

### Abhängig von diesem Modul (1 Reverse Dependency)
- **import-cli-simple** - Master CLI

## Wichtige Entry Points

### Repository Klassen
```php
// EE Category Repository
EeCategoryRepository::create($row): void

// Staging Category Repository
StagingCategoryRepository::create($row): void
```

## Events & Extension Points

**Keine Events** - Tier 6 EE-Modul

## Hints für KI-Agenten

### Wichtig zu verstehen
1. **Tier 6 Modul**: Erweitert Category Importer mit EE-Features
2. **EE-fokussiert**: Spezialisiert auf EE Staging
3. **Observer Pattern**: Für EE-Hooks
4. **Staging Support**: Für EE Staging-Tabellen

## Bekannte Einschränkungen

- **EE-Only**: Nur für Magento EE Deployments
- **Staging-Abhängig**: Erfordert EE Staging-Funktionalität

## Zusammenfassung

`import-category-ee` ist ein **Tier 6 Modul**, das EE-spezifische Category Import-Funktionalität bietet. Es erweitert den Category Importer mit EE-Features.

**Für Agenten:** Verstehe dieses Modul als **EE Category Importer** mit Staging Support.
