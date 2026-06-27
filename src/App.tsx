import { Navbar } from "@/components/Navbar";
import { Hero } from "@/components/sections/Hero";
import { About } from "@/components/sections/About";
import { Skills } from "@/components/sections/Skills";
import { Experience } from "@/components/sections/Experience";
import { Projects } from "@/components/sections/Projects";
import { CTA } from "@/components/sections/CTA";
import { Ticker } from "@/components/Ticker";
import { Footer } from "@/components/Footer";
import { CustomCursor } from "@/components/CustomCursor";

export default function App() {
  return (
    <>
      <CustomCursor />
      <Navbar />
      <main id="main-content" className="pt-24 sm:pt-32">
        <Hero />
        <About />
        <Skills />
        <Experience />
        <Projects />
        <CTA />
      </main>
      <Ticker />
      <Footer />
    </>
  );
}
