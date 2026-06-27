// Ticker.tsx — horizontally scrolling text band between footer and content.
// Pure CSS animation (animate-ticker from tailwind.config.ts).

const ITEMS = [
  "PHP 8.3",
  "⬡",
  "MySQL Optimisation",
  "⬡",
  "Laravel",
  "⬡",
  "Backend Engineering",
  "⬡",
  "SQL Performance",
  "⬡",
  "MVC Architecture",
  "⬡",
  "REST APIs",
  "⬡",
  "Kochi · India",
  "⬡",
];

export function Ticker() {
  // Duplicate items to create seamless loop — same trick as the Laravel version
  const doubled = [...ITEMS, ...ITEMS];

  return (
    <div
      className="border-t border-b border-zinc-200 dark:border-zinc-800
                 overflow-hidden py-3 bg-white dark:bg-zinc-950"
      aria-hidden="true"
    >
      <div
        className="animate-ticker flex gap-12 whitespace-nowrap w-max
                      hover:[animation-play-state:paused]"
      >
        {doubled.map((item, i) => (
          <span
            key={i}
            className="text-xs font-bold uppercase tracking-widest
                           text-zinc-400 dark:text-zinc-600"
          >
            {item}
          </span>
        ))}
      </div>
    </div>
  );
}
