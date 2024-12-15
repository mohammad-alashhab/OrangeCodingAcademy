import React from "react";
import "./Footer.css";
import logo from "../../assets/logo-vip.png";

const Footer = () => {
  return (
    <div className="box-5">
      <div className="footer-item">
        <img src={logo} alt="logo" className="logo" />
        <ul className="footer-items">
          <li>
            <a href="#home" className="footer-link">
              Home
            </a>
          </li>
          <li>
            <a href="#about" className="footer-link">
              About
            </a>
          </li>
          <li>
            <a href="#skills" className="footer-link">
              Skills
            </a>
          </li>
          <li>
            <a href="#portfolio" className="footer-link">
              Portfolio
            </a>
          </li>
          <li>
            <a href="#contact" className="footer-link">
              Contact
            </a>
          </li>
        </ul>
      </div>
      <div className="footer-item">
        <div className="footer-icon">
          <a href="https://www.facebook.com/share/skjyTsiye1det4Ns/?mibextid=qi2Omg">
            <i className="fa-brands fa-facebook-f"></i>
          </a>
          <a href="https://www.linkedin.com/in/mohamad-alashhab-6a492b1ba?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app">
            <i className="fa-brands fa-linkedin-in"></i>
          </a>
          <a href="mailto:moh.t.alashhab@gmail.com">
            <i className="fa-solid fa-envelope"></i>
          </a>
          <a href="https://github.com/mohammad-alashhab">
            <i className="fa-brands fa-github"></i>
          </a>
        </div>
      </div>
      <div className="hr-custom">
        <hr />
      </div>
      <div className="footer-item">
        <p className="copy-right">
          &copy; 2024 Jordan All rights reserved by Mohammad Alashhab.
        </p>
      </div>
    </div>
  );
};

export default Footer;
