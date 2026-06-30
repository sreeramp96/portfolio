import { motion } from 'framer-motion'
import { about } from '@/data'
import { SectionLabel } from '@/components/ui/SectionLabel'
import { SectionHeading } from '@/components/ui/SectionHeading'

export function About() {
  return (
    <section
      id="about"
      aria-labelledby="about-heading"
      className="max-w-6xl mx-auto px-6 py-16 sm:py-24
                 border-t border-zinc-200 dark:border-zinc-900"
    >
      <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-start">
        <div>
          <SectionLabel>About</SectionLabel>
          <SectionHeading id="about-heading">
            {about.headingLine1}<br />{about.headingLine2}
          </SectionHeading>

          <div className="space-y-4 text-zinc-600 dark:text-zinc-400 leading-relaxed">
            {about.bio.map((para: string, i: number) => (
              <motion.p
                key={i}
                initial={{ opacity: 0, y: 16 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true, margin: '-60px' }}
                transition={{ duration: 0.5, delay: i * 0.1 }}
              >
                {para}
              </motion.p>
            ))}
          </div>

          <div className="mt-8 flex flex-wrap gap-5">
            {about.links.map((link: { label: string; href: string; external: boolean }) => (
              <a
                key={link.label}
                href={link.href}
                target={link.external ? '_blank' : undefined}
                rel={link.external ? 'noopener noreferrer' : undefined}
                className="inline-flex items-center gap-1.5 text-sm font-bold
                           text-emerald-600 dark:text-emerald-500
                           hover:text-emerald-700 dark:hover:text-emerald-400
                           transition-colors group"
              >
                {link.label}
                <span className="group-hover:translate-x-1 transition-transform" aria-hidden="true">→</span>
              </a>
            ))}
          </div>
        </div>
        
        <div className="grid grid-cols-2 gap-4">
          {about.highlights.map((card: { title: string; icon: string; desc: string }, i: number) => (
            <motion.div
              key={card.title}
              initial={{ opacity: 0, y: 24 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true, margin: '-40px' }}
              transition={{ duration: 0.5, delay: i * 0.1 }}
              className="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800
                         rounded-2xl p-5 hover:border-emerald-500/40 transition-all duration-300
                         hover:-translate-y-1 hover:shadow-lg hover:shadow-emerald-500/5"
            >
              <div className="text-2xl mb-3" aria-hidden="true">{card.icon}</div>
              <div className="font-display font-bold text-sm mb-2 text-zinc-900 dark:text-zinc-100">
                {card.title}
              </div>
              <div className="text-xs text-zinc-500 dark:text-zinc-400 leading-relaxed">
                {card.desc}
              </div>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  )
}
