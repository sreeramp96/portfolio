import { useState, useEffect } from 'react'

// useScrollSpy — watches which section is in view and returns its ID.
// Used by the Navbar to highlight the active nav link.

export function useScrollSpy(sectionIds: string[]): string {
  const [activeId, setActiveId] = useState<string>(sectionIds[0] ?? '')

  useEffect(() => {
    // IntersectionObserver fires a callback when elements enter/leave viewport
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            setActiveId(entry.target.id)
          }
        })
      },
      { threshold: 0.4 }
    )

    sectionIds.forEach((id) => {
      const el = document.getElementById(id)
      if (el) observer.observe(el)
    })

    // Cleanup: stop observing when the component unmounts
    return () => observer.disconnect()
  }, [sectionIds])

  return activeId
}
