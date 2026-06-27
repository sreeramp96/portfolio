// Skills.tsx — animated skill bars with count-up, tool badges, learning strip.
// useEffect + IntersectionObserver replaces GSAP ScrollTrigger for the bar animation.

import { useEffect, useRef, useState } from "react";
import { motion } from "framer-motion";
import { skills } from "@/data";
import { SectionLabel } from "@/components/ui/SectionLabel";
import { SectionHeading } from "@/components/ui/SectionHeading";
// SkillBar — individual animated bar component.
// Extracted into its own component so the logic is self-contained.
function SkillBar({ name, level }: { name: string; level: number }) {
  const [width, setWidth] = useState(0);
  const [count, setCount] = useState(0);
  const ref = useRef<HTMLDivElement>(null);
  const animated = useRef(false); // prevent re-animating on scroll back

  useEffect(() => {
    const el = ref.current;
    if (!el) return;

    const observer = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting && !animated.current) {
          animated.current = true;

          // Animate bar width
          setWidth(level);

          // Count-up: increment from 0 to level over ~1100ms
          const duration = 1100;
          const start = performance.now();
          const step = (now: number) => {
            const progress = Math.min((now - start) / duration, 1);
            // easeOutQuad for deceleration at end
            const eased = 1 - (1 - progress) * (1 - progress);
            setCount(Math.round(eased * level));
            if (progress < 1) requestAnimationFrame(step);
          };
          requestAnimationFrame(step);
        }
      },
      { threshold: 0.3 },
    );

    observer.observe(el);
    return () => observer.disconnect();
  }, [level]);

  return (
    <div ref={ref} className="skill-item">
      <div className="flex justify-between items-center mb-2">
        <span className="text-sm font-semibold text-zinc-700 dark:text-zinc-300">
          {name}
        </span>
        <span
          className="text-xs font-bold text-emerald-600 dark:text-emerald-400 tabular-nums"
          aria-label={`${level} percent`}
        >
          {count}%
        </span>
      </div>
      <div
        className="h-1.5 bg-zinc-200 dark:bg-zinc-800 rounded-full overflow-hidden"
        role="progressbar"
        aria-valuenow={level}
        aria-valuemin={0}
        aria-valuemax={100}
        aria-label={`${name} proficiency`}
      >
        {/* CSS transition handles the width animation */}
        <div
          className="h-full rounded-full bg-gradient-to-r from-emerald-600 to-emerald-400
                     transition-all duration-[1100ms] ease-out"
          style={{ width: `${width}%` }}
        />
      </div>
    </div>
  );
}

export function Skills() {
  return (
    <section
      id="skills"
      aria-labelledby="skills-heading"
      className="max-w-6xl mx-auto px-6 py-16 sm:py-24
                 border-t border-zinc-200 dark:border-zinc-900"
    >
      <SectionLabel>Skills</SectionLabel>
      <SectionHeading id="skills-heading">Technical toolkit.</SectionHeading>

      {/* Skill bars grid */}
      <div
        className="grid grid-cols-1 lg:grid-cols-2 gap-x-16 gap-y-5 mb-14"
        role="list"
        aria-label="Skill proficiency levels"
      >
        {skills.bars.map((skill: { name: string; level: number }) => (
          <div key={skill.name} role="listitem">
            <SkillBar name={skill.name} level={skill.level} />
          </div>
        ))}
      </div>

      {/* Tool badges */}
      <div className="mb-10">
        <p className="text-xs uppercase tracking-widest text-zinc-400 font-bold mb-4">
          Also worked with
        </p>
        <div
          className="flex flex-wrap gap-2"
          role="list"
          aria-label="Other tools"
        >
          {skills.tools.map((tool: string) => (
            <span
              key={tool}
              role="listitem"
              className="text-xs font-mono px-3 py-1.5 bg-zinc-100 dark:bg-zinc-900
                             border border-zinc-200 dark:border-zinc-800
                             text-zinc-600 dark:text-zinc-400 rounded-lg
                             hover:border-emerald-500/50 hover:text-emerald-600
                             dark:hover:text-emerald-400 transition-all duration-200 cursor-default"
            >
              {tool}
            </span>
          ))}
        </div>
      </div>

      {/* Currently learning */}
      <motion.div
        initial={{ opacity: 0, y: 20 }}
        whileInView={{ opacity: 1, y: 0 }}
        viewport={{ once: true }}
        transition={{ duration: 0.5 }}
        className="bg-zinc-100 dark:bg-zinc-900/60 border border-zinc-200
                   dark:border-zinc-800 rounded-2xl px-6 py-5"
      >
        <p className="text-xs uppercase tracking-widest text-zinc-400 font-bold mb-4">
          Currently levelling up
        </p>
        <div className="flex flex-wrap gap-3">
          {skills.learning.map((item: { name: string; icon: string }) => (
            <span
              key={item.name}
              className="inline-flex items-center gap-2 text-sm font-semibold px-4 py-2
                             bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700
                             rounded-xl text-zinc-700 dark:text-zinc-300
                             hover:border-emerald-500/50 transition-colors"
            >
              <span aria-hidden="true">{item.icon}</span> {item.name}
            </span>
          ))}
        </div>
      </motion.div>
    </section>
  );
}
