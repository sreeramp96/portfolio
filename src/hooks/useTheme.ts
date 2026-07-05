import { useState, useEffect } from 'react'

// useTheme — custom hook that manages dark/light mode.
//
// A "hook" in React is a function that starts with "use" and lets you
// plug into React features (like state) from any component.
//
// This replaces the JS you had in app.blade.php for theme toggling.

export function useTheme() {
  // useState: declares a reactive variable. When it changes, React re-renders.
  // The initial value reads from localStorage (or system preference).
  const [isDark, setIsDark] = useState<boolean>(() => {
    const stored = localStorage.getItem('theme')
    if (stored) return stored === 'dark'
    return window.matchMedia('(prefers-color-scheme: dark)').matches
  })

  // useEffect: runs side-effects after render.
  // This one syncs the <html> class and localStorage whenever isDark changes.
  useEffect(() => {
    const root = document.documentElement
    if (isDark) {
      root.classList.add('dark')
    } else {
      root.classList.remove('dark')
    }
    localStorage.setItem('theme', isDark ? 'dark' : 'light')
  }, [isDark]) // ← the array means "only re-run when isDark changes"

  const toggle = () => {
    // Add a brief transition class so the switch looks smooth but not laggy
    document.documentElement.classList.add('theme-transitioning')
    setIsDark(prev => !prev)
    setTimeout(() => {
      document.documentElement.classList.remove('theme-transitioning')
    }, 300)
  }

  return { isDark, toggle }
}
