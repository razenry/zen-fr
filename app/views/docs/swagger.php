<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Zen API Documentation</title>
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/swagger-ui-dist@5/swagger-ui.css">
  <link rel="icon" type="image/png" href="https://unpkg.com/swagger-ui-dist@5/favicon-32x32.png" sizes="32x32" />
  <style>
    html { box-sizing: border-box; overflow: -moz-scrollbars-vertical; overflow-y: scroll; }
    *, *:before, *:after { box-sizing: inherit; }
    body { margin: 0; background: #0f172a; font-family: sans-serif; }
    .swagger-ui .topbar { display: none; }
    .swagger-ui { filter: invert(88%) hue-rotate(180deg); }
    .swagger-ui .info .title { color: #38bdf8; }
    .header-banner {
      background: linear-gradient(135deg, #1e293b, #0f172a);
      color: #ffffff;
      padding: 24px 32px;
      border-bottom: 1px solid #334155;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .header-banner h1 { margin: 0; font-size: 1.5rem; font-weight: 700; color: #38bdf8; display: flex; align-items: center; gap: 10px; }
    .header-banner p { margin: 4px 0 0 0; color: #94a3b8; font-size: 0.875rem; }
    .badge { background: #0284c7; color: white; padding: 4px 10px; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; }
  </style>
</head>
<body>
  <div class="header-banner">
    <div>
      <h1>⚡ Zen PHP Framework — REST API Spec</h1>
      <p>Dedicated API Mode with zero frontend bloat & high performance endpoints.</p>
    </div>
    <span class="badge">v8.0.0 API Mode</span>
  </div>

  <div id="swagger-ui"></div>

  <script src="https://unpkg.com/swagger-ui-dist@5/swagger-ui-bundle.js" charset="UTF-8"></script>
  <script src="https://unpkg.com/swagger-ui-dist@5/swagger-ui-standalone-preset.js" charset="UTF-8"></script>
  <script>
    window.onload = function() {
      const spec = {
        "openapi": "3.0.3",
        "info": {
          "title": "Zen PHP Framework REST API",
          "description": "Interactive API Documentation for Zen PHP Framework v8.0.0 Dedicated API Mode.",
          "version": "8.0.0"
        },
        "servers": [
          { "url": "/api/v1", "description": "API v1 Endpoint Base" }
        ],
        "paths": {
          "/ping": {
            "get": {
              "summary": "Health check endpoint",
              "responses": {
                "200": {
                  "description": "API status online",
                  "content": {
                    "application/json": {
                      "example": { "status": "online", "timestamp": 1723630000 }
                    }
                  }
                }
              }
            }
          },
          "/products": {
            "get": {
              "summary": "List all products",
              "responses": {
                "200": { "description": "List of available products" }
              }
            },
            "post": {
              "summary": "Create a new product",
              "requestBody": {
                "required": true,
                "content": {
                  "application/json": {
                    "example": { "name": "Zen Keyboard", "price": 149.99, "stock": 50 }
                  }
                }
              },
              "responses": {
                "201": { "description": "Product created successfully" }
              }
            }
          },
          "/products/{id}": {
            "get": {
              "summary": "Get product by ID",
              "parameters": [
                { "name": "id", "in": "path", "required": true, "schema": { "type": "integer" } }
              ],
              "responses": {
                "200": { "description": "Product detail" },
                "404": { "description": "Product not found" }
              }
            },
            "put": {
              "summary": "Update product",
              "parameters": [
                { "name": "id", "in": "path", "required": true, "schema": { "type": "integer" } }
              ],
              "responses": {
                "200": { "description": "Product updated" }
              }
            },
            "delete": {
              "summary": "Delete product",
              "parameters": [
                { "name": "id", "in": "path", "required": true, "schema": { "type": "integer" } }
              ],
              "responses": {
                "200": { "description": "Product deleted" }
              }
            }
          }
        }
      };

      window.ui = SwaggerUIBundle({
        spec: spec,
        dom_id: '#swagger-ui',
        deepLinking: true,
        presets: [
          SwaggerUIBundle.presets.apis,
          SwaggerUIStandalonePreset
        ],
        plugins: [
          SwaggerUIBundle.plugins.DownloadUrl
        ],
        layout: "StandaloneLayout"
      });
    };
  </script>
</body>
</html>
