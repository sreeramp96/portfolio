// Experience.tsx — work history cards with animated entrance.

import { motion } from "framer-motion";
import { experience } from "@/data";
import { Tag } from "@/components/ui/Tag";
import { SectionLabel } from "@/components/ui/SectionLabel";
import { SectionHeading } from "@/components/ui/SectionHeading";

export function Experience() {
  return (
    <section
      id="experience"
      aria-labelledby="experience-heading"
      className="max-w-6xl mx-auto px-6 py-16 sm:py-24
                 border-t border-zinc-200 dark:border-zinc-900"
    >
      <SectionLabel>Experience</SectionLabel>
      <SectionHeading id="experience-heading">
        Where I've worked.
      </SectionHeading>

      <div className="space-y-6">
        {experience.map((job, i) => (
          <motion.article
            key={job.company}
            initial={{ opacity: 0, y: 28 }}
            whileInView={{ opacity: 1, y: 0 }}
            // once: true = animates only the first time it enters view
            viewport={{ once: true, margin: "-60px" }}
            transition={{ duration: 0.55, delay: i * 0.1 }}
            className="group bg-white dark:bg-[#111113]
                       border border-zinc-200 dark:border-zinc-800 rounded-2xl p-7 sm:p-9
                       hover:border-emerald-500/30 transition-all duration-300
                       hover:shadow-xl hover:shadow-emerald-500/5"
          >
            {/* Title + period */}
            <div className="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-2 mb-1">
              <h3
                className="font-display text-xl font-bold
                             group-hover:text-emerald-600 dark:group-hover:text-emerald-400
                             transition-colors"
              >
                {job.title}
              </h3>
              <time
                className="text-xs font-mono text-zinc-400 whitespace-nowrap pt-1"
                dateTime={job.period}
              >
                {job.period}
              </time>
            </div>

            <p className="text-sm text-zinc-400 font-bold uppercase tracking-widest mb-4">
              {job.company} · {job.location}
            </p>

            {/* Tags */}
            <div
              className="flex flex-wrap gap-2 mb-5"
              role="list"
              aria-label="Technologies used"
            >
              {job.tags.map((tag: string) => (
                <span key={tag} role="listitem">
                  <Tag label={tag} />
                </span>
              ))}
            </div>

            <p className="text-zinc-600 dark:text-zinc-400 leading-relaxed text-sm mb-5">
              {job.description}
            </p>

            {/* Bullet points */}
            <ul className="space-y-2.5">
              {job.bullets.map((bullet: string, bi: number) => (
                <li
                  key={bi}
                  className="flex gap-3 text-sm text-zinc-700 dark:text-zinc-300 leading-relaxed"
                >
                  <span
                    className="text-emerald-500 mt-0.5 shrink-0"
                    aria-hidden="true"
                  >
                    ▸
                  </span>
                  <span>{bullet}</span>
                </li>
              ))}
            </ul>
          </motion.article>
        ))}
      </div>
    </section>
  );
}
