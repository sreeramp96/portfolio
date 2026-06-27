// CustomCursor.tsx — custom cursor dot + ring that follows the mouse.
// Only rendered on devices with a fine pointer (desktop, not touch).

import { useEffect, useRef } from "react";

export function CustomCursor() {
  const dotRef = useRef<HTMLDivElement>(null);
  const ringRef = useRef<HTMLDivElement>(null);

  useEffect(() => {
    // Don't show on touch devices
    if (!window.matchMedia("(pointer: fine)").matches) return;

    const dot = dotRef.current;
    const ring = ringRef.current;
    if (!dot || !ring) return;

    let mx = 0,
      my = 0,
      rx = 0,
      ry = 0;

    const onMove = (e: MouseEvent) => {
      mx = e.clientX;
      my = e.clientY;
      dot.style.left = mx + "px";
      dot.style.top = my + "px";
      dot.style.opacity = "1";
      ring.style.opacity = "1";
    };

    // Lerp (linear interpolation) makes the ring lag behind the dot slightly
    const lerp = () => {
      rx += (mx - rx) * 0.15;
      ry += (my - ry) * 0.15;
      ring.style.left = rx + "px";
      ring.style.top = ry + "px";
      requestAnimationFrame(lerp);
    };

    document.addEventListener("mousemove", onMove);
    lerp();

    // Grow ring on hover over interactive elements
    const interactives = document.querySelectorAll("a, button");
    interactives.forEach((el) => {
      el.addEventListener("mouseenter", () => {
        ring.style.width = "48px";
        ring.style.height = "48px";
        ring.style.borderColor = "rgba(16,185,129,0.8)";
        dot.style.transform = "translate(-50%,-50%) scale(1.5)";
      });
      el.addEventListener("mouseleave", () => {
        ring.style.width = "32px";
        ring.style.height = "32px";
        ring.style.borderColor = "rgba(16,185,129,0.5)";
        dot.style.transform = "translate(-50%,-50%) scale(1)";
      });
    });

    return () => document.removeEventListener("mousemove", onMove);
  }, []);

  return (
    <>
      <div
        ref={dotRef}
        style={{ opacity: 0 }}
        className="fixed w-2 h-2 bg-emerald-500 rounded-full pointer-events-none z-[9999]
                      -translate-x-1/2 -translate-y-1/2 transition-transform duration-100"
      />
      <div
        ref={ringRef}
        style={{ opacity: 0, width: 32, height: 32 }}
        className="fixed border border-emerald-500/50 rounded-full pointer-events-none z-[9998]
                      -translate-x-1/2 -translate-y-1/2 transition-[width,height,border-color] duration-200"
      />
    </>
  );
}
