import React, { useState, useEffect } from "react";
import { Moon, Sun } from "lucide-react";
import AnchorLink from "react-anchor-link-smooth-scroll";
import logo from "../../assets/logo-vip.png";
import "./Navbar.css";

const Navbar = () => {
  // State for active link
  const [activeLink, setActiveLink] = useState("home");

  // State for theme
  const [isDarkMode, setIsDarkMode] = useState(false);

  // Effect to set default active link and apply theme
  useEffect(() => {
    // Set home as default active link when component mounts
    setActiveLink("home");

    // Check localStorage for theme preference
    const savedTheme = localStorage.getItem("theme");
    if (savedTheme) {
      setIsDarkMode(savedTheme === "dark");
      applyTheme(savedTheme === "dark");
    } else {
      // Check system preference
      const prefersDarkMode = window.matchMedia(
        "(prefers-color-scheme: dark)"
      ).matches;
      setIsDarkMode(prefersDarkMode);
      applyTheme(prefersDarkMode);
    }
  }, []);

  // Function to toggle theme
  const toggleTheme = () => {
    const newTheme = !isDarkMode;
    setIsDarkMode(newTheme);
    applyTheme(newTheme);
    localStorage.setItem("theme", newTheme ? "dark" : "light");
  };

  // Function to apply theme
  const applyTheme = (isDark) => {
    if (isDark) {
      document.documentElement.classList.add("dark");
      document.documentElement.classList.remove("light");
    } else {
      document.documentElement.classList.add("light");
      document.documentElement.classList.remove("dark");
    }
  };

  // Array of navigation links
  const navLinks = [
    { id: "home", label: "Home", href: "#home" },
    { id: "about", label: "About", href: "#about" },
    { id: "skills", label: "Skills", href: "#skills" },
    { id: "projects", label: "Projects", href: "#projects" },
    { id: "contact", label: "Contact", href: "#contact" },
  ];

  return (
    <div className="navbar-container">
      <nav className="navbar">
        <img src={logo} alt="logo" className="logo" />
        <ul className="nav-items">
          {navLinks.map((link) => (
            <li key={link.id}>
              <AnchorLink
                className={`nav-link ${activeLink === link.id ? "active" : ""}`}
                href={link.href}
                onClick={() => setActiveLink(link.id)}
              >
                {link.label}
              </AnchorLink>
            </li>
          ))}

          {/* Theme Toggle Button */}
          {/* <li>
            <button
              onClick={toggleTheme}
              className="theme-toggle"
              aria-label={
                isDarkMode ? "Switch to Light Mode" : "Switch to Dark Mode"
              }
            >
              {isDarkMode ? (
                <Sun className="theme-icon" />
              ) : (
                <Moon className="theme-icon" />
              )}
            </button>
          </li> */}
        </ul>
      </nav>
    </div>
  );
};

export default Navbar;
