// Hero.tsx — the above-the-fold landing section.
// motion.div from Framer Motion replaces GSAP timeline animations.
// Each element animates independently with initial/animate/transition props.

import { motion } from "framer-motion";
import { hero } from "@/data";
import { social } from "@/data";

// fadeUp: reusable animation preset — starts invisible 24px below, rises to final position
// We define it once and spread it onto multiple motion elements below.
const fadeUp = (delay = 0) => ({
  initial: { opacity: 0, y: 24 },
  animate: { opacity: 1, y: 0 },
  transition: { duration: 0.6, delay, ease: [0.22, 1, 0.36, 1] as const },
});

export function Hero() {
  return (
    <section
      id="hero"
      aria-label="Introduction"
      className="relative max-w-6xl mx-auto px-6 pb-16 sm:pb-28 overflow-hidden"
    >
      {/* Ambient orb — purely decorative */}
      <div
        aria-hidden="true"
        className="pointer-events-none absolute -top-40 -right-40 w-150 h-150 rounded-full bg-emerald-500/10 blur-[90px] animate-pulse-slow"
      />

      <div className="relative max-w-4xl">
        {/* Available badge */}
        {social.available && (
          <motion.div
            {...fadeUp(0)}
            className="inline-flex items-center gap-2 mb-6 px-3 py-1.5
                        rounded-full border border-emerald-500/30 bg-emerald-500/10
                        text-emerald-500 text-xs font-bold uppercase tracking-widest"
          >
            <span
              className="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-ping-slow"
              aria-hidden="true"
            />
            Open to opportunities
          </motion.div>
        )}

        {/* Role */}
        <motion.p
          {...fadeUp(0.1)}
          className="font-display text-emerald-600 dark:text-emerald-500
                    mb-4 text-xs sm:text-sm tracking-[0.2em] uppercase font-bold"
        >
          {hero.role}
        </motion.p>

        {/* Tagline — h1 with grey middle word */}
        <motion.h1
          {...fadeUp(0.2)}
          className="font-display text-4xl sm:text-6xl md:text-7xl
                     font-extrabold tracking-tight mb-8 leading-[1.08]
                     text-zinc-900 dark:text-zinc-50"
        >
          {hero.taglineStart}{" "}
          <span className="text-zinc-400 dark:text-zinc-600">
            {hero.taglineGrey}
          </span>{" "}
          {hero.taglineEnd}
        </motion.h1>

        {/* Bio */}
        <motion.p
          {...fadeUp(0.3)}
          className="text-base sm:text-xl text-zinc-600 dark:text-zinc-400
                    mb-10 leading-relaxed max-w-2xl"
        >
          {hero.bio}
        </motion.p>

        {/* CTA buttons */}
        <motion.div
          {...fadeUp(0.4)}
          className="flex flex-col sm:flex-row gap-4"
        >
          <a
            href="#projects"
            onClick={(e) => {
              e.preventDefault();
              document
                .getElementById("projects")
                ?.scrollIntoView({ behavior: "smooth" });
            }}
            className="w-full sm:w-auto text-center px-8 py-4 bg-zinc-900 dark:bg-zinc-50
                        text-white dark:text-zinc-950 font-bold rounded-xl
                        hover:bg-emerald-600 dark:hover:bg-emerald-500
                        transition-all duration-200 hover:scale-[1.02]
                        hover:shadow-lg hover:shadow-emerald-500/20"
          >
            View Projects
          </a>
          <a
            href={hero.resumeUrl}
            download
            className="w-full sm:w-auto text-center px-8 py-4
                        border border-zinc-300 dark:border-zinc-700 font-bold rounded-xl
                        hover:border-emerald-500 hover:text-emerald-600 dark:hover:text-emerald-400
                        transition-all duration-200 group"
          >
            <span className="inline-flex items-center justify-center gap-2">
              Download Resume
              {/* SVG arrow — animates down on hover via group-hover */}
              <svg
                className="w-4 h-4 group-hover:translate-y-0.5 transition-transform"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                aria-hidden="true"
              >
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  strokeWidth={2}
                  d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"
                />
              </svg>
            </span>
          </a>
          <a
            href={`mailto:${social.email}`}
            className="w-full sm:w-auto text-center px-8 py-4
                        border border-zinc-300 dark:border-zinc-700 font-bold rounded-xl
                        hover:bg-zinc-100 dark:hover:bg-zinc-900 transition-all duration-200"
          >
            Get in Touch
          </a>
        </motion.div>

        {/* Stats row */}
        <motion.div
          {...fadeUp(0.5)}
          className="flex flex-wrap gap-8 mt-14 pt-10
                      border-t border-zinc-200 dark:border-zinc-800"
        >
          {hero.stats.map((stat) => (
            <div key={stat.label}>
              <div className="font-display text-2xl font-extrabold text-zinc-900 dark:text-zinc-50">
                {stat.value}
              </div>
              <div className="text-xs text-zinc-400 mt-0.5 tracking-wide">
                {stat.label}
              </div>
            </div>
          ))}
        </motion.div>
      </div>
    </section>
  );
}
