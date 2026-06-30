import { motion } from "framer-motion";
import { social } from "@/data";

export function CTA() {
  return (
    <section
      aria-label="Contact call to action"
      className="max-w-6xl mx-auto px-6 py-20 sm:py-28"
    >
      <motion.div
        initial={{ opacity: 0, y: 32 }}
        whileInView={{ opacity: 1, y: 0 }}
        viewport={{ once: true, margin: "-60px" }}
        transition={{ duration: 0.6 }}
        className="relative bg-zinc-900 dark:bg-zinc-950 border border-zinc-800
                   rounded-3xl px-8 sm:px-16 py-14 sm:py-20 text-center overflow-hidden"
      >
        <div
          className="absolute inset-0 flex items-center justify-center pointer-events-none"
          aria-hidden="true"
        >
          <div className="w-125 h-125 rounded-full bg-emerald-500/10 blur-[80px] animate-pulse-slow" />
        </div>

        <p
          className="relative font-display text-xs tracking-[0.2em] uppercase
                      text-emerald-400 font-bold mb-3"
        >
          Available for hire
        </p>
        <h2 className="relative font-display text-3xl sm:text-5xl font-extrabold text-white mb-4">
          Open to new opportunities.
        </h2>
        <p className="relative text-zinc-400 mb-8 max-w-md mx-auto leading-relaxed">
          Looking for a backend engineer who cares about performance, clean
          architecture, and actually shipping? Let's talk.
        </p>

        <div className="relative flex flex-col sm:flex-row gap-4 justify-center">
          <a
            href={`mailto:${social.email}`}
            className="inline-flex items-center justify-center gap-2 px-8 py-4
                        bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl
                        transition-all duration-200 hover:scale-[1.03]
                        hover:shadow-xl hover:shadow-emerald-700/25"
          >
            Send me an email →
          </a>
          <a
            href={social.linkedin}
            target="_blank"
            rel="noopener noreferrer"
            className="inline-flex items-center justify-center gap-2 px-8 py-4
                        border border-zinc-700 text-zinc-300 font-bold rounded-xl
                        hover:border-emerald-500/50 hover:text-emerald-400
                        transition-all duration-200"
          >
            LinkedIn Profile →
          </a>
        </div>
      </motion.div>
    </section>
  );
}
