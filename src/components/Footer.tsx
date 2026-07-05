// Footer.tsx — simple footer with name, stack credit, email.

import { social } from "@/data";

export function Footer() {
  return (
    <footer
      role="contentinfo"
      className="border-t border-zinc-200 dark:border-zinc-800 py-10 mt-8"
    >
      <div
        className="max-w-6xl mx-auto px-6 flex flex-col sm:flex-row items-center
                      justify-between gap-4 text-sm"
      >
        <span className="font-display font-bold tracking-tighter text-zinc-400">
          SREERAM P
        </span>
        <span className="text-zinc-400">
          Built with React + TypeScript + Tailwind
        </span>
        <a
          href={`mailto:${social.email}`}
          className="text-zinc-400 hover:text-emerald-500 transition-colors"
        >
          {social.email}
        </a>
      </div>
    </footer>
  );
}
