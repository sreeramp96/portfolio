// types/index.ts — TypeScript interfaces for all portfolio data.
// Same concept as your PHP config files, but type-safe.
// TypeScript catches mistyped field names at compile time — PHP doesn't.

export interface Stat {
  value: string;
  label: string;
}

export interface HeroData {
  role: string;
  taglineStart: string;
  taglineGrey: string;
  taglineEnd: string;
  profile: string;
  bio: string;
  resumeUrl: string;
  stats: Stat[];
}

export interface HighlightCard {
  icon: string;
  title: string;
  desc: string;
}

export interface AboutLink {
  label: string;
  href: string;
  external: boolean;
}

export interface AboutData {
  headingLine1: string;
  headingLine2: string;
  bio: string[];
  highlights: HighlightCard[];
  links: AboutLink[];
}

export interface SkillBar {
  name: string;
  level: number;
}

export interface LearningItem {
  name: string;
  icon: string;
}

export interface SkillsData {
  bars: SkillBar[];
  tools: string[];
  learning: LearningItem[];
}

export interface ExperienceItem {
  title: string;
  company: string;
  period: string;
  location: string;
  tags: string[];
  description: string;
  bullets: string[];
  link: string;
}

export interface ProjectItem {
  title: string;
  company: string;
  period: string;
  tags: string[];
  description: string;
  link: string;
  private?: boolean;
}

export interface SocialData {
  email: string;
  linkedin: string;
  github: string;
  resumeUrl: string;
  location: string;
  available: boolean;
}
