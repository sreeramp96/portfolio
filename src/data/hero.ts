import type { HeroData } from '../types'

// Equivalent to config/portfolio/hero.php
export const hero: HeroData = {
  role:         'Backend Software Engineer',
  taglineStart: 'Architecting',
  taglineGrey:  'data-heavy',
  taglineEnd:   'systems.',
  bio:          "Backend engineer with 5+ years optimising PHP and MySQL at enterprise scale. I turn sluggish legacy codebases into fast, maintainable architectures — and I have the EXPLAIN plans to prove it.",
  resumeUrl:    '/files/Sreeram_Resume_V3.pdf',
  stats: [
    { value: '5+',       label: 'Years experience' },
    { value: '12x',      label: 'Query perf. gain' },
    { value: '80k+ LOC', label: 'PHP migration led' },
    { value: 'Laravel',  label: 'Modern stack' },
  ],
}
