import { motion } from "framer-motion";

interface SectionLabelProps {
  children: React.ReactNode;
}

export function SectionLabel({ children }: SectionLabelProps) {
  return (
    <motion.p
      initial={{ opacity: 0, y: 16 }}
      whileInView={{ opacity: 1, y: 0 }}
      viewport={{ once: true, margin: "-80px" }}
      transition={{ duration: 0.5 }}
      className="font-display text-xs tracking-[0.2em] uppercase
                 text-emerald-500 font-bold mb-3"
      aria-hidden="true"
    >
      {children}
    </motion.p>
  );
}
