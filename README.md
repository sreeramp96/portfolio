# 🚀 Sreeram P — Portfolio

<p align="center">
  <img src="/public/favicons/android-chrome-192x192.png" alt="Sreeram P" width="120" />
</p>

<p align="center">
  <a href="https://sreeramp96.netlify.app"><img src="https://img.shields.io/badge/Live-sreeramp96.netlify.app-10b981?style=for-the-badge&logo=netlify&logoColor=white" /></a>
  <img src="https://img.shields.io/badge/Status-Open_to_Work-10b981?style=for-the-badge" />
</p>

---

## ✨ What's Inside

A fully responsive developer portfolio showcasing 5+ years of backend engineering — SQL optimisation, PHP migrations, and enterprise SaaS systems. Built with a modern React stack to reflect the direction I'm heading professionally.

- **⚡ Blazing Fast** — Static build served from Netlify's global CDN. Sub-second load times.
- **🎨 Modern Design** — Dark/light mode, custom cursor, scroll-triggered animations, horizontal ticker strip.
- **🧠 Type-Safe Content** — All portfolio data lives in `src/data/` as TypeScript files. Update content without touching components.
- **📱 Fully Responsive** — Works on everything from a 4K monitor to a phone.
- **♿ Accessible** — Proper ARIA roles, labels, semantic HTML, and contrast-compliant colours throughout.
- **🤖 Auto-Deploy** — Push to `main` → GitHub Actions builds → Netlify deploys. Zero manual steps.

---

## 🛠️ Tech Stack

| Technology | Role |
| :--- | :--- |
| ![React](https://img.shields.io/badge/React-19-61DAFB?style=for-the-badge&logo=react&logoColor=black) | Component-based UI |
| ![TypeScript](https://img.shields.io/badge/TypeScript-6.0-3178C6?style=for-the-badge&logo=typescript&logoColor=white) | Type-safe data and props |
| ![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-4.0-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white) | Utility-first styling with `@tailwindcss/vite` |
| ![Framer Motion](https://img.shields.io/badge/Framer_Motion-12-black?style=for-the-badge&logo=framer&logoColor=white) | Scroll-triggered animations |
| ![Vite](https://img.shields.io/badge/Vite-8.0-646CFF?style=for-the-badge&logo=vite&logoColor=white) | Instant dev server, optimised builds |
| ![Netlify](https://img.shields.io/badge/Netlify-Deploy-00C7B7?style=for-the-badge&logo=netlify&logoColor=white) | Hosting + CDN (free tier) |

---

## 🏗️ Project Architecture

Content is completely decoupled from UI. To update anything on the portfolio, you only touch `src/data/` — never the components.

```
src/
├── types/
│   └── index.ts              # TypeScript interfaces for all data shapes
│
├── data/                     # ← Edit your content here
│   ├── hero.ts               # Name, tagline, stats, resume URL
│   ├── about.ts              # Bio, highlight cards, links
│   ├── skills.ts             # Skill bars, tool badges, learning items
│   ├── experience.ts         # Work history with bullets
│   ├── projects.ts           # Portfolio projects
│   ├── social.ts             # Email, LinkedIn, GitHub, availability
│   └── index.ts              # Barrel export
│
├── hooks/
│   ├── useTheme.ts           # Dark/light mode state + localStorage sync
│   └── useScrollSpy.ts       # Highlights active nav link on scroll
│
└── components/
    ├── ui/                   # Reusable primitives (Tag, SectionLabel, SectionHeading)
    ├── sections/             # Hero, About, Skills, Experience, Projects, CTA
    ├── Navbar.tsx            # Fixed nav with mobile menu + theme toggle
    ├── Ticker.tsx            # Horizontal scrolling tech stack strip
    ├── Footer.tsx
    └── CustomCursor.tsx      # Dot + ring cursor (desktop only)
```

---

<!-- ## 🚀 Local Development

```bash
# Clone
git clone https://github.com/itssreeramp/portfolio.git
cd portfolio

# Install
npm install

# Start dev server — live at http://localhost:5173
npm run dev
```

--- -->

<!-- ## 📦 Build & Deploy

Every push to `main` auto-deploys via GitHub Actions:

```
git push origin main
  → GitHub Actions: npm ci → npm run build → /dist
  → Netlify: serves /dist from global CDN
```

To build locally:

```bash
npm run build     # outputs to /dist
npm run preview   # preview the production build locally
```

--- -->

<!-- ## ✏️ Updating Content

Everything is in `src/data/`. Examples:

**Add a project** → `src/data/projects.ts`
```ts
{
  title:       'My New Project',
  company:     'Personal',
  period:      '2025',
  tags:        ['React', 'TypeScript'],
  description: 'What it does and why it matters.',
  link:        'https://github.com/itssreeramp/project',
}
```

**Update availability** → `src/data/social.ts`
```ts
available: false  // hides the "Open to opportunities" badge
```

**Change skill levels** → `src/data/skills.ts`
```ts
{ name: 'Docker', level: 60 }  // 0–100
```

--- -->

## 📄 Resume & Contact

- **📧 Email:** itssreeramp@gmail.com
- **💼 LinkedIn:** [linkedin.com/in/itssreeramp](https://linkedin.com/in/itssreeramp)
- **🐙 GitHub:** [github.com/itssreeramp](https://github.com/itssreeramp)
- **🌐 Live:** [sreeramp96.netlify.app](https://sreeramp96.netlify.app)
- **📄 Resume:** [Download PDF](public/files/Sreeram_Resume_V3.pdf)

---

> Previously built with Laravel 12 + Blade + Alpine.js.  
> Migrated to React 19 + TypeScript to align with the modern stack I'm actively learning and targeting in my next role.

<p align="center">Made with ❤️ and strong coffee by Sreeram P.</p>