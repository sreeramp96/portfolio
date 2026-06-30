import { motion } from "framer-motion";
import { projects } from "@/data";
import { Tag } from "@/components/ui/Tag";
import { SectionLabel } from "@/components/ui/SectionLabel";
import { SectionHeading } from "@/components/ui/SectionHeading";

const containerVariants = {
  hidden: {},
  visible: {
    transition: { staggerChildren: 0.1 },
  },
};

const cardVariants = {
  hidden: { opacity: 0, y: 28 },
  visible: { opacity: 1, y: 0, transition: { duration: 0.55 } },
};

export function Projects() {
  return (
    <section
      id="projects"
      aria-labelledby="projects-heading"
      className="max-w-6xl mx-auto px-6 py-16 sm:py-24
                 border-t border-zinc-200 dark:border-zinc-900"
    >
      <SectionLabel>Projects</SectionLabel>
      <SectionHeading id="projects-heading">Things I've built.</SectionHeading>
      <motion.div
        className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"
        variants={containerVariants}
        initial="hidden"
        whileInView="visible"
        viewport={{ once: true, margin: "-80px" }}
      >
        {projects.map((project) => (
          <motion.article
            key={project.title}
            variants={cardVariants}
            className="group relative bg-white dark:bg-[#111113]
                       border border-zinc-200 dark:border-zinc-800 p-7 rounded-2xl
                       hover:-translate-y-2 transform-gpu transition-all duration-300 ease-out
                       hover:shadow-xl hover:shadow-emerald-500/10 hover:border-emerald-500/30"
          >
            <div
              className="absolute top-0 left-8 right-8 h-px
                            bg-linear-to-r from-transparent via-emerald-500 to-transparent
                            opacity-0 group-hover:opacity-100 transition-opacity duration-300"
              aria-hidden="true"
            />

            {project.private && (
              <span
                className="absolute top-4 right-4 text-[9px] font-bold uppercase tracking-widest
                               text-zinc-400 border border-zinc-700 px-2 py-0.5 rounded-full"
              >
                Private
              </span>
            )}

            <div className="flex flex-wrap gap-2 mb-5" role="list">
              {project.tags.map((tag: string) => (
                <span key={tag} role="listitem">
                  <Tag label={tag} />
                </span>
              ))}
            </div>

            <h3
              className="font-display text-xl font-bold mb-1.5 leading-snug
                           group-hover:text-emerald-600 dark:group-hover:text-emerald-400
                           transition-colors"
            >
              {project.title}
            </h3>

            <p className="text-zinc-400 text-xs mb-4 font-bold uppercase tracking-widest">
              {project.company} · {project.period}
            </p>

            <p className="text-zinc-600 dark:text-zinc-400 leading-relaxed text-sm mb-6">
              {project.description}
            </p>

            {project.private ? (
              <span className="text-xs font-bold text-zinc-500 uppercase tracking-widest">
                <span aria-hidden="true">🔒</span> Proprietary codebase
              </span>
            ) : (
              <a
                href={project.link}
                target="_blank"
                rel="noopener noreferrer"
                className="inline-flex items-center gap-1.5 text-sm font-bold
                            text-zinc-400 hover:text-emerald-500 transition-all group/link"
              >
                View Project
                <span
                  className="group-hover/link:translate-x-1 transition-transform text-emerald-500"
                  aria-hidden="true"
                >
                  →
                </span>
              </a>
            )}
          </motion.article>
        ))}
      </motion.div>
    </section>
  );
}
