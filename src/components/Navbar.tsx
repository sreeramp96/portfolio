// Navbar.tsx — fixed top navigation with dark mode toggle and mobile menu.
// This replaces the <nav> block from app.blade.php.

import { useState } from "react";
import { useTheme } from "@/hooks/useTheme";
import { useScrollSpy } from "@/hooks/useScrollSpy";

// Nav links — defined once, used in both desktop and mobile menus
const NAV_LINKS = [
  { label: "Home", href: "#hero" },
  { label: "About", href: "#about" },
  { label: "Skills", href: "#skills" },
  { label: "Experience", href: "#experience" },
  { label: "Projects", href: "#projects" },
];

const SECTION_IDS = ["hero", "about", "skills", "experience", "projects"];

export function Navbar() {
  const { isDark, toggle } = useTheme();
  const [mobileOpen, setMobileOpen] = useState(false);
  const activeId = useScrollSpy(SECTION_IDS);

  // Smooth scroll to section on nav link click
  const handleNavClick = (
    e: React.MouseEvent<HTMLAnchorElement>,
    href: string,
  ) => {
    e.preventDefault();
    const id = href.replace("#", "");
    const el = document.getElementById(id);
    if (el) {
      el.scrollIntoView({ behavior: "smooth", block: "start" });
    }
    setMobileOpen(false);
  };

  return (
    <nav
      role="navigation"
      aria-label="Main navigation"
      className="fixed top-0 w-full z-50 bg-white/80 dark:bg-[#09090b]/80
                 backdrop-blur-md border-b border-zinc-200 dark:border-zinc-800"
    >
      <div className="max-w-6xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between">
        {/* Logo */}
        <a
          href="#hero"
          onClick={(e) => handleNavClick(e, "#hero")}
          className="font-display font-extrabold text-base sm:text-lg tracking-tighter
                      hover:text-emerald-500 transition-colors"
        >
          SREERAM P
        </a>

        <div className="flex items-center gap-4 sm:gap-8">
          {/* Desktop links */}
          <div className="hidden sm:flex gap-8 text-sm font-medium text-zinc-500 dark:text-zinc-400">
            {NAV_LINKS.map((link) => {
              const isActive = activeId === link.href.replace("#", "");
              return (
                <a
                  key={link.href}
                  href={link.href}
                  onClick={(e) => handleNavClick(e, link.href)}
                  className={[
                    "nav-link relative hover:text-zinc-900 dark:hover:text-zinc-100 transition-colors",
                    isActive ? "text-emerald-500 active" : "",
                  ].join(" ")}
                >
                  {link.label}
                </a>
              );
            })}
          </div>

          {/* Theme toggle */}
          <button
            onClick={toggle}
            aria-label="Toggle dark and light mode"
            className="p-2 rounded-lg bg-zinc-100 dark:bg-zinc-800
                       hover:ring-2 ring-emerald-500 transition-all duration-200"
          >
            {isDark ? (
              // Sun icon — shown in dark mode
              <svg
                className="w-5 h-5 text-yellow-400"
                fill="currentColor"
                viewBox="0 0 20 20"
                aria-hidden="true"
              >
                <path
                  fillRule="evenodd"
                  clipRule="evenodd"
                  d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                />
              </svg>
            ) : (
              // Moon icon — shown in light mode
              <svg
                className="w-5 h-5 text-zinc-500"
                fill="currentColor"
                viewBox="0 0 20 20"
                aria-hidden="true"
              >
                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
              </svg>
            )}
          </button>

          {/* Hamburger (mobile) */}
          <button
            onClick={() => setMobileOpen((o) => !o)}
            aria-label="Open navigation menu"
            aria-expanded={mobileOpen}
            className="sm:hidden p-2 rounded-lg bg-zinc-100 dark:bg-zinc-800
                       hover:ring-2 ring-emerald-500 transition-all"
          >
            <svg
              className="w-5 h-5"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              aria-hidden="true"
            >
              <path
                strokeLinecap="round"
                strokeLinejoin="round"
                strokeWidth={2}
                d="M4 6h16M4 12h16M4 18h16"
              />
            </svg>
          </button>
        </div>
      </div>

      {/* Mobile menu */}
      <div
        className={[
          "sm:hidden border-t border-zinc-200 dark:border-zinc-800",
          "bg-white/95 dark:bg-[#09090b]/95 backdrop-blur-md",
          "overflow-hidden transition-all duration-300",
          mobileOpen ? "max-h-80 opacity-100" : "max-h-0 opacity-0",
        ].join(" ")}
        role="menu"
      >
        <div
          className="max-w-6xl mx-auto px-6 py-4 flex flex-col gap-4
                        text-sm font-semibold text-zinc-600 dark:text-zinc-300"
        >
          {NAV_LINKS.map((link) => (
            <a
              key={link.href}
              href={link.href}
              role="menuitem"
              onClick={(e) => handleNavClick(e, link.href)}
              className="hover:text-emerald-500 transition-colors py-1"
            >
              {link.label}
            </a>
          ))}
        </div>
      </div>
    </nav>
  );
}
