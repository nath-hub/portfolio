# API Projets - Documentation

## Base URL
```
http://localhost:8000/api
```

## Endpoints disponibles

### 1. Récupérer tous les projets
**GET** `/api/projects`

**Réponse (200 OK):**
```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "title": "API E-commerce",
            "slug": "api-e-commerce",
            "description": "Développement d'une API REST complète...",
            "stack": "Laravel, MySQL, Redis, JWT, Stripe",
            "link": "https://github.com/nathalie/ecommerce-api",
            "image": null,
            "created_at": "2026-02-01T10:00:00.000000Z",
            "updated_at": "2026-02-01T10:00:00.000000Z"
        }
    ],
    "count": 1
}
```

---

### 2. Récupérer un projet par ID ou slug
**GET** `/api/projects/{id}` ou `/api/projects/{slug}`

**Exemples:**
```
GET /api/projects/1
GET /api/projects/api-e-commerce
```

**Réponse (200 OK):**
```json
{
    "success": true,
    "data": {
        "id": 1,
        "title": "API E-commerce",
        "slug": "api-e-commerce",
        "description": "Développement d'une API REST complète...",
        "stack": "Laravel, MySQL, Redis, JWT, Stripe",
        "link": "https://github.com/nathalie/ecommerce-api",
        "image": null,
        "created_at": "2026-02-01T10:00:00.000000Z",
        "updated_at": "2026-02-01T10:00:00.000000Z"
    }
}
```

**Réponse si non trouvé (404):**
```json
{
    "success": false,
    "message": "Projet non trouvé",
    "error": "No query results found for model"
}
```

---

### 3. Créer un nouveau projet
**POST** `/api/projects`

**Headers:**
```
Content-Type: application/json
X-CSRF-TOKEN: {csrf_token}
```

**Body:**
```json
{
    "title": "Mon Nouveau Projet",
    "description": "Description du projet",
    "stack": "Laravel, Vue.js, MySQL",
    "link": "https://example.com",
    "image": null,
    "slug": "mon-nouveau-projet"
}
```

**Champs:**
- `title` (requis) - String, max 255 caractères, doit être unique
- `description` (optionnel) - String
- `stack` (optionnel) - String
- `link` (optionnel) - URL valide
- `image` (optionnel) - String (chemin ou URL)
- `slug` (optionnel) - String unique (généré automatiquement depuis le titre si vide)

**Réponse (201 Created):**
```json
{
    "success": true,
    "message": "Projet créé avec succès",
    "data": {
        "id": 4,
        "title": "Mon Nouveau Projet",
        "slug": "mon-nouveau-projet",
        "description": "Description du projet",
        "stack": "Laravel, Vue.js, MySQL",
        "link": "https://example.com",
        "image": null,
        "created_at": "2026-02-01T10:05:00.000000Z",
        "updated_at": "2026-02-01T10:05:00.000000Z"
    }
}
```

**Erreur de validation (422):**
```json
{
    "success": false,
    "message": "Erreur de validation",
    "errors": {
        "title": ["The title field is required."]
    }
}
```

---

### 4. Mettre à jour un projet
**PUT ou PATCH** `/api/projects/{id}` ou `/api/projects/{slug}`

**Exemples:**
```
PUT /api/projects/1
PUT /api/projects/api-e-commerce
PATCH /api/projects/1
```

**Headers:**
```
Content-Type: application/json
X-CSRF-TOKEN: {csrf_token}
```

**Body (tous les champs optionnels):**
```json
{
    "title": "API E-commerce Modifiée",
    "description": "Description mise à jour",
    "stack": "Laravel, MySQL, Redis, JWT, Stripe, Docker",
    "link": "https://github.com/nathalie/ecommerce-api-v2"
}
```

**Réponse (200 OK):**
```json
{
    "success": true,
    "message": "Projet modifié avec succès",
    "data": {
        "id": 1,
        "title": "API E-commerce Modifiée",
        "slug": "api-e-commerce",
        "description": "Description mise à jour",
        "stack": "Laravel, MySQL, Redis, JWT, Stripe, Docker",
        "link": "https://github.com/nathalie/ecommerce-api-v2",
        "image": null,
        "created_at": "2026-02-01T10:00:00.000000Z",
        "updated_at": "2026-02-01T10:10:00.000000Z"
    }
}
```

---

### 5. Supprimer un projet
**DELETE** `/api/projects/{id}` ou `/api/projects/{slug}`

**Exemples:**
```
DELETE /api/projects/1
DELETE /api/projects/api-e-commerce
```

**Headers:**
```
X-CSRF-TOKEN: {csrf_token}
```

**Réponse (200 OK):**
```json
{
    "success": true,
    "message": "Projet 'API E-commerce' supprimé avec succès"
}
```

**Erreur si non trouvé (404):**
```json
{
    "success": false,
    "message": "Erreur lors de la suppression du projet",
    "error": "No query results found for model"
}
```

---

## Exemples d'utilisation avec cURL

### Récupérer tous les projets
```bash
curl -X GET "http://localhost:8000/api/projects"
```

### Créer un projet
```bash
curl -X POST "http://localhost:8000/api/projects" \
  -H "Content-Type: application/json" \
  -H "X-CSRF-TOKEN: {votre_csrf_token}" \
  -d '{
    "title": "Mon Nouveau Projet",
    "description": "Description du projet",
    "stack": "Laravel, Vue.js",
    "link": "https://example.com"
  }'
```

### Mettre à jour un projet
```bash
curl -X PUT "http://localhost:8000/api/projects/1" \
  -H "Content-Type: application/json" \
  -H "X-CSRF-TOKEN: {votre_csrf_token}" \
  -d '{
    "title": "Titre Modifié",
    "description": "Nouvelle description"
  }'
```

### Supprimer un projet
```bash
curl -X DELETE "http://localhost:8000/api/projects/1" \
  -H "X-CSRF-TOKEN: {votre_csrf_token}"
```

---

## Exemples d'utilisation avec JavaScript/Fetch

### Récupérer tous les projets
```javascript
fetch('/api/projects')
    .then(response => response.json())
    .then(data => console.log(data));
```

### Créer un projet
```javascript
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

fetch('/api/projects', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken
    },
    body: JSON.stringify({
        title: 'Mon Nouveau Projet',
        description: 'Description',
        stack: 'Laravel, Vue.js',
        link: 'https://example.com'
    })
})
.then(response => response.json())
.then(data => console.log(data));
```

### Mettre à jour un projet
```javascript
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

fetch('/api/projects/1', {
    method: 'PUT',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken
    },
    body: JSON.stringify({
        title: 'Titre Modifié',
        description: 'Nouvelle description'
    })
})
.then(response => response.json())
.then(data => console.log(data));
```

### Supprimer un projet
```javascript
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

fetch('/api/projects/1', {
    method: 'DELETE',
    headers: {
        'X-CSRF-TOKEN': csrfToken
    }
})
.then(response => response.json())
.then(data => console.log(data));
```

---

## Codes d'erreur

| Code | Description |
|------|-------------|
| 200 | Succès - Requête traitée avec succès |
| 201 | Créé - Ressource créée avec succès |
| 404 | Non trouvé - Ressource introuvable |
| 422 | Validation échouée - Données invalides |
| 500 | Erreur serveur - Erreur interne |

---

## Notes importantes

1. **Authentification CSRF**: Les requêtes POST, PUT, PATCH et DELETE nécessitent le token CSRF dans l'en-tête `X-CSRF-TOKEN`
2. **Slugs uniques**: Les slugs doivent être uniques. Si vous fournissez un titre, le slug sera généré automatiquement
3. **Recherche flexible**: Vous pouvez accéder aux projets par ID ou par slug indifféremment
4. **Validation d'URL**: Le champ `link` doit être une URL valide (commençant par http:// ou https://)
