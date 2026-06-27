// SectionHeading.tsx — the large h2 heading for each section.
// whileInView fires the animation when the element scrolls into view.

import { motion } from "framer-motion";

interface SectionHeadingProps {
  id?: string;
  children: React.ReactNode;
}

export function SectionHeading({ id, children }: SectionHeadingProps) {
  return (
    <motion.h2
      id={id}
      initial={{ opacity: 0, y: 20 }}
      whileInView={{ opacity: 1, y: 0 }}
      viewport={{ once: true, margin: "-80px" }}
      transition={{ duration: 0.55, delay: 0.1 }}
      className="font-display text-3xl sm:text-4xl font-extrabold mb-12 leading-tight"
    >
      {children}
    </motion.h2>
  );
}
