import type { AboutData } from "@/types";

export const about: AboutData = {
  headingLine1: "Hi, I'm",
  headingLine2: "Sreeram.",
  bio: [
    "I'm a software engineer based in Kochi, Kerala with over 5 years of experience in backend development. I specialize in building efficient, scalable, and maintainable web applications.",
    "My primary focus is on backend technologies like PHP, MySQL, and Laravel. I enjoy working on database optimization, API development, and creating robust software architectures.",
    "I am always eager to learn new technologies and improve my skills. Currently, I am exploring modern tools like Docker and Redis to further enhance my development workflow.",
  ],
  highlights: [
    {
      icon: "💻",
      title: "Backend Development",
      desc: "Building scalable and maintainable server-side applications using PHP and Laravel.",
    },
    {
      icon: "🗄️",
      title: "Database Management",
      desc: "Designing and optimizing MySQL databases for better performance and reliability.",
    },
    {
      icon: "🔗",
      title: "API Integration",
      desc: "Developing and integrating RESTful APIs to connect different systems seamlessly.",
    },
    {
      icon: "⚙️",
      title: "Clean Code",
      desc: "Writing clean, readable, and well-structured code following industry best practices.",
    },
  ],
  links: [
    {
      label: "Email me",
      href: "mailto:itssreeramp@gmail.com",
      external: false,
    },
    {
      label: "LinkedIn",
      href: "https://linkedin.com/in/itssreeramp",
      external: true,
    },
    { label: "GitHub", href: "https://github.com/itssreeramp", external: true },
  ],
};
