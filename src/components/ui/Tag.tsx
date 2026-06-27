interface TagProps {
  label: string;
}
export function Tag({ label }: TagProps) {
  return (
    <span
      className="text-[10px] font-display font-bold uppercase tracking-widest
                     text-emerald-600 dark:text-emerald-500 bg-emerald-500/10
                     px-2.5 py-1 rounded-md border border-emerald-500/20"
    >
      {label}
    </span>
  );
}
