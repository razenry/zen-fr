# Zen PHP Framework — Official Documentation Site (v9.1.6)

Official interactive documentation web portal for **Zen PHP Framework** built with **Next.js 14 (App Router)**, **React 18**, **Tailwind CSS v3**, **Lucide Icons**, and featuring an **Interactive Search Modal (Ctrl + K)** and **4-Language Support (ID, EN, JA, ZH)**.

---

## ⚡ Tech Stack & Architecture

- **Framework**: Next.js 14 (App Router)
- **UI & Styling**: React 18, Tailwind CSS v3, PostCSS, Lucide Icons
- **Features**:
  - Multi-language context (`id`, `en`, `ja`, `zh`) with `localStorage` preference persistence.
  - Interactive search modal (`Ctrl+K` / `Cmd+K`) indexing topics, code snippets, and section headers.
  - Next.js inspired sleek dark mode aesthetic with macOS style code blocks.
  - Dynamic Table of Contents ("On this page") observer sidebar.
  - Production ready for deployment to **Vercel** (`vercel.json`).

---

## 🚀 Development Quick Start

```bash
# 1. Install Node dependencies
npm install

# 2. Start Next.js development server (http://localhost:3000)
npm run dev

# 3. Build optimized production bundle
npm run build

# 4. Start production server
npm run start
```

---

## 📄 Project Structure

```text
zen-fr-docs-site/
├── app/
│   ├── docs/
│   │   └── [slug]/page.jsx   # Dynamic documentation topic pages
│   ├── globals.css           # Global typography & Tailwind styles
│   ├── layout.jsx            # Root layout with LanguageProvider & SearchModal
│   └── page.jsx              # Landing page hero & starter preset showcase
├── components/
│   ├── CodeBlock.jsx         # macOS style syntax highlighted code renderer
│   ├── Navbar.jsx            # Top bar with Search trigger & Language selector
│   ├── SearchModal.jsx       # Interactive search modal dialog (Ctrl+K)
│   ├── Sidebar.jsx           # Topic navigation sidebar & mobile drawer
│   └── TableOfContents.jsx   # Sticky right sidebar TOC
├── context/
│   └── LanguageContext.jsx   # Multi-language context (ID, EN, JA, ZH)
├── data/
│   └── documentationData.js  # Multi-language documentation dictionary
├── next.config.mjs           # Next.js configuration
├── tailwind.config.js        # Tailwind CSS configuration
└── vercel.json               # Vercel deployment configuration
```

---

## 🌐 License & Credits

Built for **Zen PHP Framework** (`razenry/zen-php`). Licensed under the [MIT License](LICENSE).
